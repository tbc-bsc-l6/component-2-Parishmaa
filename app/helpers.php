<?php

use App\Models\AddtoCart;
use App\Models\GeneralSetting;
use App\Models\Product;
use App\Models\Section;
use App\Models\SocialMedia;
use App\Models\Footer;

// if (!function_exists('social_media')) {
//     function social_media(){
//         $social_medias = SocialMedia::all();
//         return $social_medias;
//     }
// }
// if (!function_exists('web_configs')) {
//     function web_configs(){
//         $web_settings = GeneralSetting::where('setting_name','Web Configurations')->with('media')->first();
//         if($web_settings!==null){
//             $web_settings["json_data"] = collect(json_decode($web_settings['json_data'])); 
//         }
//         return $web_settings;
//     }
// }
// if (!function_exists('qr_code')) {
//     function qr_code(){
//         $web_settings = GeneralSetting::where('setting_name','QR')->with('media')->first();
//         if($web_settings!==null){
//             $web_settings["json_data"] = collect(json_decode($web_settings['json_data'])); 
//         }
//         return $web_settings;
//     }
// }
if (!function_exists('products')) {
    function latest_news(){
        $products = Product::latest()->take(5)->get();
        return $products;
    }
}
if (!function_exists('cartCount')) {
    function cartCount(){
        if(auth()->user()){

            $carts = AddtoCart::where("user_id",auth()->user()->id)->get();
            return count($carts);
        }else{
            return 0;
        }
    }
}