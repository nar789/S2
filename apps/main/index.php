<!DOCTYPE html>
<html lang="en">

  <head>

      <meta charset="utf-8">
      <title>Smart Mirror 2</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
      <!-- Link Swiper's CSS -->
      <link rel="stylesheet" href="Swiper-3.4.2/dist/css/swiper.min.css">
      <link rel="stylesheet" href="//fonts.googleapis.com/earlyaccess/nanumgothic.css">
      <link rel="stylesheet" href="css/index.css">

  </head>

  <body>

      <!-- <div id=CurrentStatus></div> -->
      <!-- Swiper -->
      <div class="swiper-container">
          <div class="swiper-wrapper">
              <div class="swiper-slide"><center><div id=icon>전화하기</div></center></div>
              <div class="swiper-slide" ><center><div id=icon>날씨</div></center></div>
              <div class="swiper-slide" ><center><div id=icon>홈 </div></center></div>
              <div class="swiper-slide" ><center><div id=icon>Youtube</div></center></div>
              <div class="swiper-slide"><center><div id=icon>사진촬영</div></center></div>
          </div>
      </div>


      <iframe id=mainframe src="blank.html"></iframe>
      <iframe id=battery src="battery/index.php"></iframe>
      <center><p id=msg></p></center>


      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="Swiper-3.4.2/dist/js/swiper.min.js"></script>
      <script src="js/cmd.json"></script>
      <script src="js/msg.js"></script>
      <script src="js/index.js"></script>
  </body>
</html>
