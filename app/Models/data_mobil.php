<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_mobil extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_mobil',
        'kapasitas_mobil',
        'transmisi_mobil',
        'harga_mobil',
        'status_mobil',

        'created_at'
    ];

    public function urls()
    {
        return $this->hasMany(urls::class);
    }

    public function data_booking()
    {
        return $this->hasMany(data_bookings::class);
    }

}