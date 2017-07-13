var list=new Array();

function Exit()
{
	clearInterval(msg.handler);
  	window.parent.postMessage("exit","*");
}


function listinit()
{
	list.push(takea);
	list.push(Exit);
	msg.SetCallback(list);
}


function init(){
	listinit();
	msg.run();

}
function Show(){
	$("img").attr("src","A.jpg");
	$("img").fadeIn();
	$("#ani").fadeOut();
}

function takea(){

	var call_msg='camera';
	
	$.get("../../common/update_msg.php?msg="+call_msg).done(function(data){
			
			if(!data.includes("success")){
				alert("error");
			}else{
				setTimeout(function(){msg.ClearMsg();},5000);
				setTimeout(function(){Show();},20000);
			}
		});
}

window.onload=init();