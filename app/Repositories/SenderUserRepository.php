<?php


namespace App\Repositories;

use App\Entities\UserFilterEntity;
use App\Models\SenderUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SenderUserRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = DB::table('sender_users');
    }

    public function getUserList(UserFilterEntity $filterEntity, Request $request)
    {
        $filterEntity->newKey = "{$filterEntity->year}-$filterEntity->month";
        $filterEntity->oldKey = __getFromCache('filter',true);
        $userList = null;

        if($filterEntity->newKey === $filterEntity->oldKey){
            $userList = __getFromCache($filterEntity->newKey);
            if($userList)
                return __paginate($userList, $request);
        }

        if(!$filterEntity->year && !$filterEntity->month){
            $userList = $this->getAllUserChunked();

            __storeInCache('filter', $filterEntity->newKey);
            __storeInCache($filterEntity->newKey, $userList,60);

            return __paginate($userList, $request);
        }

        if($filterEntity->year){
            $this->model->whereYear('dob', $filterEntity->year);
        }
        if($filterEntity->month){
            $this->model->whereMonth('dob', $filterEntity->month);
        }

        $userList = $this->model->get();

        __storeInCache('filter', $filterEntity->newKey);
        __storeInCache($filterEntity->newKey, $userList,60);

        return __paginate($userList, $request);
    }

    protected function getAllUserChunked()
    {
        $users= [];
        ini_set('memory_limit', '512M');
        SenderUser::chunk(20000, function ($itemList) use (&$users){
            $users = array_merge($users, $itemList->toArray());
        });

        return $users;
    }
}
