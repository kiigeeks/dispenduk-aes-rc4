<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePeopleRequest;
use App\Models\People;
use App\Services\EncryptionService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $key = env('ENCRYPT_KEY');
        $datas = People::latest()->get();
        $datas->each(function($data) use ($key) {
            $decryptedRC4 = EncryptionService::decryptRC4($data->data, $key);
            $decryptedAES = EncryptionService::decryptAES($decryptedRC4['decryptedData']);

            $parsedData = json_decode($decryptedAES['decryptedData'], true);

            // Assign properti langsung ke objek $data
            $data->name = $parsedData['name'] ?? null;
            $data->nik = $parsedData['nik'] ?? null;
            $data->birthday = $parsedData['birthday'] ?? null;
            $data->decrypt_rc4_time = $decryptedRC4['timeTaken'] ?? null;
            $data->decrypt_aes_time = $decryptedAES['timeTaken'] ?? null;

            // Jika tidak ingin properti `data` asli tetap ada, bisa dihapus
            unset($data->data);
        });

        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('employees.pages.people.index', [
            "menu" => "Penduduk",
            "datas" => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.pages.people.create', [
            "menu" => "Create Penduduk",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $key = env('ENCRYPT_KEY');
        $request->validate([
            'name' => 'required',
            'nik' => 'required',
            'birthday' => 'required',
            'birthplace' => 'required',
            'gender' => 'required',
            'religion' => 'required',
        ]);

        $data = json_encode($request->all());

        // ========== AES ==========
        $startMemory = memory_get_usage();
        $aes = EncryptionService::encryptAES($data);
        $aesMemory = memory_get_usage() - $startMemory;

        // ========== RC4 ==========
        $startMemory = memory_get_usage();
        $rc4 = EncryptionService::encryptRC4($data, $key);
        $rc4Memory = memory_get_usage() - $startMemory;

        // ========== AES + RC4 Combined ==========
        $startTime = microtime(true);
        $startMemory = memory_get_usage();

        $aesCombined = EncryptionService::encryptAES($data);
        $rc4Combined = EncryptionService::encryptRC4($aesCombined['encryptedData'], $key);

        $aesRc4Time = microtime(true) - $startTime;
        $aesRc4Memory = memory_get_usage() - $startMemory;


        $validated['data'] = $rc4Combined['encryptedData'];
        $validated['aes_time'] = $aes['timeTaken'];
        $validated['aes_memory'] = $aesMemory;
        $validated['rc4_time'] = $rc4['timeTaken'];
        $validated['rc4_memory'] = $rc4Memory;
        $validated['total_time'] = $aesRc4Time;
        $validated['total_memory'] = $aesRc4Memory;

        $result = People::create($validated);

        if ($result) {
            Alert::success('Congrats', 'Successfully created');
            // return view('employees.pages.people.response', [
            //     "menu" => "Data Penduduk Baru",
            //     "data" => $request,
            //     "result" => $result,
            // ]);

            return redirect()->route('people.show', $result);
        } else {
            Alert::error('Failed', 'Failed to created');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(People $person)
    {
        $key = env('ENCRYPT_KEY');

        $decryptedRC4 = EncryptionService::decryptRC4($person->data, $key);
        $decryptedAES = EncryptionService::decryptAES($decryptedRC4['decryptedData']);
        $dataJson = $decryptedAES['decryptedData'];

        // --- Generate data untuk skenario ---
        // 1️⃣ Plaintext asli + key asli
        $case1 = $this->runCase($dataJson, $key);

        // 2️⃣ Plaintext beda 1 karakter
        $modifiedDataJson = $this->modifyOneChar($dataJson);
        $case2 = $this->runCase($modifiedDataJson, $key);
        $case2['aes_avalanche'] = $this->calculateAvalanche($case1['aes_cipher'], $case2['aes_cipher']);
        $case2['rc4_avalanche'] = $this->calculateAvalanche($case1['rc4_cipher'], $case2['rc4_cipher']);
        $case2['aes_rc4_avalanche'] = $this->calculateAvalanche($case1['aes_rc4_cipher'], $case2['aes_rc4_cipher']);
        $case2['key'] = $key;

        // 3️⃣ Key beda 1 karakter
        $modifiedKey = $this->modifyOneChar($key);
        $case3 = $this->runCase($dataJson, $modifiedKey);
        $case3['aes_avalanche'] = $this->calculateAvalanche($case1['aes_cipher'], $case3['aes_cipher']);
        $case3['rc4_avalanche'] = $this->calculateAvalanche($case1['rc4_cipher'], $case3['rc4_cipher']);
        $case3['aes_rc4_avalanche'] = $this->calculateAvalanche($case1['aes_rc4_cipher'], $case3['aes_rc4_cipher']);
        $case3['key'] = $modifiedKey;

        // 4️⃣ Plaintext & Key beda 1 karakter
        $case4 = $this->runCase($modifiedDataJson, $modifiedKey);
        $case4['aes_avalanche'] = $this->calculateAvalanche($case1['aes_cipher'], $case4['aes_cipher']);
        $case4['rc4_avalanche'] = $this->calculateAvalanche($case1['rc4_cipher'], $case4['rc4_cipher']);
        $case4['aes_rc4_avalanche'] = $this->calculateAvalanche($case1['aes_rc4_cipher'], $case4['aes_rc4_cipher']);
        $case4['key'] = $modifiedKey;

        $parsedData = json_decode($dataJson, true);

        // Assign properti langsung ke objek $data
        $person->x_token = $parsedData['_token'] ?? null;
        $person->name = $parsedData['name'] ?? null;
        $person->nik = $parsedData['nik'] ?? null;
        $person->birthday = $parsedData['birthday'] ?? null;
        $person->birthplace = $parsedData['birthplace'] ?? null;
        $person->gender = $parsedData['gender'] ?? null;
        $person->religion = $parsedData['religion'] ?? null;
        $person->decrypt_rc4_time = $decryptedRC4['timeTaken'] ?? null;
        $person->decrypt_aes_time = $decryptedAES['timeTaken'] ?? null;

        // Jika tidak ingin properti `data` asli tetap ada, bisa dihapus
        unset($person->data);
        return view('employees.pages.people.detail', [
            "menu" => "Detail Employee",
            "dataJson" => $dataJson,
            "case1" => $case1,
            "case2" => $case2,
            "case3" => $case3,
            "case4" => $case4,
            "data" => $person
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(People $people)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, People $person)
    {
        $key = env('ENCRYPT_KEY');

        $request->validate([
            'name' => 'required',
            'nik' => 'required',
            'birthday' => 'required',
            'birthplace' => 'required',
            'gender' => 'required',
            'religion' => 'required',
        ]);

        $data = json_encode($request->all());

        $aesResult = EncryptionService::encryptAES($data);
        $rc4Result = EncryptionService::encryptRC4($aesResult['encryptedData'], $key);

        $validated['data'] = $rc4Result['encryptedData'];

        $result = People::where('id', $person->id)->update($validated);

        if ($result) {
            Alert::success('Congrats', 'Successfully updated');
            return view('employees.pages.people.response', [
                "menu" => "Data Penduduk Update",
                "data" => $request,
                "aes_time" => $aesResult['timeTaken'],
                "rc4_time" => $rc4Result['timeTaken'],
            ]);
        } else {
            Alert::error('Failed', 'Failed to updated');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(People $person)
    {
        $result = People::destroy($person->id);

        if ($result) {
            Alert::success('Success', 'Successfully deleted');
            return back();
        } else {
            Alert::error('Failed', 'Failed to delete');
            return back();
        }
    }



    private function runCase($plaintext, $key)
    {
        $aes = EncryptionService::encryptAES($plaintext);
        $rc4 = EncryptionService::encryptRC4($plaintext, $key);
        $aes_rc4 = EncryptionService::encryptRC4($aes['encryptedData'], $key);  // chaining

        return [
            "plaintext" => $plaintext,
            "aes_cipher" => $aes['encryptedData'],
            "rc4_cipher" => $rc4['encryptedData'],
            "aes_rc4_cipher" => $aes_rc4['encryptedData'],
        ];
    }

    private function modifyOneChar($text)
    {
        $text[0] = chr(ord($text[0]) + 1);
        return $text;
    }

    private function calculateAvalanche($cipher1, $cipher2)
    {
        $bin1 = unpack('H*', $cipher1)[1];
        $bin2 = unpack('H*', $cipher2)[1];

        $max = strlen($bin1);
        $diff = 0;

        for ($i = 0; $i < $max; $i++) {
            if ($bin1[$i] !== $bin2[$i]) {
                $diff++;
            }
        }

        return round(($diff / $max) * 100, 2); // percent difference
    }
}

