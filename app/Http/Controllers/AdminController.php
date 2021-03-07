<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        abort_unless(auth()->user()->hasRole('admin'), 403);

        return view('admin', [
            'users' => User::paginate(50)
        ]);

    }
}
