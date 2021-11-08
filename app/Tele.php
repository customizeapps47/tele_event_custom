<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tele extends Model
{
    // use HasFactory;
    protected $table = 'teles';
    protected $fillable = [
        'name',
        'user_id',
        'tele_id',
        'status',
        'registration_for',
    ];
}
