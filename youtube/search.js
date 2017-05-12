// After the API loads, call a function to enable the search box.
var id=new Array();

function handleAPILoaded() {
  $('#search-button').attr('disabled', false);
}

// Search for a specified string.
function search() {
  $('#search-container').html('');
  id=new Array();
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
    }
  });
}

function play(idx){

  $('#search-container').html('<center><embed width="640" height="360" src="http://www.youtube.com/v/'
    +id[idx]
    +'&vq=hd720&autoplay=1&start=60&rel=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true"></embed></center>');    

}