<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Index extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $appends = array('type_str');

    public function getTypeStrAttribute()
    {
        if ($this->type == 1) {
            $typeStr = 'نقطه قوت';
        } elseif ($this->type == 2) {
            $typeStr = 'نقطه ضعف';
        } else {
            $typeStr = null;
        }

        return $typeStr;
    }
}
