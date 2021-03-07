<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExplorarController extends Controller
{

    public function index(){

        return view('explorar', [
            'users' => User::paginate(50)
        ]);

    }

}
