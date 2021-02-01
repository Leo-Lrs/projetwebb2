<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference', 'payment', 'state_id', 'user_id', 'purchase_order', 'total', 'invoice_id', 'invoice_number', 'created_at'
    ];

    public function adresses()
    {
        return $this->hasMany(OrderAddress::class);
    }
    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function payment_infos()
    {
        return $this->hasOne(Payment::class);
    }

    public function getPaymentTextAttribute($value)
    {
        $texts = [
        'carte' => 'Carte bancaire',
        'virement' => 'Virement',
        'cheque' => 'Chèque',
        'mandat' => 'Mandat administratif',
        ];
        return $texts[$this->payment];
    }
    public function getTotalOrderAttribute()
    {
        return $this->total;
    }
    public function getTvaAttribute()
    {
        return $this->total;
    }
    public function getHtAttribute()
    {
        return $this->total;
    }
}
