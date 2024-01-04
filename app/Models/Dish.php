<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function dishCategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
