<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReCaptchaResponse extends Controller
{
    public $success;
    public $errorCodes;
}
