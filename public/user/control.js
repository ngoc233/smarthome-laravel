class Talk
{
			//talk ok 
	talkOK()
	{
		speechRs.speechinit("Google UK English Male",function(e)
		{
			speechRs.speak("ok",function()
			{

			},false);
		});
	}
}
var talk = new Talk();

var socket = io.connect('192.168.0.102:8000');
socket.on('connect', function () {
    console.log();
	console.log("Đã kết nối tới socket server");
});

//auto
$("#auto").click(function()
{
	var clicksAuto = $(this).data('clicks');
	if (!clicksAuto) // vì  clicksAuto return unable
	{
		alert("Smart home đã chuyển sang chế độ tự động");
    	console.log("Tự Động"); 
		socket.emit("startAuto","Smart home đã chuyển sang chế độ tự động");
		speechRs.speechinit("Google UK English Male",function(e)
		{
			speechRs.speak("Start Auto",function()
			{

			},false);
		});
	}
	else
	{
		alert("Smart home đã tắt chế độ tự động");
		console.log("Tắt Tự Động"); 
		socket.emit("endAuto","Smart home đã tắt chế độ tự động");
		speechRs.speechinit("Google UK English Male",function(e)
		{
			speechRs.speak("Stop Auto",function()
			{

			},false);
		});
	}
	$(this).data('clicks',!clicksAuto);
});


// controll with hand

//when click pump
$("#pump").click(function()
{
	var clicks = $(this).data('clicks');
	if (!clicks)
	{
		console.log("Bật máy bơm"); //debug - báo bật
		socket.emit("pump","on"); // gửi sự kiện "bật" đến Server
		$(this).children().css( "color", "#15aabf" );
	}
	else
	{
		console.log("Tắt máy bơm"); 
		socket.emit("pump","off");
		$(this).children().css( "color", "white" );
	}
	$(this).data('clicks',!clicks);
});

// when click ligt 1
$("#light1").click(function()
{
	// socket.emit("led-change","on");
	var clicks = $(this).data('clicks');
	if (!clicks)
	{
		console.log("Bật Đèn 1"); //debug - báo bật
		socket.emit("light","on1"); // gửi sự kiện "bật" đến Server
		$(this).children().css( "color", "#15aabf" );
	}
	else
	{
		console.log("Tắt Đèn 1"); 
		socket.emit("light","off1");
		$(this).children().css( "color", "white" );
	}
	$(this).data('clicks',!clicks);
});

// when click ligt 2
$("#light2").click(function()
{
	var clicks = $(this).data('clicks');
	if (!clicks)
	{
		console.log("Bật Đèn 2"); //debug - báo bật
		socket.emit("light","on2"); // gửi sự kiện "bật" đến Server
		$(this).children().css( "color", "#15aabf" );
	}
	else
	{
		console.log("Tắt Đèn 2"); 
		socket.emit("light","off2");
		$(this).children().css( "color", "white" );
	}
	$(this).data('clicks',!clicks);
});
// when click fan 1
$("#fan1").click(function()
{
	var clicks = $(this).data('clicks');
	if (!clicks)
	{
		console.log("Bật quạt 1"); //debug - báo bật
		socket.emit("fan","on1"); // gửi sự kiện "bật" đến Server
		$(this).children().css( "color", "#15aabf" );
	}
	else
	{
		console.log("Tắt quạt 1"); 
		socket.emit("fan","off1");
		$(this).children().css( "color", "white" );
	}
	$(this).data('clicks',!clicks);
});

// when click fan 1
$("#fan2").click(function()
{
	var clicks = $(this).data('clicks');
	if (!clicks)
	{
		console.log("Bật quạt 2"); //debug - báo bật
		socket.emit("fan","on2"); // gửi sự kiện "bật" đến Server
		$(this).children().css( "color", "#15aabf" );
	}
	else
	{
		console.log("Tắt quạt 2"); 
		socket.emit("fan","off2");
		$(this).children().css( "color", "white" );
	}
	$(this).data('clicks',!clicks);
});

// control with speech
document.getElementById("start").onclick = function()
{
	alert("Bắt Đầu Nói");
	speechRs.rec_start('en-IN',function(final_transcript,interim_transcript)
	{
		document.getElementById("context").innerHTML = final_transcript + interim_transcript;
	});
	//bật máy bơm
	speechRs.on("turn on water",function()
	{
		talk.talkOK();
		console.log("Bật máy bơm"); //debug - báo bật
		socket.emit("pump","on"); // gửi sự kiện "bật" đến Server
		speechRs.rec_stop();
		
	});
	//tắt máy bơm
	speechRs.on("turn off water",function()
	{
		talk.talkOK();
		console.log("Tắt máy bơm"); //debug - báo bật
		socket.emit("pump","off"); // gửi sự kiện "bật" đến Server
		speechRs.rec_stop();
		
	});

	// bật đèn 1;
	speechRs.on("turn on light one",function()
	{
		talk.talkOK();
		console.log("Bật Đèn 1"); //debug - báo bật
		socket.emit("light","on1"); // gửi sự kiện "bật" đến Server
		speechRs.rec_stop();
		
	});

	//tắt đèn 1
	speechRs.on("turn off light one",function()
	{
		talk.talkOK();
		console.log("Tắt Đèn 1"); 
		socket.emit("light","off1");
		speechRs.rec_stop();
		
	});

	// bật đèn 2;
	speechRs.on("turn on light 2",function()
	{
		talk.talkOK();
		console.log("Bật đèn 2"); 
			socket.emit("light","on2");
		speechRs.rec_stop();
		
	});
	speechRs.on("turn on light two",function()
	{
		talk.talkOK();
		console.log("Bật đèn 2"); 
			socket.emit("light","on2");
		speechRs.rec_stop();
		
	});

	// tắt đèn 2
	speechRs.on("turn off light 2",function()
	{
		talk.talkOK();
		console.log("tắt đèn 2"); 
			socket.emit("light","off2");
		speechRs.rec_stop();
		
	});
	speechRs.on("turn off light two",function()
	{
		talk.talkOK();
		console.log("tắt đèn 2"); 
			socket.emit("light","off2");
		speechRs.rec_stop();
		
	});

	// bật quạt 1
	speechRs.on("turn on fan one",function()
	{
		talk.talkOK();
		console.log("bật quạt 1"); 
			socket.emit("fan","on1");
		speechRs.rec_stop();
		
	});
	speechRs.on("turn on fan 1",function()
	{
		talk.talkOK();
		console.log("bật quạt 1"); 
			socket.emit("fan","on1");
		speechRs.rec_stop();
		
	});
	// tắt quạt 1
	speechRs.on("turn off fan one",function()
	{
		talk.talkOK();
		console.log("tắt quạt 1"); 
			socket.emit("fan","off1");
		speechRs.rec_stop();
		
	});
	speechRs.on("turn off fan 1",function()
	{
		talk.talkOK();
		console.log("tắt quạt 1"); 
			socket.emit("fan","off1");
		speechRs.rec_stop();
		
	});	
	// bật quạt 2
	speechRs.on("turn on fan 2",function()
	{
		talk.talkOK();
		console.log("Bật quạt 2"); 
			socket.emit("fan","on2");
		speechRs.rec_stop();
		
	});
	speechRs.on("turn on fan2",function()
	{
		talk.talkOK();
		console.log("Bật quạt 2"); 
			socket.emit("fan","on2");
		speechRs.rec_stop();
		
	});
	speechRs.on("turn on fan two",function()
	{
		talk.talkOK();
		console.log("Bật quạt 2"); 
			socket.emit("fan","on2");
		speechRs.rec_stop();
		
	});
	speechRs.on("turn off fan 2",function()
	{
		talk.talkOK();
		console.log("Tắt quạt 2"); 
			socket.emit("fan","off2");
		speechRs.rec_stop();
		
	});
	speechRs.on("turn off fan two",function()
	{
		talk.talkOK();
		console.log("Tắt quạt 2"); 
			socket.emit("fan","off2");
		speechRs.rec_stop();
		
	});
}	

