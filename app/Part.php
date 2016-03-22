<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    public $timestamps = false;

    protected $table = 'parts';

    protected $fillable = [
        'name',
        'description',
        'start',
        'finish'
    ];
}
