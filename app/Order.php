<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'fio', 'phone', 'user_id', 'email', 'status', 'tovar'
    ];
}
