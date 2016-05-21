<?php

namespace App\Http\Controllers\Admin;

use App\errors as Error;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User as User;
use Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission as Permission;
use Spatie\Permission\Models\Role as Roles;
use Validation;
use Webpatser\Uuid\Uuid as UUID;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show users home
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mainUsers() {
        $user = Auth::user();
        $usersList = User::all();

        $roles = Roles::where('name','!=','admin')->get();
        $permissions = Permission::all();

        return view('admin.users.main', ['user'=>$user, 'users'=>$usersList, 'roles'=>$roles]);
    }

    public function addUser() {
        $user = Auth::user();
        return view('admin.users.add', ['user' => $user]);
    }

    /**
     * User Validation and Creation
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createUser(Request $data) {
        $user = Auth::user();
        $message = [
            'required' => 'El campo :attribute es requerido.',
            'confirmed' => 'Las contraseñas no coinciden.',
            'min' => 'El campo :attribute debe de cumplir con el número de caracteres.'
        ];
        $this->validate($data, [
            'Nombre' => 'required',
            'Apellido' => 'required',
            'Email' => 'required',
            'Contraseña' => 'required|min:6|confirmed',
        ], $message);

        try {
            if(User::where('email','=',$data['Email'])->exists()){
                $status = (object) array(
                    'created' => 'error',
                    'message' => 'Ya hay un usuario registrado con ese email.',
                );
            }else{
                $saved_user = User::create([
                    'name' => $data['Nombre'],
                    'lastname' => $data['Apellido'],
                    'telephone' => $data['Telefono'],
                    'email' => $data['Email'],
                    'address' => $data['address'],
                    'age' => $data['Edad'],
                    'uuid' => UUID::generate(4),
                    'password' => bcrypt($data['Contraseña']),
                    'firstaccess' => 1,
                ]);

                $saved_user->assignRole($data['role']);

                $status = (object) array(
                    'created' => 'success',
                    'message' => 'Usuario creado satisfactoriamente.',
                );
            }
        } catch(\Exception $e) {
            Error::create([
                'user_id' => $user->id,
                'error' => 'Failed to create user',
                'description' => $e,
                'type' => 2,
            ]);
            $status = (object) array(
                'created' => 'error',
                'message' => 'Error creando usuario intente de nuevo.',
            );
        }

        return view('admin.users.add', ['user' => $user, 'status' => $status]);
    }

    /**
     * Delete User From Database
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function removeUser($uuid) {
        $requested_user = Auth::user();
        try{
            $user = User::where('uuid','=',$uuid)->delete();
        }Catch(\Exception $e){
            Error::create([
                'user_id' => $requested_user->id,
                'error' => 'Failed to create user',
                'description' => $e,
                'type' => 2,
            ]);
        }

        return redirect()->action('Admin\UsersController@mainUsers');
    }

    public function editUser($uuid) {
        $requested_user = Auth::user();
        if(User::where('uuid','=',$uuid)->exists()) {
            $updating_user = User::where('uuid','=',$uuid)->get()->first();
            return View('admin.users.update', ['user'=>$requested_user, 'update_user'=>$updating_user]);
        } else {
            Error::create([
                'user_id' => $requested_user->id,
                'error' => 'Failed to edit user, user not found.',
                'description' => $e,
                'type' => 2,
            ]);
            return View('admin.users.main',['user'=>$requested_user]);
        }
    }

    public function updateUser(Request $data) {
        $user = Auth::user();
        $message = [
            'required' => 'El campo :attribute es requerido.',
            'confirmed' => 'Las contraseñas no coinciden.',
            'min' => 'El campo :attribute debe de cumplir con el número de caracteres.'
        ];
        $this->validate($data, [
            'Nombre' => 'required',
            'Apellido' => 'required'
        ], $message);

        try {
            if(!User::where('email','=',$data['Email'])->exists()){
                $status = (object) array(
                    'created' => 'error',
                    'message' => 'No hay usuario registrado con este correo.',
                );
            }else{
                $to_edit = User::where('email','=',$data['Email'])->get()->first();
                $to_edit->name = $data['Nombre'];
                $to_edit->lastname = $data['Apellido'];
                $to_edit->address = $data['address'];
                $to_edit->age = $data['Edad'];

                $to_edit->save();

                $to_edit->removeRole('teacher');
                $to_edit->removeRole('student');

                $to_edit->assignRole($data['role']);

                $status = (object) array(
                    'created' => 'success',
                    'message' => 'Usuario actualizado satisfactoriamente.',
                );

                return view('admin.users.update', ['user' => $user, 'status' => $status, 'update_user'=>$to_edit]);
            }
        } catch(\Exception $e) {
            Error::create([
                'user_id' => $user->id,
                'error' => 'Failed to update user',
                'description' => $e,
                'type' => 2,
            ]);
            $status = (object) array(
                'created' => 'error',
                'message' => 'Error al editar usuario intente de nuevo.',
            );
        }

        return view('admin.users.update', ['user' => $user, 'status' => $status]);
    }
}
