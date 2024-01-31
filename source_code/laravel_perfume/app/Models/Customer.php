<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    //disable created_at updated_at
    public $timestamps = false;

    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'phone_number', 'address', 'status'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('first_name', 'like', '%' . request('search') . '%')
                ->orWhere('last_name', 'like', '%' . request('search') . '%');
        }
    }
}
