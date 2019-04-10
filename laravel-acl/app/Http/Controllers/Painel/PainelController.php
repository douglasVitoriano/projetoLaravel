<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\http\Controllers\Controller;
use App\Post;
use App\User;
use App\Role;
use App\Permission;

class PainelController extends Controller
{
    public function index()
    {
        $totalUsers       = User::count();
        $totalRoles       = Role::count();
        $totalPermissions = Permission::count(); 
        $totalPosts       = Post::count();

        return view('painel.home.index', compact('totalUsers', 
                                                    'totalRoles', 
                                                    'totalPermissions', 
                                                    'totalPosts'));
    }
}
