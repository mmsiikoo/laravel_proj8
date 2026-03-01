<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name'];

    //зв'язок one-to-many (hasMany): категорія містить багато товарів
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
