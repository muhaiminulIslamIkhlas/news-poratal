<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
//    use HasFactory;

    public function details()
    {
        return $this->hasOne(NewsDetails::class);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }
}
