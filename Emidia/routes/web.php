<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('admin/listareceitas', 'Admin\ListaReceitasController');

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    $this->get('/', 'AdminController@index')->name('admin.home');

    $this->get('listareceitas', 'ListaReceitasController@index')->name('admin.listareceitas'); 
    $this->get('cadastro', 'CadastroReceitasController@index')->name('admin.cadastro');

    //$this->post('listareceitas', 'ListaReceitasController@create')->name('admin.listareceitas');
    $this->post('cadastro', 'CadastroReceitasController@store')->name('admin.cadastro');
});

$this->get('/', 'Site\SiteController@index')->name('home');

Auth::routes();