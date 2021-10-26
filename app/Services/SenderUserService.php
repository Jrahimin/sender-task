<?php


namespace App\Services;


use App\Entities\UserFilterEntity;
use App\Repositories\SenderUserRepository;
use Illuminate\Http\Request;

class SenderUserService
{
    protected $userRepository;

    public function __construct(SenderUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserList(Request $request)
    {
        $filterEntity = new UserFilterEntity();
        $filterEntity->year = $request->year;
        $filterEntity->month = $request->month;
        $filterEntity->page = $request->page;

        return $this->userRepository->getUserList($filterEntity);
    }
}
