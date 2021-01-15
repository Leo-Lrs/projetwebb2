<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function avis(): BelongsToMany
    {
        return $this->belongsToMany(Avis::class);
    }
}
