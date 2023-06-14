<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\jenispemeriksaan;
use App\Models\tindakanpasien;

class jpItem extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function jenispemeriksaan()
    {
        return $this->belongsTo(jenispemeriksaan::class);
    }
    public function tindakanpasien()
    {
        return $this->hasMany(tindakanpasien::class);
    }
}
