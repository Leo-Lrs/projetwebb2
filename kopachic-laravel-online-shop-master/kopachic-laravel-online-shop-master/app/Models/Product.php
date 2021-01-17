<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'quantity', 'weight', 'active', 'quantity_alert', 'image', 'description', 'category_id',
    ];

    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
