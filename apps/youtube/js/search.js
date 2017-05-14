// After the API loads, call a function to enable the search box.
var id=new Array();
var list=new Array();
var title=new Array();

function listinit()
{
  list.push(CallSearch);
  list.push(Back);
  list.push(FirstPlay);
  list.push(SecondPlay);
  list.push(ThirdPlay);
  list.push(FourthPlay);
  list.push(FifthPlay);
  list.push(Exit);
  msg.SetCallback(list);
}

function Exit(){
  clearInterval(msg.handler);
  window.parent.postMessage("exit","*");
}

function CallSearch(msg){
   $('#c').css("display","none");
   $('#textmsg').val(msg);
   searcharg(msg);
}

function Back(){
  search();
}

function FirstPlay(){
  play(0);
}
function SecondPlay(){
  play(1);
}
function ThirdPlay(){
  play(2);
}
function FourthPlay(){
  play(3);
}
function FifthPlay(){
  play(4);
}

function init()
{
  listinit();
  msg.run();
}




function handleAPILoaded() {
  $('#search-button').attr('disabled', false);
  init();
}

// Search for a specified string.
function search() {
  $('#search-container').html('');
  id=new Array();
  title=new Array();
  var q = $('#query').val();
  var request = gapi.client.youtube.search.list({
    q: q,
    part: 'snippet'
  });

  request.execute(function(response) {
    var str = JSON.stringify(response.result);
    var r=JSON.parse(str);
    var item=r.items;
    //$('#search-container').append('<p>'+str+'</p>');
    for(var i=0;i<item.length;i++)
    {
      $('#search-container').append('<div class=card><center>'
        +'<p>' + item[i].snippet.title + '</p>'
        +'<img src='+item[i].snippet.thumbnails.medium.url+'>'
        +'</center></div>');
      id.push(item[i].id.videoId);
      title.push(item[i].snippet.title);
    }
  });
}

function play(idx){

  $('#search-container').html('<div id=movie><center>'
    +'<p>'+title[idx]+'</p>'
    +'<embed width="640" height="360" src="http://www.youtube.com/v/'
    +id[idx]
    +'&vq=hd720&autoplay=1&start=60&rel=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true"></embed></center></div>');    

}

function searcharg(keyword){
  keyword=keyword.split(" ");
  keyword=keyword[0];
  keyword=keyword.replace("로","");
  keyword=keyword.replace("을","");
  keyword=keyword.replace("를","");
  $('#query').val(keyword);
  search();
}

function msgclick(){
  var msgf=$('#textmsg').val();
  if(msgf.includes(s1))
    searcharg(msgf);
  else if(msgf.includes(sel1))
      play(0);
  else if(msgf.includes(sel2))
      play(1);
  else if(msgf.includes(sel3))
      play(2);
  else if(msgf.includes(sel4))
      play(3);
  else if(msgf.includes(sel5))
      play(4);
  else if(msgf.includes(back))
    search();
}



