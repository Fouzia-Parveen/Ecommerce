<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function login(Request $req)
    {
     $user=User::where(['email'=>$req->email])->first();
    

     if(!$user) 
     {   
     return "user name not matching";
     }
     if(!Hash::check($req->password,$user->password))
     {   
       
        return "password not matching";
    }
     else
     {  
        $req->session()->put('user',$user);

        redirect('/');
     }

    }
}
