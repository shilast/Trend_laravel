<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Vender\CallTwitterApi;



// トレンドを取得する

class TrendController extends Controller
{
    public function index(){
        $t = new CallTwitterApi();
        $d = $t->getTrend();
        foreach ($d[0]->trends as $key => $trend) {
            // 接続に成功した場合に行う処理
                echo '<' . ++$key . '>' . PHP_EOL;
                echo '<h3 style="color:#1d2088"><a href="' . $trend->url . '"target="_blank" rel="noopener noreferrer">' . $trend->name . '</a></h3>' . PHP_EOL;
                echo $trend->tweet_volume . '件のツイート' . PHP_EOL;
                echo '<hr noshade>' . PHP_EOL;
            }
    }

}

