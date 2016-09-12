<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Content;
class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name','alias','showhide','parent_id'
    ];
    
    public function content()
    {
        return $this->hasMany('App\Content');
    }
}
