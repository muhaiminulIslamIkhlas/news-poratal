<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public function details()
    {
        return $this->hasOne(NewsDetails::class);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function format()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'sort_description' => $this->sort_description,
            'order' => $this->order,
            'category' => $this->category->name,
            'time' => $this->created_at,
            'image' => $this->image,
            'type' => $this->type
        ];
    }
}
