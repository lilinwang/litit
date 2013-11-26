$(document).ready(function(){
	var bg=$(".boxpan").css("background");
	$("#copyright").hide();
	$("#msg-button").css("background",bg);
	$("#update-info").hide();
	loadSongs("collect","陈奕迅","因为爱情","music2_11.jpg");
	loadSongs("follow","歌手","歌名","music2_15.jpg");
	loadSongs("upload","彭佳慧","****","music2_16.jpg");
	loadSongs("download","陈奕迅","因为爱情","music2_17.jpg");

	$("#viewinfo-button").click(function(){
		$("#update-info").hide();
		$("#view-info").show();
	});

	$("#updateinfo-button").click(function(){
		$("#view-info").hide();
		$("#update-info").show();
	});

	$("#msg-button").click(function(){
		$("#copyright").hide();
		$("#msg").show();
		$("#copyright-button").css("background","none");
		$("#msg-button").css("background",bg);
	});

	$("#copyright-button").click(function(){
		$("#copyright").show();
		$("#msg").hide();
		$("#copyright-button").css("background",bg);
		$("#msg-button").css("background","none");
	});


	var bg2=$(".pan").css("background");
	$("#follow").hide();
	$("#upload").hide();
	$("#download").hide();
	$("#collect-button").css("background","black");

	$("#collect-button").click(function(){
	$("#collect").show();
	$("#follow").hide();
	$("#upload").hide();
	$("#download").hide();
	$("#collect-button").css("background","black");
	$("#follow-button").css("background","gray");
	$("#upload-button").css("background","gray");
	$("#download-button").css("background","gray");
	});

	$("#follow-button").click(function(){
	$("#collect").hide();
	$("#follow").show();
	$("#upload").hide();
	$("#download").hide();
	$("#collect-button").css("background","gray");
	$("#follow-button").css("background","black");
	$("#upload-button").css("background","gray");
	$("#download-button").css("background","gray");
	}); 

	$("#upload-button").click(function(){
	$("#collect").hide();
	$("#follow").hide();
	$("#upload").show();
	$("#download").hide();
	$("#collect-button").css("background","gray");
	$("#follow-button").css("background","gray");
	$("#upload-button").css("background","black");
	$("#download-button").css("background","gray");
	}); 

	$("#download-button").click(function(){
	$("#collect").hide();
	$("#follow").hide();
	$("#upload").hide();
	$("#download").show();
	$("#collect-button").css("background","gray");
	$("#follow-button").css("background","gray");
	$("#upload-button").css("background","gray");
	$("#download-button").css("background","black");
	});
});

function loadSongs(id,name,singer,img){
	var content="<div class=\"song\"><a href=\"#\"><img src=\"http://localhost/litit/image/";
	content=content+img+"\"/></a><div class=\"song-info\" style=\"display:none;\">";
	content=content+name+singer+"<img src=http://localhost/litit/image/music2_15.jpg\" /></div></div>";

	var tables=document.getElementById(id).getElementsByTagName("table");
	var table=tables[0];
	for (var i = 0; i < 3; i++) {
		for (var j = 0; j < 4; j++) {
			table.rows[i].cells[j].innerHTML=content;
		};
	};
}