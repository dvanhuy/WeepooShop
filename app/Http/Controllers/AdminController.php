<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getFiguresForm(){
        return view("Admin.manageFigures");
    }
    public function getUsersForm(){

        $user10row = User::limit(10)->get();
        return view("Admin.manageUsers",["users"=>$user10row]);
    }
}
