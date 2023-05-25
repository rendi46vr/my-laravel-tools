<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\jpItem;

class jenispemeriksaan extends Model
{
    use HasFactory;
    protected $guarded = ["id"];


    public function items()
    {
        return $this->hasMany(jpItem::class);
    }
}
