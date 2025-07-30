<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image_url',
        'name',
        'brand_name',
        'condition',
        'description',
        'price',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
