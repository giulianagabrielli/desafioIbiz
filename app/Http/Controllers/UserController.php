<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Access_level;
use App\Status;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //visualização de usuários ativos (status_id = 1)
    public function getActiveUsers (Request $request) {

        $users = User::join('access_levels', 'users.access_level_id', '=', 'access_levels.id')->where('status_id', 1)->select('users.id', 'users.name', 'users.email', 'access_levels.access_level', 'users.created_at', 'users.updated_at')->orderBy('id')->get();

        return view('User.activeUsers', ["users"=>$users]);

    }   

    //visualização de usuários inativos (status_id = 2)
    public function getInactiveUsers (Request $request) {

        $users = User::join('access_levels', 'users.access_level_id', '=', 'access_levels.id')->where('status_id', 2)->select('users.id', 'users.name', 'users.email', 'access_levels.access_level', 'users.created_at', 'users.updated_at')->orderBy('id')->get();

        return view('User.inactiveUsers', ["users"=>$users]);

    } 

    //edição de usuários
    public function updateUser(Request $request, $id=0){
            
        if($request->isMethod('GET')){
           
            $user = User::find($id);
            
            if($user){
                return view('User.updateUser', ["user"=>$user]);
            } else {
                return view('User.updateUser');
            }
        } else {
            
            //alterando dados na tabela Users:
            $user = User::find($request->id); 
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->access_level_id = $request->access_level_id;
            $user->status_id = $request->status_id;
            
            $result = $user->save();
    
            return view('User.updateUser', ["result"=>$result]);
        }
    }

    //deleção de usuários
    public function deleteUser(Request $request, $id=0){
        $result = User::destroy($id);
        if($result){
            return redirect('/usuarios/ativos'); 
        }
    } 

    //visualizando usuários admin ativos
    public function getAdminActive(Request $request){

        $users = User::where([
            ['status_id', 1],
            ['access_level_id', 1]
            ])->get();

        return view('User.adminActive', ["users"=>$users]);

    }

    //visualizando usuários gerentes ativos
    public function getManagerActive(Request $request){

        $users = User::where([
            ['status_id', 1],
            ['access_level_id', 2]
            ])->get();

        return view('User.managerActive', ["users"=>$users]);

    }

    //visualizando usuários consultores ativos
    public function getConsultantActive(Request $request){

        $users = User::where([
            ['status_id', 1],
            ['access_level_id', 3]
            ])->get();

        return view('User.consultantActive', ["users"=>$users]);

    }

    //visualizando usuários admin inativos
    public function getAdminInactive(Request $request){

        $users = User::where([
            ['status_id', 2],
            ['access_level_id', 1]
            ])->get();

        return view('User.adminInactive', ["users"=>$users]);

    }

    //visualizando usuários gerentes inativos
    public function getManagerInactive(Request $request){

        $users = User::where([
            ['status_id', 2],
            ['access_level_id', 2]
            ])->get();

        return view('User.managerInactive', ["users"=>$users]);

    }

    //visualizando usuários consultores inativos
    public function getConsultantInactive(Request $request){

        $users = User::where([
            ['status_id', 2],
            ['access_level_id', 3]
            ])->get();

        return view('User.consultantInactive', ["users"=>$users]);

    }

    //cadastro de novo usuário pelo admin
    public function registerUser(Request $request){

        if($request->isMethod('GET')){

            return view('User.registerUser');
        } else {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->cpf = $request->cpf;
            $user->access_level_id = $request->access_level_id;
            $user->status_id = $request->status_id;

            $result = $user->save();

            return view('User.registerUser', ["result"=>$result]);

        }

    }




}
