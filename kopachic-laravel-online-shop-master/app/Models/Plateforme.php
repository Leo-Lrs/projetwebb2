<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plateforme extends Model
{
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
