<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{

    public  function  store(User $user){
        //El usuario autenticado sigue al del perfil en el que esta

        if (auth()->user()->following($user)){

            auth()->user()->unfollow($user);

        }
        else{
            auth()->user()->follow($user);

        }

        return redirect()->back();
    }
}
