<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['product_name', 'price', 'description', 'image', 'category_id', 'country_id', 'age_id', 'brand_id'];
    protected $table = 'products';


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('product_name', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        }
    }
}
