<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SummaryResult extends Model
{
    protected $fillable = [
        'correctAnswer', 'wrongAnswer', 'remark', 'maxedQuestion','userID','fullName',
    ];

     // Table Name
     protected $table = 'summary_results';
     // Primary Key
     protected $primaryKey = 'id';
     // Timestamps
     public $timestamps = true;
     
}
