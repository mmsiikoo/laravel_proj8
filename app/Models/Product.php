<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    //поля із заповненням
    protected $fillable = ['name', 'price', 'category_id'];

    //зв'язок one-to-many (belongsTo): один товар належить до однієї категорії
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    //зв'язок many-to-many (belongsToMany): один товар може мати багато тегів
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
