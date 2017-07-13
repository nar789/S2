var list=new Array();
var p=new Array();
class PINFO{
	constructor(img,name,name2,code,number){
		this.name=name;
		this.name2=name2;
		this.img=img;
		this.code=code;
		this.number=number;
	}
}

function AddList(img,name,name2,number){
	p.push(new PINFO(img,name,name2,FactoryPeople(p.length+1,img,name2),number));
}

function MakeGroup(){
	
	var code="";
	for(var k in p){
		code+=p[k].code;
	}
	$("#people-parent").html(code);
	RunAnimation(p);
}

function RunAnimation(p){
	for(var i in p){
		var idx=parseInt(i)+1;
		$("#p"+idx).fadeIn(idx*300);
	}
}

function SelectPeople(){
	$("#name").val(msg.msg);

	for(var i in p){
		var idx=parseInt(i)+1;
		$("#p"+idx).fadeOut(idx*100);
	}
	var seli=-1;
	for(var i in p){
		var name=$("#name").val();
		if(name.indexOf(p[i].name)>=0){
			seli=i;
			break;
		}
	}
	if(seli>=0){
		MoveAnim(p[seli]);
	}else{
		//alert("clear");
		//msg.ClearMsg();
	}
}

function MoveAnim(p){
	if(p.img){
		$("#sel-img").attr("src",p.img);
	}else{
		$("#sel-img").attr("src","img/user-big.png");
	}
	$("#sel-p").html(p.name2);
	$("#sel-people").animate({left:'0px'});
	SendMsg(p);
}

function FactoryPeople(idx,img,name){
	var code="<div class=people-box><div class=people-animation id=p"+idx+"><center><img src='";
	if(img)
		code+=img;
	else
		code+="img/user.png";
	code+="'></center><p>";
	code+=name;	
	code+="</p></div></div>";
	return code;
}

function SendMsg(p){
	//alert(p.number);
	var call_msg='call,'+p.number;	
	$.get("../../common/update_msg.php?msg="+call_msg).done(function(data){
			
			if(!data.includes("success")){
				alert("error");
			}else{
				//alert(call_msg);
				setTimeout(function(){msg.ClearMsg()},5000);
			}
			//msg.ClearMsg();

		});
		
}

function Exit()
{
	clearInterval(msg.handler);
  	window.parent.postMessage("exit","*");
  	msg.ClearMsg();
}



function listinit()
{
	list.push(SelectPeople);
	list.push(ShowPeople);
	list.push(Exit);
	msg.SetCallback(list);
}

function ShowPeople(){
	$("#sel-people").animate({left:'-100%'});
	RunAnimation(p);
	//msg.ClearMsg();
}



function init(){
	AddList("","교수","이양원 교수","010-8101-9606");
	AddList("","송희","박송희","010-9770-9339");
	AddList("","이정","이정헌","010-3690-6736");
	AddList("","동준","류동준","010-3732-6390");
	AddList("","현","현운용","010-5883-7630");
	AddList("","아이유","아이유","010-3690-6736");
	AddList("","싸이	","싸이","010-3690-6736");
	MakeGroup();
	listinit();
	msg.run();

}

window.onload=init();