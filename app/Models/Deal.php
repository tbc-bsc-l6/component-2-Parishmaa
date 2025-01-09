<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'price',
        'discount',
        'expiration_date',
        'status',
        'type',
        'category',
    ];
    /**
     * Validation rules for the model.
     *
     * @return array
     */
    public static function rules()
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'discount' => 'required|integer',
            'expiration_date' => 'required|date',
            'status' => 'required|string|in:active,inactive,expired',
            'type' => 'required|string',
            'category' => 'required|string',
        ];
    }
}
