<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
        protected $guarded = [];
      protected $table = 'month';
      protected $primaryKey = 'mid';
      public $timestamps = false;
}
