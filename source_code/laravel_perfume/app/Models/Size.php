<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = ['size_name'];
    protected $table = 'sizes';
    public function product(){
        return $this->hasMany(Product::class);
    }
    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('size_name', 'like', '%' . request('search') . '%');
        }
    }

}
