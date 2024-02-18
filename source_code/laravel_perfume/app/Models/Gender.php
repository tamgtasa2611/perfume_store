<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $fillable = ['gender_name'];
    protected $table = 'genders';
    public function product(){
        return $this->hasMany(Product::class);
    }
}
