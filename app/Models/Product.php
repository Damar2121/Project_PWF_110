<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['user_id', 'category_id', 'name', 'qty', 'price'];

    // Relasi ke User (Satu Product dimiliki oleh satu User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Category (Satu Product memiliki satu Category)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
