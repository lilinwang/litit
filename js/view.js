function imgwall_max() {
	   var other_h=230;
	   var img_wall_max_btn_h=50;  
	   var normal_h=140; 
	   var img_wall_max_pad_h=60;  
	  $(".modal").css({"width":$(window).width()+"px", "display":"block"});
	  $("#img_wall_max").css({"height":$(window).height()-normal_h+"px","top":(normal_h-img_wall_max_pad_h)/2+"px"});
	  $("#img_wall_max .img_container").css({"height":$(window).height()-other_h+"px"});
	  $("#img_wall_max button").css({"top":($(window).height()-img_wall_max_btn_h-normal_h)/2+"px"});
	  
	  }
function imgwall_click(){
	$(".img_hover").click(function(){
	     imgwall_max();
		 $("#img_wall_max .img_container img").attr({ src: $(this).next().attr('src'), alt: "Test Image" });	
		});	
    $(".icon_close").click(function(){
    $(".modal").css({"display":"none"});
    })

	}
/*执行*/
$(function($){
	 
	 imgwall_click();
	 
	 $("#music_lyric_btn").toggle(
		  function () {
			$(this).html("音乐故事");
			$("#music_lyric").show();
			$("#music_story").hide();
			
			
		  },
		  function () {
			$(this).html("歌词");
			 $("#music_lyric").hide();
			 $("#music_story").show();
		  }
);
	 });

$(window).resize(function(){
		imgwall_click();
    });
	



