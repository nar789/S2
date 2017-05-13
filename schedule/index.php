<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Swiper demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="../Swiper-3.4.2/dist/css/swiper.min.css">

    <!-- Demo styles -->
    <style>
    body {
        background: black;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color:#000;
        margin: 0;
        padding: 0;
    }
    .swiper-container {
        width: 100%;
        padding-top: 50px;
        padding-bottom: 50px;
    }
    .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 300px;
        height: 300px;
        background-color:rgba(255,255,255,0.2);
        border-radius:10px;
        box-shadow:0px 0px 5px 3px rgba(255,255,255,0.3);
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
    </style>
</head>
<body>
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div id=date>05월 13일 토요일</div>
              <div id=time>오전 2:48</div>
              <div id=about_schedule>매일 아침 7시 30분</div>
              <div id=add_schedule>일정 추가 가능</div>
            </div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <!-- Swiper JS -->
    <script src="../Swiper-3.4.2/dist/js/swiper.min.js"></script>

    <!-- jquery JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var schedule=["730"];
    var swiper = new Swiper('.swiper-container', {
        initialSlide:2,
        pagination: '.swiper-pagination',
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflow: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows : true
        },
        onTransitionEnd:function(swip){
        }
    });
    function setTime(){
      var d=new Date();
      var hour=d.getHours();
      var miniutes=d.getMinutes();
      if(hour<12){
        var ampm="오전";
      }else{
        var ampm="오후";
      }
      document.getElementById('time').innerHTML=ampm+" "+hour+":"+miniutes+"";
    }
    function checkSchedule(){
      
    }
    setInterval(setTime,1000);
    </script>
</body>
</html>
