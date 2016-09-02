<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Product extends Model
{
    protected $table = 'contents';
    protected $fillable = [
        'title', 'description', 'categories_id', 'author', 'img', 'url', 'date','showhide',
    ];


}
