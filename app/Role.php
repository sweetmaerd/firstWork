<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = [
        'name','showhide'
    ];

    public function user() {
        $this->hasMany('App\User');
    }
}

