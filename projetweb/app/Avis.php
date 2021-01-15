<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Avis extends Model
{
    public function produits(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
