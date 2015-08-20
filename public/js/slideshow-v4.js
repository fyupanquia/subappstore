// Copyright 2010 htmldrive.net Inc.
/**
 * @author htmldrive.net
 * More script and css style : htmldrive.net
 * @version 1.0
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */

$(function(){
                var currentSlideNumber = 0;
                var slideCount = $(".teaser-items").children("li").length;
                var slideTime = 6000;
                var timeout;
                var nextSlideNumber =0;
                $(".scroller4").find(".teaser-header").children("ol").children("li").children("a").click(adjustSlideNav);
				
				function adjustSlideNav(){
					console.log( $(".scroller4").find(".teaser-items").children("li").is(':not(:animated)'));
					if ( $(".scroller4").find(".teaser-items").children("li").is(':animated')) {
					} else {
						thisSlide = $(".scroller4").find(".teaser-header").children("ol").children("li").index($(this).parent());
						if (thisSlide === currentSlideNumber) {					
						} else {
							nextSlideNumber = $(".scroller4").find(".teaser-header").children("ol").children("li").index($(this).parent());
							stop();
							clearTimeout(timeout);
							change(nextSlideNumber);
							if(nextSlideNumber == slideCount-1){
								nextSlideNumber = 0 ;
							}else{
								nextSlideNumber ++;
							}
						}
					}
                };
				
				$(".slideshow-controls").hover(function() {
					$(".slideshow-controls").children("ul").children("li").children("a").css('display', 'block');
				}, function() {
					$(".slideshow-controls").children("ul").children("li").children("a").css('display', 'none');
				});
				
                $(".slideshow-controls").children("ul").children("li").children("a").click(moveToNextSlide);
				
				function moveToNextSlide(){
					if ( $(".scroller4").find(".teaser-items").children("li").is(':animated')) {
					} else {
						stop();					
						clearTimeout(timeout);
						if($(this).attr("rel") == "prev"){
							if(currentSlideNumber == 0){
								nextSlideNumber = slideCount-1 ;
							}else{
								nextSlideNumber =  currentSlideNumber - 1 ;
							}
						}else{
							if(currentSlideNumber == slideCount-1){
								nextSlideNumber = 0 ;
							}else{
								nextSlideNumber =  currentSlideNumber + 1;
							}
						}
						play();
					}
                };
				
                play();
				
                $(".scroller-inner").hover(
					function () {
						stop();
						clearTimeout(timeout);
					},
					function () {
						timeout = setTimeout(play,slideTime);
					}
				);
                function stop(){
                    clearTimeout(timeout);
                }
                function play(){
                    clearTimeout(timeout);
                    change(nextSlideNumber);
                    nextSlideNumber = currentSlideNumber + 1;
                    if(nextSlideNumber >= slideCount){
                        nextSlideNumber = 0;
                    }                               
                    timeout = setTimeout(play,slideTime);
                }
				
                function change(nextSlideNumber){
					if (slideCount === 1){
						$(".scroller4").find(".teaser-items").children("li").eq(currentSlideNumber).animate({opacity:'show'}, {duration:0});
						console.log("it is indeed playing 1");
						clearTimeout(timeout);
					} else {
						if(nextSlideNumber == 0 && currentSlideNumber == 0){
							$(".scroller4").find(".teaser-items").children("li").animate({left:$(".scroller4").width()}, {duration:0});
							$(".scroller4").find(".teaser-items").children("li").eq(currentSlideNumber).animate({opacity:'show'}, {duration:0});
							$(".scroller4").find(".teaser-items").children("li").eq(currentSlideNumber).animate({left:0}, 1500);
						}else{
								$(".scroller4").find(".teaser-items").children("li").eq(currentSlideNumber).animate({
									left:-($(".scroller4").width())}, 
									{
										duration:1500, 
										complete:function() {$(this).hide(); $(this).animate({left:$(".scroller4").width()}, {duration:0});}
									}
								)
								
								$(".scroller4").find(".teaser-items").children("li").eq(nextSlideNumber).animate(
									{
										left:$(".scroller4").width(),
										opacity:'show'
									},
									{
										duration:0, 
										complete:function() {
											$(this).animate(
											{
												left:0
											}, 
											{
												duration:1500, 
												complete:function(){
													$(".scroller4").find(".teaser-header").children("ol").children("li").children("a").click(adjustSlideNav);
												} 
											})
										} 
									}
								)
								clearTimeout(timeout);
						}                                
						$(".scroller4").find(".teaser-header").children("ol").children("li").children("a").removeClass("selected");
						$(".scroller4").find(".teaser-header").children("ol").children("li").children("a").eq(nextSlideNumber).addClass("selected");
						currentSlideNumber = nextSlideNumber;
					}	
				}
			})