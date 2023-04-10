<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_pembayaran extends Model
{
    use HasFactory;
    protected $primaryKey = 'reference';
    public $incrementing = false;
    public $timestamps = false;
    protected $dates = ['created_at'];

    protected $fillable = [
        'data_booking_id',
        'reference',
        'merchant_ref',
        'Total_amount',
        'status',
        'created_at'
    ];

    public function data_booking()
    {
        return $this->hasOne(data_booking::class);
    }

}