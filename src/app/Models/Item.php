<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
        'brand_id',
        'color_id',
        'sex_category_id',
        'genre_category_id',
        'state_id',
        'user_id'
    ];
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function genre_category()
    {
        return $this->belongsTo(GenreCategory::class);
    }
    public function sex_category()
    {
        return $this->belongsTo(SexCategory::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }
    }
}
