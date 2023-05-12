<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddQuestion extends Model
{

    protected $primaryKey = 'id';

    protected $fillable = [
        'question', 'answer', 'wrong','quiz_no',
    ];
}
