<?php

namespace App\Http\Vender;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

class callTwitterApi
{

    private $t;

    public function __construct()
    {

        $this->t = new TwitterOAuth(config('services.stripe.tc_key'),config('services.stripe.tcs_key'),
            config('services.stripe.at_key'),config('services.stripe.iat_key'));
    }

    // ツイート検索
    public function serachTweets(String $searchWord)
    {
        $d = $this->t->get("search/tweets", [
            'q' => $searchWord,
            'count' => 3,
         ]);

        return $d->statuses;
    }

    public function getTrend(){

        $d = $this->t->get('trends/place', ['id' => '2345896']);
        foreach ($d->trends as $key => $trend) {
            // 接続に成功した場合に行う処理
                echo '<' . ++$key . '>' . PHP_EOL;
                echo '<h3 style="color:#1d2088"><a href="' . $trend->url . '"target="_blank" rel="noopener noreferrer">' . $trend->name . '</a></h3>' . PHP_EOL;
                echo $trend->tweet_volume . '件のツイート' . PHP_EOL;
                echo '<hr noshade>' . PHP_EOL;
            }
    }
}
