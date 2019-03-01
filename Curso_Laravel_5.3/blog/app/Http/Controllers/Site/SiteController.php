<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\controller;

class SiteController extends Controller
{
    public function index()
    {
        $title = '1 2 3';
        
        return view('site.home.index', compact('title'));
    }

    public function contato()
    {
        return view('site.contact.index');
    }

    public function categoria($id)
    {
        return "Paje Categoria: {$id}";
    }

    public function categoriaOp($id = 1)
    {
        return "Paje Categoria: {$id}";
    }
}
