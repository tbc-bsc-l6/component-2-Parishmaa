<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface {
    public function store($data){
        try {
            DB::transaction(function () use($data){
                    $product_config = Product::create($data);
                    if (array_key_exists('img' , $data)) {
                        $product_config->addMedia($data['img'])->toMediaCollection('product-photo');
                    }
            });
            return ['response' => true , 'message' => 'Success'];
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            return ['response' => false , 'message' => $th->getMessage()];

        }
    }

    public function update($data){
        try {
            DB::transaction(function () use($data) {
                $media_configuration = Product::where('id' , $data['id'])->first();
                if (array_key_exists('img' , $data)) {
                    $config_data = Arr::except($data , ['id','_token','_method','img']);
                    $media_configuration->update($config_data);
                    $this->handleImages($media_configuration , 'product-photo' , $data['img']);
                }else {
                    $config_data = Arr::except($data , ['id','_token','_method']);
                    $media_configuration->update($config_data);
                }
            });

            return ['response' => true , 'message' => 'Updated'];
        } catch (\Throwable $th) {
            return ['response' => false , 'message' => $th->getMessage()];
        }
    }

    protected function handleImages($model , $collection_name , $img){
        if ($model->hasMedia($collection_name)) {
            $model->getMedia($collection_name)[0]->delete();
        }
        $model->addMedia($img)->toMediaCollection($collection_name);
    }

    protected function checkForImage($model , $index , $img_arr){
        foreach ($img_arr as $key => $img) {
            if ($index == $key) {
                $model->addMedia($img)->toMediaCollection('product-photo');
            }
        }
    }
}