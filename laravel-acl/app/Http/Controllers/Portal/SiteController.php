<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class SiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        return view('portal.home.index');
    }

    public function update($idPost)
    {
        $post = Post::find($idPost);

        $this->authorize('update-post', $post);

        return view('post-update', compact('post'));
    }

    public function rolesPermissions()
    {
        $nameUser = auth()->user()->name;
        echo "<h1>{$nameUser}</h1>";

        foreach(auth()->user()->roles as $role)
        {
            echo "$role->name ->";

            $permissions = $role->permissions;

            foreach($permissions as $permission)
            {
                echo " $permission->name , ";
            }

            echo '<hr>';
        }
    }
}
