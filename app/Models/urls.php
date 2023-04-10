<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class urls extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'ID_Mobil',
        'img_url',
    ];

    public function data_mobil(){
        return $this->belongsTo(data_mobil::class);
    }
}
