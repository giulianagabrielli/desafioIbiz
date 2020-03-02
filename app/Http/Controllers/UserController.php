<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Status;
use Illuminate\Support\Facades\Hash;
use Gate;

class UserController extends Controller
{
    //os métodos de User com middleware
    public function __construct(){
        $this->middleware('auth');
    }

    //visualização de usuários ativos (status_id = 1)
    public function getActiveUsers (Request $request) {

        $users = User::where('status_id', 1)->select('users.id', 'users.name', 'users.email', 'users.created_at', 'users.updated_at')->orderBy('id')->get();

        return view('User.activeUsers', ["users"=>$users]);

    }   

    //visualização de usuários inativos (status_id = 2)
    public function getInactiveUsers (Request $request) {

        if(Gate::denies('admin-role')){
            return redirect("/usuarios/ativos");

        } else {
            $users = User::where('status_id', 2)->select('users.id', 'users.name', 'users.email', 'users.created_at', 'users.updated_at')->orderBy('id')->get();
    
            return view('User.inactiveUsers', ["users"=>$users]);
        }

    } 

    //edição de usuários
    public function updateUser(Request $request, $id=0){
            
        if($request->isMethod('GET')){
           
            if(Gate::denies('admin-role')){
                return redirect("/usuarios/ativos");
            } else {
                
                $user = User::find($id);
                $roles = Role::all();
                return view('User.updateUser', ["user"=>$user, "roles"=>$roles]);

            }
           
        } else {
            
            //alterando dados na tabela Users:
            $user = User::find($request->id); 
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->status_id = $request->status_id;
            $user->roles()->sync($request->roles);
            
            $result = $user->save();
    
            return view('User.updateUser', ["result"=>$result]);
        }
    }

    //deleção de usuários
    public function deleteUser(Request $request, $id=0){

        if(Gate::denies('admin-role')){
            return redirect('/usuarios/ativos'); 
        } else {
            $result = User::destroy($id);
            return redirect('/usuarios/ativos'); 
        }
        
    } 

    //cadastro de novo usuário pelo admin 
    public function registerUser(Request $request){

        if($request->isMethod('GET')){

            if(Gate::denies('admin-role')){
                return redirect('/usuarios/ativos'); 
            } else {
                return view('User.registerUser');
            }

        } else {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->cpf = $request->cpf;
            $user->access_level_id = $request->access_level_id;
            $user->status_id = $request->status_id;

            $role = Role::select('id')->where('name', 'consultor')->first();

            $user->roles()->attach($role);

            $result = $user->save();

            return view('User.registerUser', ["result"=>$result]);

        }

    }




}
