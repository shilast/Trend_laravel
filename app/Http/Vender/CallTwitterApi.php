<?php

namespace App\Http\Vender;

use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

class callTwitterApi
{
    private $twi;
    private $CK = 'QT6eXIOM96jSULov1sRp83vOy';
    private $CS = 'JwMlrcMQrB4JtvgL6xdfnNphhpDa89vosp8v9BNLGq54fcHcXU';
    private $AT = '839111512652304384-dRYyjCe1h0fXTsa68DwNqt2FtEKtJp1';
    private $AS = 'hzS5DGWkkfphsAiUavxyP4PPkFwkjRwmABtgXDusNZSxM';
    private $bearer = 'AAAAAAAAAAAAAAAAAAAAAGzlbwEAAAAAtzRp5yAIkdBaKB8PV0yT0gE%2BeZs%3DogGBL4me9KLuvuIeBepihUXwQqeQtuxUBDrxPLX6lOrlTjezlM';

    public function __construct()
    {
        $this->twi = new TwitterOAuth(
            $this->CK,
            $this->CS,
            $this->AT,
            $this->AS

        );
        //$this->twi->setApiVersion('2');
    }


    public function get_trend(){


        $request=$this->twi->OAuthRequest("https://api.twitter.com/1.1/trends/place.json","GET",array("id"=>'23424856'));
        $data =  json_decode($request,true);
        return $data;
    }
    public function get_tweet(){

        $query = "美味しい #ラーメン -is:retweet -has:mentions"; // RTを除外したい時


        $params = [
    /*
    ※queryとmax_resultは必須
    */
            "query" => $query,
            "start_time" => "2022-5-21T00:00:00+09:00",
            "end_time" => "2022-5-27T00:00:00+09:00",
            "tweet.fields" => "author_id,created_at", // 今回は追加で投稿日時を指定
            'expansions' => 'author_id',
            "user.fields" => "id,name,username,description,profile_image_url",//画像サイズは _normal を消せばオリジナルサイズになる
            "max_results" => 100 // 10～100の間を指定
        ];

        $res = $this->twi->get("tweets/search/recent", $params);
        return $res;
    }

}
