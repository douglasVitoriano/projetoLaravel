<?php

/*
* One To One
*/

Route::get('one-to-one', 'OneToOneController@oneToOne');
Route::get('one-to-one-inverse', 'OneToOneController@oneToOneInverse');
Route::get('one-to-one-insert', 'OneToOneController@oneToOneInsert');

/*
* One To many
*/
Route::get('one-to-many', 'OneToManyController@oneToMany');
Route::get('many-to-one', 'OneToManyController@ManyToOne');
Route::get('one-to-many-two', 'OneToManyController@oneToManyTwo');
Route::get('one-to-many-insert', 'OneToManyController@oneToManyInsert');

/*
*Has many Through
*/
Route::get('has-many-through', 'OneToManyController@hasManyThrough');

/*
* many to many
*/
Route::get('many-to-many', 'ManyToManyController@manyToMany');
Route::get('many-to-many-inverse', 'ManyToManyController@manyToManyInverse');
Route::get('many-to-many-insert', 'ManyToManyController@manyToManyInsert');

/*
*Relation Polymorphic
*/
Route::get('polymorphics', 'PolymorphicController@polymorphic');
Route::get('polymorphic-insert', 'PolymorphicController@polymorphicInsert');

Route::get('/', function () {
    return view('welcome');
});
