<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\ApiResponse;

class Controller extends BaseController
{
    use ApiResponse,AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
