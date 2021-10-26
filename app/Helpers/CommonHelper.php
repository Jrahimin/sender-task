<?php

use Illuminate\Support\Facades\Redis;

if (!function_exists('storeCache')) {
    function __storeInCache($key, $value, $time=false)
    {
        $value = is_string($value) ? $value : json_encode($value);

        if($time)
            Redis::setex($key, 60, $value);
        else
            Redis::set('filter', $value);
    }
}
