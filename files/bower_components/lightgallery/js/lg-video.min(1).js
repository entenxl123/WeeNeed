/*! lg-video - v1.0.0 - 2016-09-20
* http://sachinchoolur.github.io/lightGallery
* Copyright (c) 2016 Sachin N; Licensed GPLv3 */
!function(a,b){"function"==typeof define&&define.amd?define([],function(){return b()}):"object"==typeof exports?module.exports=b():b()}(this,function(){!function(a,b,c,d){"use strict";var e={videoMaxWidth:"855px",youtubePlayerParams:!1,vimeoPlayerParams:!1,dailymotionPlayerParams:!1,vkPlayerParams:!1,videojs:!1,videojsOptions:{}},f=function(b){return this.core=a(b).data("lightGallery"),this.$el=a(b),this.core.s=a.extend({},e,this.core.s),this.videoLoaded=!1,this.init(),this};f.prototype.init=function(){var b=this;b.core.$el.on("hasVideo.lg.tm",function(a,c,d,e){if(b.core.$slide.eq(c).find(".lg-video").append(b.loadVideo(d,"lg-object",!0,c,e)),e)if(b.core.s.videojs)try{videojs(b.core.$slide.eq(c).find(".lg-html5").get(0),b.core.s.videojsOptions,function(){b.videoLoaded||this.play()})}catch(a){console.error("Make sure you have included videojs")}else b.core.$slide.eq(c).find(".lg-html5").get(0).play()}),b.core.$el.on("onAferAppendSlide.lg.tm",function(a,c){b.core.$slide.eq(c).find(".lg-video-cont").css("max-width",b.core.s.videoMaxWidth),b.videoLoaded=!0});var c=function(a){if(a.find(".lg-object").hasClass("lg-has-poster")&&a.find(".lg-object").is(":visible"))if(a.hasClass("lg-has-video")){var c=a.find(".lg-youtube").get(0),d=a.find(".lg-vimeo").get(0),e=a.find(".lg-dailymotion").get(0),f=a.find(".lg-html5").get(0);if(c)c.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}',"*");else if(d)try{$f(d).api("play")}catch(a){console.error("Make sure you have included froogaloop2 js")}else if(e)e.contentWindow.postMessage("play","*");else if(f)if(b.core.s.videojs)try{videojs(f).play()}catch(a){console.error("Make sure you have included videojs")}else f.play();a.addClass("lg-video-playing")}else{a.addClass("lg-video-playing lg-has-video");var g,h,i=function(c,d){if(a.find(".lg-video").append(b.loadVideo(c,"",!1,b.core.index,d)),d)if(b.core.s.videojs)try{videojs(b.core.$slide.eq(b.core.index).find(".lg-html5").get(0),b.core.s.videojsOptions,function(){this.play()})}catch(a){console.error("Make sure you have included videojs")}else b.core.$slide.eq(b.core.index).find(".lg-html5").get(0).play()};b.core.s.dynamic?(g=b.core.s.dynamicEl[b.core.index].src,h=b.core.s.dynamicEl[b.core.index].html,i(g,h)):(g=b.core.$items.eq(b.core.index).attr("href")||b.core.$items.eq(b.core.index).attr("data-src"),h=b.core.$items.eq(b.core.index).attr("data-html"),i(g,h));var j=a.find(".lg-object");a.find(".lg-video").append(j),a.find(".lg-video-object").hasClass("lg-html5")||(a.removeClass("lg-complete"),a.find(".lg-video-object").on("load.lg error.lg",function(){a.addClass("lg-complete")}))}};b.core.doCss()&&b.core.$items.length>1&&(b.core.s.enableSwipe&&b.core.isTouch||b.core.s.enableDrag&&!b.core.isTouch)?b.core.$el.on("onSlideClick.lg.tm",function(){var a=b.core.$slide.eq(b.core.index);c(a)}):b.core.$slide.on("click.lg",function(){c(a(this))}),b.core.$el.on("onBeforeSlide.lg.tm",function(c,d,e){var f=b.core.$slide.eq(d),g=f.find(".lg-youtube").get(0),h=f.find(".lg-vimeo").get(0),i=f.find(".lg-dailymotion").get(0),j=f.find(".lg-vk").get(0),k=f.find(".lg-html5").get(0);if(g)g.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}',"*");else if(h)try{$f(h).api("pause")}catch(a){console.error("Make sure you have included froogaloop2 js")}else if(i)i.contentWindow.postMessage("pause","*");else if(k)if(b.core.s.videojs)try{videojs(k).pause()}catch(a){console.error("Make sure you have included videojs")}else k.pause();j&&a(j).attr("src",a(j).attr("src").replace("&autoplay","&noplay"));var l;l=b.core.s.dynamic?b.core.s.dynamicEl[e].src:b.core.$items.eq(e).attr("href")||b.core.$items.eq(e).attr("data-src");var m=b.core.isVideo(l,e)||{};(m.youtube||m.vimeo||m.dailymotion||m.vk)&&b.core.$outer.addClass("lg-hide-download")}),b.core.$el.on("onAfterSlide.lg.tm",function(a,c){b.core.$slide.eq(c).removeClass("lg-video-playing")})},f.prototype.loadVideo=function(b,c,d,e,f){var g="",h=1,i="",j=this.core.isVideo(b,e)||{};if(d&&(h=this.videoLoaded?0:1),j.youtube)i="?wmode=opaque&autoplay="+h+"&enablejsapi=1",this.core.s.youtubePlayerParams&&(i=i+"&"+a.param(this.core.s.youtubePlayerParams)),g='<iframe class="lg-video-object lg-youtube '+c+'" width="560" height="315" src="//www.youtube.com/embed/'+j.youtube[1]+i+'" frameborder="0" allowfullscreen></iframe>';else if(j.vimeo)i="?autoplay="+h+"&api=1",this.core.s.vimeoPlayerParams&&(i=i+"&"+a.param(this.core.s.vimeoPlayerParams)),g='<iframe class="lg-video-object lg-vimeo '+c+'" width="560" height="315"  src="//player.vimeo.com/video/'+j.vimeo[1]+i+'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';else if(j.dailymotion)i="?wmode=opaque&autoplay="+h+"&api=postMessage",this.core.s.dailymotionPlayerParams&&(i=i+"&"+a.param(this.core.s.dailymotionPlayerParams)),g='<iframe class="lg-video-object lg-dailymotion '+c+'" width="560" height="315" src="//www.dailymotion.com/embed/video/'+j.dailymotion[1]+i+'" frameborder="0" allowfullscreen></iframe>';else if(j.html5){var k=f.substring(0,1);"."!==k&&"#"!==k||(f=a(f).html()),g=f}else j.vk&&(i="&autoplay="+h,this.core.s.vkPlayerParams&&(i=i+"&"+a.param(this.core.s.vkPlayerParams)),g='<iframe class="lg-video-object lg-vk '+c+'" width="560" height="315" src="http://vk.com/video_ext.php?'+j.vk[1]+i+'" frameborder="0" allowfullscreen></iframe>');return g},f.prototype.destroy=function(){this.videoLoaded=!1},a.fn.lightGallery.modules.video=f}(jQuery,window,document)});