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
        $datas = People::latest()->get();
        $datas->each(function($data) {
            $decryptedRC4 = EncryptionService::decryptRC4($data->data);
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
        $request->validate([
            'name' => 'required',
            'nik' => 'required',
            'birthday' => 'required',
        ]);

        $data = json_encode($request->all());
        // {"name":"Nila","nik":"3578080809950002","birthday":"2025-10-30"}
        // {"name":"Nila","nik":"3578080809950002","birthday":"2025-10-30"}

        // $aesResult = EncryptionService::encryptAES($data);
        // $rc4Result = EncryptionService::encryptRC4($aesResult['encryptedData']);

        // ========== AES ==========
        $startMemory = memory_get_usage();
        $aes = EncryptionService::encryptAES($data);
        $aesMemory = memory_get_usage() - $startMemory;

        // ========== RC4 ==========
        $startMemory = memory_get_usage();
        $rc4 = EncryptionService::encryptRC4($data);
        $rc4Memory = memory_get_usage() - $startMemory;

        // ========== AES + RC4 Combined ==========
        $startTime = microtime(true);
        $startMemory = memory_get_usage();

        $aesCombined = EncryptionService::encryptAES($data);
        $rc4Combined = EncryptionService::encryptRC4($aesCombined['encryptedData']);

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
            return view('employees.pages.people.response', [
                "menu" => "Data Penduduk Baru",
                "data" => $request,
                "result" => $result,
            ]);
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
        $decryptedRC4 = EncryptionService::decryptRC4($person->data);
        $decryptedAES = EncryptionService::decryptAES($decryptedRC4['decryptedData']);

        $parsedData = json_decode($decryptedAES['decryptedData'], true);

        // Assign properti langsung ke objek $data
        $person->name = $parsedData['name'] ?? null;
        $person->nik = $parsedData['nik'] ?? null;
        $person->birthday = $parsedData['birthday'] ?? null;
        $person->decrypt_rc4_time = $decryptedRC4['timeTaken'] ?? null;
        $person->decrypt_aes_time = $decryptedAES['timeTaken'] ?? null;

        // Jika tidak ingin properti `data` asli tetap ada, bisa dihapus
        unset($person->data);
        return view('employees.pages.people.detail', [
            "menu" => "Detail Employee",
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

        $request->validate([
            'name' => 'required',
            'nik' => 'required',
            'birthday' => 'required',
        ]);

        $data = json_encode($request->all());

        $aesResult = EncryptionService::encryptAES($data);
        $rc4Result = EncryptionService::encryptRC4($aesResult['encryptedData']);

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
}

