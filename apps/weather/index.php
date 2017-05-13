<?php
  $url='http://weather.naver.com/rgn/cityWetrCity.nhn?cityRgnCd=CT010011';

  $ch = curl_init();
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_POST,false);   //GET 전송방식
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  $response=curl_exec($ch);
  $slidePoint1=strpos($response,'<div class="c_tit2" id="content_sub">');
  $slideStrCount=strpos($response,'<div class="c_tit">')-$slidePoint1;
  $contents=substr($response,$slidePoint1,$slideStrCount);


  //온도 오전 오후 Return $Forecast_temp
  preg_match_all('/<span class=\"temp\">[^<]*/',$contents,$matchs);
  $forecast_temp=array();
  for($i=0;$i<7;$i++){
    // $i*2+1;
    // ($i+1)*2;
    array_push($forecast_temp,array(
      "오전".preg_replace('/<span class=\"temp\">/','',$matchs[0][($i*2)+1])."℃",
      "오후".preg_replace('/<span class=\"temp\">/','',$matchs[0][($i+1)*2])."℃"));
  }

  //날씨 평 오전 오후 Return $forecast_comment
  preg_match_all('/<li........info..[^<]*/',$contents,$matchs);
  $forecast_comment=array();
  for($i=0;$i<7;$i++){
    array_push($forecast_comment,array(
      preg_replace('/<li........info../','',$matchs[0][$i*2]),
      preg_replace('/<li........info../','',$matchs[0][$i*2+1])));
  }

  $date=$_GET['date'];
  if($date=="")$date=0;
  $tommorow= mktime(0,0,0,date("m"),date("d")+$date,date("y"));

  $cssIcon['맑음']="<div class='sunny'></div>";
  $cssIcon['비']="<div class='rainy'></div>";
  $cssIcon['구름조금']="<div class='cloudy'></div>";
  $cssIcon['구름많음']="<div class='cloudy'></div>";
  $cssIcon['흐림']="<div class='cloudy'></div>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Swiper demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <link rel="stylesheet" type="text/css" href="weatherIcon/weatherIcon.css">

    <!-- Demo styles -->
    <style>
    body{
      background-color:black;
    }
    #date{
      color:white;
      text-align:center;
      font-size:30px;
    }
    #time{
      color:white;
      text-align:right;
      font-size:40px;
      margin-right:20px;
    }
    #about_schedule{
      color:white;
      text-align:center;
      margin:20px;
    }
    #add_schedule{
      color:white;
      text-align:center;
    }
    #weather_icon{
      width:0px;
      height:120px;
      position:relative;
    }
    </style>
</head>
<body>
  <center>
    <div id=date><?php echo $day=date('M d D',$tommorow);?></div>
    <div id=weather_icon><?php
    if(date("a")=="am"){
      echo $cssIcon[$forecast_comment[$date][0]];
    }else{
      echo $cssIcon[$forecast_comment[$date][1]];
    }
    ?></div>
    <div id=about_schedule><?php
    if(date("a")=="am"){
      echo $forecast_temp[$date][0];
    }else{
      echo $forecast_temp[$date][1];
    }?></div>
  </center>
    <!-- jquery JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Initialize Swiper -->
    <script>

    function checkSchedule(){

    }
    window.onmessage=function(e){

    }
    </script>
</body>
</html>
