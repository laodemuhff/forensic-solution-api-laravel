<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Hash;

class ProfilController extends Controller
{
    public function index(){
        $id_user = auth('api')->user()->id;

        $data =  User::where('id', $id_user)->first();

        if($data){
            if(!empty($data['admin'])){
                $data['role'] = 'admin';
            }else{
                $data['role'] = 'investigator';
            }
    
            return response()->json(['status' => 'success', 'result' => $data]);
        }

        return response()->json(['status' => 'fail', 'message' => 'Something went wrong']);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:6',
            'email' => 'required|email'
        ]);

        if($validator->fails()){
            return response()->json(['status' => 'fail', 'message' => $validator->errors()]);
        }

        $id_user = auth('api')->user()->id;

        $update = User::where('id', $id_user)->update($request->all());

        if($update){
            return response()->json(['status'=>'success', 'result' => User::where('id', $id_user)->first()]);
        }

        return response()->json(['status' => 'fail', 'message' => 'Failed to update data']);
    }

    public function updatePassword(Request $request){
        $id_user=auth('api')->user()->id;

        $validator = Validator::make($request->all(), [
            'current_password'=>'required',
            'password'=>'required|confirmed'
        ]);

        if($validator->fails()){
            return response()->json(['status' => 'fail', 'message' => $validator->errors()]);
        }
       
        if(!password_verify($request->all()['current_password'], User::where('id', $id_user)->first()['password'])){
            return response()->json(['status' => 'fail', 'message' => 'Current Password is wrong']);
        }

        $update=User::where('id', $id_user)->update(['password'=> Hash::make($request->all()['password'])]);

        if($update){
            return response()->json(['status'=>'success','message'=>'Password successfully changes']);
        }

        return response()->json(['status'=>'fail','message'=>'Password failed to changes']);

    }

    public function recommendedTools(){
        
    }
}
