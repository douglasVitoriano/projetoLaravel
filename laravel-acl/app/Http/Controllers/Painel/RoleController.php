<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\http\Controllers\Controller;
use App\Role;

class RoleController extends Controller
{
    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;

        if( Gate::denies('adm'))
        {
            return redirect()->back();
        }
    }

    public function index()
    {
        $roles = $this->role->all();

        return view('painel.roles.index', compact('roles'));
    }
    
    public function permissions($id)
    {
        //recupera o role
        $role = $this->role->find($id);

        //recuperar permições
        $permissions = $role->permissions()->get();
        
        return view('painel.roles.permissions', compact('role', 'permissions'));
    }
}
