<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AddtoCart extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;


    protected $fillable=[
        'quantity',
        'product_id',
        'user_id',
    ];
    public function product(){
        return $this->belongsTo(Product::class,"product_id", "id");
    }
}
