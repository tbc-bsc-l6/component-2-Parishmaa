<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'brand', 'name', 'price', 'description', 'availableSize', 'availableColor', 'category_id' 
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp')
            ->performOnCollections('product-photo')
            ->optimize()
            ->nonQueued();
    }

    public function category(){
        return $this->belongsTo(Category::class,"category_id", "id");
    }

    protected $appends = ['amount_with_currency'];  //accessor
    
    public function getAmountWithCurrencyAttribute()
    {
        return '$'.$this->price . ' ' . config('app.currency');
    }
}
