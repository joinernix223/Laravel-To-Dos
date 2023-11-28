<?php

namespace App\Repositories;

use App\Models\User;

class UsersRepository extends BaseRepository
{
    public function model(): string
    {
        return User::class;
    }

    
    public function ajustData(array $input) //Usada para concordar los datos del form con la base de datos
    {
        $input['name'] = $input['name_user'];
        unset($input['name_user']);

        return $input;
    }

    
}