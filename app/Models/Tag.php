<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = ['name'];

    //зв'язок many-to-many: тег належить багатьом товарам
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
