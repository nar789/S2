var swiper = new Swiper('.swiper-container', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 'auto',
});

window.addEventListener("message",function(event){
  if(event.data=="exit"){
    $("#mainframe").attr('src','blank.html');
    swiper.slideTo(2,500,function(){});
    msg.run();
  }else if(event.data[0]!="!"){
    $('#msg').text(event.data);
  }
},false);

var list=new Array();


function appWeather(){//날씨 앱
  clearInterval(msg.handler);
  $('#mainframe').attr('src','./../weather/index.html');
  swiper.slideTo(1,500,function(){});
}


function appYoutube(){//유투브 앱
  clearInterval(msg.handler);
  $('#mainframe').attr('src','./../youtube/index.html');
  swiper.slideTo(3,500,function(){});
}


function appKakao(){//카카오 앱
  //alert("카카오톡");
  swiper.slideTo(4,500,function(){});
}

function home(){ //홈으로
  swiper.slideTo(2,500,function(){});
}

function batteryAnimate(){
  //$("#battery").animate({},300,function(){});
}


function appCalling()
{
   clearInterval(msg.handler);
  $('#mainframe').attr('src','./../calling/index.html');
  swiper.slideTo(0,500,function(){});
}

function appCamera(){
  clearInterval(msg.handler);
  $('#mainframe').attr('src','./../camera/index.html');
  swiper.slideTo(4,500,function(){});
}

function appThank(){
 clearInterval(msg.handler);
  $('#mainframe').attr('src','./../thank/index.html');
  swiper.slideTo(2,500,function(){}); 
}

function listInit(){
  list.push(appCalling);
  list.push(appWeather);
  list.push(appYoutube);
  list.push(appCamera);
  list.push(home);
  list.push(appThank);
  msg.SetCallback(list);
}


function init(){
  listInit();
  swiper.slideTo(2,500,function(){});
  msg.run();
  //setTimeout(batteryAnimate,3000);
}

window.onload=init();
