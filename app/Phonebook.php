<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Phonebook extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'phone'
    ];
    
    protected $dates = ['deleted_at'];
    
}
