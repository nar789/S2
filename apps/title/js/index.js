$('.tlt').textillate({ 
  in: { effect: 'splat' },
  out: { effect: 'foldUnfold', sync: true },
  loop: true
});

function move(){
  location.replace("../main/index.php");
}

function init()
{
  setInterval(move,5500);
}

window.onload=init();