<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Models
use App\Models\User;
//FormRequest
use App\Http\Requests\StoreUsersFormRequest;
use App\Http\Requests\ShowUsersFormRequest;
use App\Http\Requests\UpdateUsersFormRequest;
use App\Http\Requests\DeleteUsersFormRequest;
//Repositories
use App\Repositories\UsersRepository;
class UsersController extends Controller
{
    //
    public function __construct (UsersRepository $UsersRepository)
    {
        $this->userRepository = $UsersRepository;
    }
    public function index()
    {
        $users = $this->userRepository->all();
        
        return view('users.index', ['users' => $users]);
    }

    public function store(StoreUsersFormRequest $request)
    {
        $input = $request->validated();
        //$input['name'] = $input['name_user'];
        
        //dd($input);
        $adjustedInput = $this->userRepository->ajustData($input);
        $this->userRepository->create($adjustedInput);
        
    
        return redirect()->route('users.index')->with('success', 'Usuario agregado correctamente');
    }

    public function show(ShowUsersFormRequest $request, $id)
    {
        $user = $this->userRepository->find($id);
        if(!$user){
           return redirect()->route('users.index')->with('error', 'El Usuario no existe');
        }
        

        return view('users.show', ['user' => $user, 'users' => $user]);
    }

    public function update(UpdateUsersFormRequest $request,$id)
    {
        
        //$user = $this->userRepository->update($id);
        
        $input = $request->validated();
        //dd($input);
        $adjustedInput = $this->userRepository->ajustData($input);
         
        $this->userRepository->update($adjustedInput,$id);
        //$user -> password = bcrypt($request->password);
        
        
        return redirect()->route('users.index')->with('success', 'Usuario Actualizado Correctamente');
    }

    public function create()
    {
        return view('users.create');
    }

    public function destroy(DeleteUsersFormRequest $request, $id)
    {
        $user = $this->userRepository->delete($id);

        return redirect()->route('users.index')->with('success', 'Usuario Eliminado Correctamente');
    }
    
}
