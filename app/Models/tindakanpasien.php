<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\jpItem;

class tindakanpasien extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    public function jpitem()
    {
        return $this->belongsTo(jpitem::class);
    }
}
