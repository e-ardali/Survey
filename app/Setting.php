<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeInfo($query)
    {
        $records = $query->get();
        $names = $records->pluck('name');

        $info = [];
        if (count($names)) {
            foreach ($names as $name) {
                $value = $records->where('name', $name)->first();
                if ($value) {
                    if($value->type == 'json') {
                        $value = json_decode($value->value, true);
                    } else {
                        $value = $value->value;
                    }
                }
                $info[$name] = $value;
            }
        }
        return $info;
    }
}
