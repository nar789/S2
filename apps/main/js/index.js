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
        if(data.includes("youtube")){
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