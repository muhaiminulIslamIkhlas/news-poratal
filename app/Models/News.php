<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public function details(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(NewsDetails::class);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function subCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Subcategory', 'sub_category_id');
    }

    public function region(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\Region','news_id');
    }

    public function format(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'sort_description' => $this->sort_description,
            'order' => $this->order,
            'category' => $this->category->name,
            'time' => $this->created_at,
            'image' => $this->image,
            'type' => $this->type,
            'date' => $this->date
        ];
    }

    public function formatDetails(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'sort_description' => $this->sort_description,
            'order' => $this->order,
            'category' => $this->category->name,
            'sub_category' => $this->subCategory->name ?? '',
            'time' => $this->created_at,
            'image' => $this->image,
            'type' => $this->type,
            'details' => $this->details->details,
            'ticker' => $this->details->ticker,
            'representative' => $this->details->representative,
            'keyword' => $this->details->keyword,
        ];
    }

    public function filterFormat(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'sort_description' => $this->sort_description,
            'order' => $this->order,
            'category' => $this->category->name,
            'time' => $this->created_at,
            'image' => $this->image,
            'type' => $this->type,
            'date' => $this->date,
            'division' => $this->region->divisionInfo->bn_name ?? '',
            'district' => $this->region->districtInfo->bn_name ?? '',
            'upozilla' => $this->region->upozillaInfo->bn_name ?? '',
        ];
    }
}
