/* lititRightBarPlugin litit独立音乐rightBar插件
   Version 1.1, 2013-10-13 —— by mimiton
   调用格式示例：(链式操作语法，类似jQuery)
           lititRightBarPlugin().load().display();
   基于框架：JQuery
*/
(function(){
	var rb = window["lititRightBarPlugin"] = function(selector){
		return new rb.fn.init(selector);
	};
	rb.fn = rb.prototype = {
		//在目标selector里初始化DOM元素
		//参数：selector   ->   jq选择器
		//      hrefMode   ->   rightBar里的item点击后的新页面打开方式，可选 "_blank"
		init:function(selector,hrefMode){
			this.elem = $(selector);
			this.bar = $("<div class='litit-right-bar'><input type='button' value='>' onclick='lititRbar.close(\"slideRight\");' /></div>");
			this.mainList = $("<div class='litit-right-bar-list'></div>");
			this.bar.append(this.mainList);
			this.elem.html("").append(this.bar);
			this.hrefMode = hrefMode;
		},
		//设置默认Img，当载入的数据中缺少img项的时候用
		setDefaultImg:function(src){
			this.defaultImg = src;
			return this;
		},
		//载入数据
		//参数：data   ->   js对象数据，格式：[{"img":"","text":"","href"},{...}...]
		load:function(data){
			var root = this;
			$.each(data,function(k,v){
				root.mainList.append("<li class='item' href='"+v.href+"'><div class='img'><img src='"+(v.img?v.img:root.defaultImg)+"' /></div><div class='text'>"+v.text+"</div></li>");
			});
			return this;
		},
		//设置item被点击后的callback handler
		itemClick:function(callback){
			this.mainList.children("li").click(callback);
			return this;
		},
		//根据参数cssData里的css，重置rightBar的部分css属性
		//参数：cssData   ->   css属性数据
		locate:function(cssData){
			this.bar.css(cssData);
			return this;
		},
		//将rightBar显示出来
		//参数：aniMode   ->   显示过程的动画模式，可选"fadeIn","slideDown","slideLeft","slideUp","slideRight"
		//      duration  ->   动画执行时间
		display:function(aniMode,duration){
			switch(aniMode){
				case "fadeIn":
					this.bar.hide().fadeIn(duration);
					break;
				case "slideDown":
					this.bar.hide().slideDown(duration);
					break;
				case "slideUp":
					var h = this.bar.height();
					this.bar.css({"margin-top":h,"height":0}).show().animate({"margin-top":0,"height":h},duration,function(){$(this).css({"height":"auto"});});
					break;
				case "slideLeft":
					var w = this.bar.width();
					this.bar.css({"margin-left":w,"width":0}).show().animate({"margin-left":0,"width":w},duration);
					break;
				case "slideRight":
					var w = this.bar.width();
					this.bar.css({"margin-right":w,"width":0}).show().animate({"margin-right":0,"width":w},duration);
					break;
			}
			return this;
		},
		//收起rightBar
		close:function(aniMode,duration){
			switch(aniMode){
				case "fadeOut":
					this.bar.show().fadeOut(duration);
					break;
				case "slideDown":
					var h = this.bar.height();
					this.bar.css({"margin-top":0,"height":h}).show().animate({"margin-top":h,"height":0},duration,function(){$(this).hide().css({"margin":0,"height":"auto"});});
					break;
				case "slideUp":
					this.bar.show().slideUp(duration);
					break;
				case "slideLeft":
					var w = this.bar.width();
					this.bar.css({"margin-right":0,"width":w}).show().animate({"margin-right":w,"width":0},duration,function(){$(this).hide().css({"margin":0,"width":w});});
					break;
				case "slideRight":
					var w = this.bar.width();
					this.bar.css({"width":w}).show().animate({"width":0},duration,function(){$(this).hide().css({"margin":0,"width":w});});
					break;
			}
		}
	};
	rb.fn.init.prototype = rb.fn;
})();