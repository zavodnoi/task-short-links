<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class ShortLink extends Model
{
    protected $guarded = ['id'];
    protected $dates = ['expired_at'];

    /**
     * @return Collection
     */
    public function getList(): Collection
    {
        return $this->where('session_id', Session::getId())->get();
    }


}
