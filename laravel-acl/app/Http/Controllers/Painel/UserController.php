<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\http\Controllers\Controller;
use App\User;
use Gate;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;

        if(Gate::denies('user'))
        {
            return redirect()->back();
        }
    }

    public function index()
    {
        $users = $this->user->all();
        
        return view('painel.users.index', compact('users'));
    }

    public function roles($id)
    {
        //recupera o usuario
        $user = $this->user->find($id);

        //recuperar roles
        $roles = $user->roles()->get();

        return view('painel.users.roles', compact('user', 'roles'));
    }
}