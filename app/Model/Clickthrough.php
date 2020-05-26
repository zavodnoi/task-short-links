<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Clickthrough extends Model
{
    protected $table = 'clickthroughs';

    protected $guarded = ['id'];

    protected $dates = ['visited_at'];
}
