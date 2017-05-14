class Msg{

	SetCallback(CallbackList){
		this.CallbackList=CallbackList;
		this.OpenCmdFile();
	}

	OpenCmdFile(){
		this.cmd = JSON.parse(CMD);
	}

	StartRunning(){
		running=true;
		$.get("../../common/get_msg.php").done(function(data){
			window.parent.postMessage(data,"*");
			msg.msg=data;
			msg.CompareMsg();
			msg.ClearMsg();
		});
	}

	CheckRunning(){
		if(running==false){
			msg.StartRunning();
		}
	}

	run(){
		this.handler=setInterval(this.CheckRunning,1000);
	}
	
	ClearMsg(){
		$.get("../../common/update_msg.php?msg=").done(function(data){
			if(!data.includes("success")){
				alert("error");
			}else{
				running=false;
			}
		});
	}

	CompareMsg(){
		let msg=this.msg;
		var endflag=false;
		var idx=-1;
		for(var i=0;i<this.cmd.length;i++){
			for(var j in this.cmd[i]){

				if( msg.includes( this.cmd[i][j].key ) ){

					idx=i; endflag=true;
					break;
				}
			}
			if(endflag)break;
		}
		if(idx>=0){
			this.CallbackList[idx](msg);
		}
	}


}
let msg=new Msg();
var running=false;
