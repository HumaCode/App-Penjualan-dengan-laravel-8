<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['pencarian'] ?? false, function ($query, $pencarian) {
            return $query->where('nama', 'like', '%' . $pencarian . '%');
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
