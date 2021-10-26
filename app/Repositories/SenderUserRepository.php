<?php


namespace App\Repositories;


use App\Entities\UserFilterEntity;
use App\Models\SenderUser;
use Illuminate\Support\Facades\Cache;

class SenderUserRepository
{
    protected $model;
    public function __construct()
    {
        $this->model = SenderUser::query();
    }

    public function getUserList(UserFilterEntity $filterEntity)
    {
        $filter = "{$filterEntity->year}-$filterEntity->month-{$filterEntity->page}";

        return Cache::remember($filter, 60, function() use ($filterEntity, $filter){
            __storeInCache('filter', $filter);

            if($filterEntity->year){
                $this->model->whereYear('dob', $filterEntity->year);
            }
            if($filterEntity->month){
                $this->model->whereMonth('dob', $filterEntity->month);
            }

            return $this->model->paginate(20);
        });
    }
}
