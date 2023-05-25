<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\diagnosapasien;

class diagnosa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function diagnosapasien()
    {
        return $this->hasMany(diagnosapasien::class);
    }
}
