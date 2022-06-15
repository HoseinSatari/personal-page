<?php

use Illuminate\Support\Facades\Route;

if (! function_exists('isactive')){
    function isactive($key , $classname = 'active'){
        if (is_array($key)){
            return  in_array(Route::CurrentRouteName() , $key) ? $classname : '';
        }
        return Route::CurrentRouteName() == $key ? $classname : '' ;
    }
}
if (!function_exists('isUrl')) {

    function isUrl($url, $activeClassName = 'active')
    {
        return \request()->fullUrlIs($url) ? $activeClassName : '';
    }

}
if (!function_exists('url')) {

    function url($url, $activeClassName = 'current')
    {
        return \request()->url() == $url ? $activeClassName : '';
    }

}

if (!function_exists('qty')) {
    function qty($product)
    {

        if (\Illuminate\Support\Facades\Auth::check()) {
            $user = auth()->user();
            $qty = $user->cart->sum(function ($item) {
                $product = \App\Product::where('id', $item['product_id'])->first();
                if ($product->inventory > $item['qty']) {

                    return $product->inventory - $item['qty'];
                }
            });
            return $qty == '0' ? $product->inventory : $qty;
        }
    }
}
if (!function_exists('option')) {
    function option()
    {
        return \App\Models\Option::find(1);
    }
}
if (!function_exists('code')) {
    function code()
    {
        $code = mt_rand(100000, 999999);
        $status = \App\Models\order::where('order_code', $code)->first();
        if ($status) {
            $code = mt_rand(100000, 999999);
        }
        return $code;
    }
}
function convertPersianToEnglish($string)
{
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    $output = str_replace($persian, $english, $string);
    return $output;
}

if (!function_exists('code2')) {
    function code2()
    {
        $code = mt_rand(100000, 999999);
        $status = \App\Models\User::where('invited_code', $code)->first();
        if ($status) {
            $code = mt_rand(100000, 999999);
        }
        return $code;
    }
}
if (!function_exists('wallet')) {
    function wallet($id)
    {
        $sum = $id->products->sum(function ($product) {
            return $product->pivot->price * $product->pivot->quantity;
        });
        if ($id->discount->first() != null) {
            if ($id->discount->first()->type == 'int') {
                $sum -= $id->discount->first()->value;
            } else {
                $sum -= ($sum / 100) * $id->discount->first()->value;
            }
            if ($sum != $id->price) {
                $wallet = $sum - $id->price;
                return $wallet;
            }
            return 0;
        } else {
            if ($sum != $id->price) {
                $wallet = $sum - $id->price;
                return $wallet;
            }
            return 0;
        }
        return 0;
    }
}

function limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}
