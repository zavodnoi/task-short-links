<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Clickthrough extends Model
{
    protected $table = 'clickthroughs';

    protected $guarded = ['id'];

    protected $dates = ['visited_at'];

    /**
     * @param $visited_at
     * @return string
     */
    public function getVisitedAtAttribute($visited_at): string
    {
        return Carbon::parse($visited_at)->format('d.m.Y H:i:s');
    }

}
