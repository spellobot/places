<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Businesses extends Model
{
    protected $fillable = ['name', 'address', 'vat_number', 'phone', 'email', 'status', 'category_id'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
