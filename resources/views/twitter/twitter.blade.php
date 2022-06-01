@extends('main')

@section('content')
<hr>
<?php

foreach ($data[0]['trends'] as $key=>$item) {
    echo ($key+1)."位"."<br />";
    echo "<a href =". $item['url'].">".$item['name']."</a><br>";
    if($item['tweet_volume']!=null){
        echo $item['tweet_volume']."件";
    }
    echo "<hr>";
}

?>

@endsection

