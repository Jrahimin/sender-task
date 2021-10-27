<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

if (!function_exists('storeCache')) {
    function __storeInCache($key, $value, $time=false)
    {
        if($time){
            Redis::setex($key, 60, json_encode($value));
        } else{
            Redis::set('filter', $value);
        }
    }
}

if (!function_exists('getCache')) {
    function __getFromCache($key, $isPlain=false)
    {
        if($isPlain)
            return Redis::get($key);

        return json_decode(Redis::get($key),true);
    }
}

if (!function_exists('paginate')) {
    function __paginate($items, Request $request, $perPage = 20, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        $paginatedData = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);

        return $paginatedData->setPath($request->url());
    }
}
