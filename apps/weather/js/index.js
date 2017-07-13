var list=new Array();
function Today()
{
	$('#mainframe').attr('src','weather.php?date=0');
}
function Tmor()
{
	$('#mainframe').attr('src','weather.php?date=1');
}
function Two()
{
	$('#mainframe').attr('src','weather.php?date=2');
}
function Three()
{
	$('#mainframe').attr('src','weather.php?date=3');
}
function Four()
{
	$('#mainframe').attr('src','weather.php?date=4');
}
function Week(){
	$('#mainframe').attr('src','weatherWeek.php');
}
function Exit()
{
	clearInterval(msg.handler);
  	window.parent.postMessage("exit","*");
}


function listinit()
{
	list.push(Today);
	list.push(Tmor);
	list.push(Two);
	list.push(Three);
	list.push(Four);
	list.push(Week);
	list.push(Exit);
	msg.SetCallback(list);
}


function init(){
	listinit();
	msg.run();
}

window.onload=init();
