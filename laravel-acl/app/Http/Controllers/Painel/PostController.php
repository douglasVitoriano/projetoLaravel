<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\http\Controllers\Controller;
use App\Post;
use Gate;

class PostController extends Controller
{

    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;

        if( Gate::denies('adm'))
        {
            return redirect()->back();
        }
    }

    public function index()
    {
        $posts = $this->post->all();

        return view('painel.posts.index', compact('posts'));
    }
}
