<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Services\TrainService;
use App\Services\TestService;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $_trainService = false;
    protected $_testService = false;
    public function __construct()
    {
        $this->trainService();

    }

    public function trainService()
    {
        $this->_trainService = new TrainService();
        $this->_testService = new TestService();
    }

    public function test(){

        $this->_testService->getTest();
        dd('ok');
    }
}
