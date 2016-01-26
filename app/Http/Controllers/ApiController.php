<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function index() {

        return Article::all();
    }

    public function token() {

        $user = \Auth::guard('api')->user();

        $user->api_token = str_random(60);
        $user->save();

        return $user->api_token;
    }
}
