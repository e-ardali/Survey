<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function surveys()
    {
        return $this->hasMany(Survey::class, 'shop_code', 'shop_code');
    }
}
