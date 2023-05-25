<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\diagnosa;

class diagnosapasien extends Model
{
    use HasFactory;
    protected $guarded = ['id'];



    public function diagnosa()
    {
        return $this->belongsTo(diagnosa::class);
    }
}
