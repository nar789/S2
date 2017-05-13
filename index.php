<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Swiper demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="Swiper-3.4.2/dist/css/swiper.min.css">

    <!-- Demo styles -->
    <style>
    body {
        background: #fff;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color:#000;
        margin: 0;
        padding: 0;
        background-color:black;
    }
    .swiper-container {
        width: 100%;
    }
    .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 300px;
        height: 70px;
    }
    #icon{
      border-radius: 50px;
      width: 40px;
      height: 40px;
      padding: 10px;
      color: white;
    }
    #mainFrame{
      width:100%;
      height:100%;
      background-color:white;
    }
    .iframe_tier{
      width:100%;
      height:300px;
    }
    </style>
</head>
<body>
    <!-- <div id=CurrentStatus></div> -->
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><center><div id=icon>일정관리</div></center></div>
            <div class="swiper-slide" ><center><div id=icon>날씨</div></center></div>
            <div class="swiper-slide" ><center><div id=icon>유튜브</div></center></div>
            <div class="swiper-slide"><center><div id=icon>프레젠테이션</div></center></div>
        </div>
    </div>
    <div class=iframe_tier id=frame_container><iframe id=mainFrame></iframe></div>
    <!-- Swiper JS -->
    <script src="Swiper-3.4.2/dist/js/swiper.min.js"></script>

    <!-- jquery JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
    var ifs=["","","",""];

    var keyword_str;
    var started_proc=[];

    var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
    });
    function init(){
      $.get("updateRunInit.php");
    }
    window.onload=init();
    function startMsg(keyword){
      $.get("selectRunByKeyword.php",{keyword:keyword}).done(function(data){
        if(data=="pass"){
        }else{
          document.getElementById('mainFrame').src=data;
          alert(data);
        }
      });
    }

    function checkMsg(){
      $.post("checkS2Msg.php").done(function(data){
        var slide_number;
        if(data.includes("유튜브")){
          slide_number=2;
          keyword_str="유튜브";
        }else if(data.includes("날씨")){
          slide_number=1;
          keyword_str="날씨";
        }else if(data.includes("일정관리")){
          slide_number=0;
          keyword_str="일정관리";
        }else if(data.includes("프레젠테이션")){
          slide_number=3;
          keyword_str="프레젠테이션";
        }
        if(data.includes("작게")){
          document.getElementById('mainFrame').style.width="40%";
          document.getElementById('mainFrame').style.height="40%";
        }else if(data.includes("크게")){
          document.getElementById('mainFrame').style.width="100%";
          document.getElementById('mainFrame').style.height="20%";
        }
        swiper.slideTo(slide_number,300,function(){});
        if(data.includes("실행")){
          startMsg(keyword_str);
        }else{

        }

      });
    }
    setInterval(checkMsg,1000);
    </script>
</body>
</html>
