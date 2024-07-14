<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('kepdin.user', compact('users'));
    }

    public function create()
    {
        $users = User::get();
        $supervisors = User::pluck('supervisor_id')->toArray();
        return view('kepdin.addUsers', compact('users', 'supervisors'));
    }



    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:20',
            'email' => 'required|string|max:155',
            'role' => 'required|max:2',
            'password' => 'required|string',
            'supervisor_id' => 'required|string',
        ]);

        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->role,
            'password' => Hash::make($request->password),
            'supervisor_id' => $request->supervisor_id,
        ]);

        if ($users) {
            return redirect()
                ->route('users.index')
                ->with([
                    'success' => 'New Pelanggan has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        $allusers = User::get();
        $supervisors = User::pluck('supervisor_id')->toArray();
        return view('kepdin.editUsers', compact('users','allusers','supervisors'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:20',
            'email' => 'required|string|max:155',
            'role' => 'required|max:2',
            'supervisor_id' => 'required|string',
        ]);

        $users = User::findOrFail($id);
            $users->update([
                'name' => $request->name,
                'email' => $request->email,
                'type' => $request->role,
                'supervisor_id' => $request->supervisor_id,
            ]);

        if ($users) {
            return redirect()
                ->route('users.index')
                ->with([
                    'success' => 'Users has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        if ($users) {
            return redirect()
                ->route('users.index')
                ->with([
                    'success' => 'Users has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('users.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }

}
