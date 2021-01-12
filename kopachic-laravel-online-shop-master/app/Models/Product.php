<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'quantity', 'plateforme', 'active', 'quantity_alert', 'image', 'description'];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
