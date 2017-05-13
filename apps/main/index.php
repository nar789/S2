<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>Smart Mirror 2</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
      <!-- Link Swiper's CSS -->
      <link rel="stylesheet" href="Swiper-3.4.2/dist/css/swiper.min.css">
      <!-- Demo styles -->
      <link rel="stylesheet" href="css/index.css">
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
      <script src="js/index.js"></script>
  </body>
</html>
