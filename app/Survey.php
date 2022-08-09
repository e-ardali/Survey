<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_code', 'shop_code');
    }

    public function getArrStrengthsAttribute()
    {
        if ($this->strengths && json_decode($this->strengths)) {
            return Index::whereIn('id', json_decode($this->strengths, true))->pluck('title')->toArray();
        }
        return [];
    }

    public function getArrWeaknessesAttribute()
    {
        if ($this->weaknesses && json_decode($this->weaknesses)) {
            return Index::whereIn('id', json_decode($this->weaknesses, true))->pluck('title')->toArray();
        }
        return [];
    }

    public function getPointAttribute($value)
    {
        if ($this->attributes['point'] < 3) {
            return 'خیلی ضعیف';
        } elseif ($this->attributes['point'] < 5) {
            return 'ضعیف';
        } elseif ($this->attributes['point'] < 7) {
            return 'متوسط';
        } elseif ($this->attributes['point'] < 9) {
            return 'خوب';
        } else {
            return 'عالی';
        }
    }
}
