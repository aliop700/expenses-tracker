<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Domain\User\Models\User;

class AdminsController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
    
        return view('admins.index',compact('users'));
    }
}
