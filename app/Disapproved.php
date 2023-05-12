<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disapproved extends Model
{
    // Table Name
    protected $table = 'disapproveds';
    // Primary Key
    protected $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
