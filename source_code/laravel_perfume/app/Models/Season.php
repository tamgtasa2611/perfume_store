<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $fillable = ['season_name'];
    protected $table = 'seasons';
    public function product(){
        return $this->hasMany(Product::class);
    }
    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('season_name', 'like', '%' . request('search') . '%');
        }
    }

}
