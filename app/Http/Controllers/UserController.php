<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.user.index');
    }

    public function getUser(Request $request)
    {
        if ($request->ajax()) {
            $data = User::all();

            return DataTables::of($data)
                ->addIndexColumn()
                // ->addColumn('action', function ($row) {
                //     return '<a href="/users/edit/' . $row->id . '" class="btn btn-primary font-semibold text-blue-600 hover:text-blue-800">Edit</a>';
                // })
                // ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function handleCreate(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email',
            'role' => 'required|in:user,admin',
            'password' => 'required|min:8'
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect('/admin/user')->with('success', 'Data berhasil dibuat');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', ['user' => $user]);
    }

    public function handleEdit(Request $request, User $user)
    {
        $validated = $request->validate([
            'id' => 'required|numeric',
            'name' => 'required|string|max:255',
            'role' => 'required|in:user,admin',
        ]);

        $user->update($validated);

        return redirect('/admin/user')->with('success', 'Data berhasil diedit');
    }

    public function delete(User $user){
        $user->delete();
        return redirect('/admin/user')->with('success', 'Data berhasil dihapus');
    }
}
