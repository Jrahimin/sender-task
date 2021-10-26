<?php

namespace App\Http\Controllers;

use App\Services\SenderUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SenderUserController extends Controller
{
    protected $userService;
    public function __construct(SenderUserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        try{
            $userList = $this->userService->getUserList($request);
            $requestData = $request->all();

            return view('users', compact('userList', 'requestData'));
        }
        catch (\Exception $e){
            Log::error('Found Exception: ' . $e->getMessage() . ' [Script: ' . __CLASS__.'@'.__FUNCTION__ . '] [Origin: ' . $e->getFile() . '-' . $e->getLine() . ']');
            abort(500);
        }
    }

}
