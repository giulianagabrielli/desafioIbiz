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

        $users = User::where('status_id', 1)->get();
        return view('User.activeUsers', ["users"=>$users]);

    }   

    //visualização de usuários inativos (status_id = 2)
    public function getInactiveUsers (Request $request) {

        $users = User::where('status_id', 2)->get();
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


    
}
