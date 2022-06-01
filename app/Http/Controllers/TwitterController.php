<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Vender\CallTwitterApi;

class TwitterController extends Controller
{
    // 投稿
    public function index(Request $request)
    {
        $t = new CallTwitterApi();
        $data=$t->get_trend();
        //$tweet=$t->get_tweet();
        return view('twitter/twitter', compact('data'));
        //return view('twitter/twitter', compact('data','tweet'));

    }
}
