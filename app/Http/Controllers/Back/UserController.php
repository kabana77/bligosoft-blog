<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\User;

class UserController extends Controller
{
    public function index(){
        return view('back.user.index', [
            'users' => User::latest()->get()
        ]);
    }
}
