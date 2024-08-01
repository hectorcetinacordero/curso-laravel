<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosController extends Controller
{
    /**
     * This function is responsible for initializing the admin role and a test permission,
     * then assigning the test permission to the admin role.
     *
     * @return void
     */
    public function index()
    {
        // Crear un rol 'admin'
        $admin = Role::create(['name' => 'admin']);

        // Crear un permiso 'permiso prueba'
        $permiso = Permission::create(['name' => 'permiso prueba']);

        // asignar el 'permiso prueba' al rol 'admin'
        $permiso->assignRole($admin);

        //Asignar el rol 'admin' al usuario 1
        $user = User::find(1);
        $user->assignRole('admin');
    }
}
