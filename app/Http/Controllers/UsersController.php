<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUsersFormRequest;


class UsersController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        
        return view('users.index', ['users' => $users]);
    }

    public function store(StoreUsersFormRequest $request)
    {
        $user = new User();
        $user->name = $request->name_user;
        $user->email = $request->email;
        //$user->password = bcrypt($request->password); 
        $user->password = $request->password; 
        
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'Usuario agregado correctamente');
    }

    public function show(Request $request, $id)
    {
        $user = User::find($id);

        return view('users.show', ['user' => $user, 'users' => $user]);
    }

    public function update(Request $request,$id)
    {
        $user = User::find($id);
        $user -> name = $request->name_user;
        $user -> email = $request->email;
        $user-> password = $request->password; 
        //$user -> password = bcrypt($request->password);
        
        $user->save();
        return redirect()->route('users.index')->with('success', 'Usuario Actualizado Correctamente');
    }

    public function create()
    {
        return view('users.create');
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        $user -> delete();

        return redirect()->route('users.index')->with('success', 'Usuario Eliminado Correctamente');
    }
    
}
