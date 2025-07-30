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

    public function categories(){
        return $this->belongsToMany(Category::class, 'category_item', 'item_id', 'category_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function getImageFullPathAttribute(){
        if (Storage::disk('public')->exists('items/' . $this->image_url)) {
            return asset('storage/items/' . $this->image_url); //本番環境の画像
        }

        return asset('items/' . $this->image_url); // ダミーの画像
    }
}
