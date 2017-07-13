function activeAnimation(){
  $('.plug').addClass('plug-active');
  setTimeout(function(){
    $('.battery > div').addClass('charge');
    document.getElementById('complete').style.color="white";
    setTimeout(function(){
      //$('#device').fadeOut({},300,function(){});
      $('#device').animate({
        backgroundColor:"black",
        borderColor:"black"
      },300,function(){});
      $('#top-screen').animate({
        opacity:0
      },300,function(){});
      $('#middle-screen').animate({
        backgroundColor:"black",
        borderColor:"black"
      },300,function(){});
      $('#bottom-screen').animate({
        opacity:0
      },300,function(){});
      $('#battery').animate({
      },300,function(){});
      $('#plug').animate({
        opacity:0
      },300,function(){});
      $('#exterieur').animate({
        opacity:0
      },300,function(){});
    },1000);
    setTimeout(function(){
      $('#complete').animate({
        top:5
      },500,function(){});
    },2500);


  }, 500);
}
$(document).ready(function(){
  activeAnimation();
});
