<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\http\Controllers\Controller;
use App\Permission;
use Gate;

class PermissionController extends Controller
{
    private $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;

        if( Gate::denies('adm'))
        {
            return redirect()->back();
        }
    }
    
    public function index()
    {
        $permissions = $this->permission->all();

        return view('painel.permissions.index', compact('permissions'));
    }

    public function roles($id)
    {
        //recupera a permissão
        $permission = $this->permission->find($id);

        //recuperar permições
        $roles = $permission->roles()->get();

        return view('painel.permissions.roles', compact('permission', 'roles'));
    }
}
