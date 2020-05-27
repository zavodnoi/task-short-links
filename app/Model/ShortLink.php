<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function setExpiredAtAttribute($date)
    {
        if (!is_null($date)) {
            $this->attributes['expired_at'] = Carbon::parse($date)->format('Y-m-d');
        }
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'code';
    }

    /**
     * @return HasMany
     */
    public function clickthroughs(): HasMany
    {
        return $this->hasMany(Clickthrough::class);
    }
}
