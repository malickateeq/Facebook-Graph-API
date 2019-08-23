<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $api;
    public function __construct(Facebook $fb)
    {
        // $this->middleware('auth');
        $this->middleware(function ($request, $next) use ($fb) {
            $fb->setDefaultAccessToken(Auth::user()->token);
            $this->api = $fb;
            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [];
        $params = "first_name,last_name,age_range,gender,email";
        $user = $this->api->get('/me?fields='.$params)->getGraphUser();

        $data['id'] = $user['id'];
        $data['first_name'] = $user['first_name'];
        $data['last_name'] = $user['last_name'];
        $data['email'] = $user['email'];
        // $data['user_birthday'] = "$user['user_birthday']";
        // dd($user);
        return view('home')->with('data', $data);
    }
}
