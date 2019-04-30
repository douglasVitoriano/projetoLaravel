<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class State extends Model
{   
    protected $fillable = ['name', 'initials'];

    public function country()
    {
        return $this->belongsto(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
