<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {
        return view('employees.pages.index', [
            "menu" => "Dashboard",
        ]);
    }

    public function profile()
    {
        $data = Auth::user();

        return view('employees.pages.profile.index', [
            "menu" => "Profile",
            "data" => $data
        ]);
    }

    public function updateProfile(Request $request, User $user)
    {
        $rules = [
            'password' => 'min:5'
        ];

        $validateData = $request->validate($rules);
        $validateData['password'] = bcrypt($request->password);

        $result = User::where('id', $user->id)->update($validateData);

        if ($result) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            Alert::success('Congrats', 'Successfully updated');
            return redirect('/cms/login');
        } else {
            Alert::error('Failed', 'Failed to update');
            return redirect()->back();
        }
    }

    public function employees()
    {
        $datas = User::where('roles', '!=', 'SUPERADMIN')->latest()->get();

        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('employees.pages.users.index', [
            "menu" => "Employees",
            "datas" => $datas
        ]);
    }

    public function create()
    {
        return view('employees.pages.users.create', [
            "menu" => "Create Employee",
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ];

        $validateData = $request->validate($rules);

        $validateData['password'] = bcrypt($request->password);
        $validateData['roles'] = "ADMIN";

        $result = User::create($validateData);

        if ($result) {
            Alert::success('Congrats', 'Successfully created');
            return to_route('admin-employees');
        } else {
            Alert::error('Failed', 'Failed to created');
            return redirect()->back();
        }
    }

    public function detail(User $user) 
    {
        return view('employees.pages.users.detail', [
            "menu" => "Detail Employee",
            "data" => $user
        ]);
    }

    public function destroy(User $user)
    {
        $result = User::destroy($user->id);

        if ($result) {
            Alert::success('Success', 'Successfully deleted');
            return back();
        } else {
            Alert::error('Failed', 'Failed to delete');
            return back();
        }
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => ''
        ];

        $validateData = $request->validate($rules);

        if ($request->password) {
            $validateData['password'] = bcrypt($request->password);
        } else {
            $validateData['password'] = $user->password;
        }

        $result = User::where('id', $user->id)->update($validateData);

        if ($result) {
            Alert::success('Congrats', 'Successfully updated');
            return redirect()->back();
        } else {
            Alert::error('Failed', 'Failed to update');
            return redirect()->back();
        }
    }
}
