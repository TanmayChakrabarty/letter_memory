<!DOCTYPE html>
<html>
    <head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<title>Untitled Document</title>
        <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="jquery-ui.min.js"></script>
		<link type="text/css" rel="stylesheet" href="new_styles.css" />
    </head>
    
    <body>
    	<div class="mother_container">
        	<div class="toolbar">
            <span class="BUTTON start_restart" id="btn_start" onClick="start_game();">Start</span>
            <span class="BUTTON play_sound" onClick="$(this).hasClass('clicked') ? $(this).removeClass('clicked').text('Turn Off') : $(this).addClass('clicked').text('Turn On');">Turn Off</span>
            </div>
        	<div class="level_container">
            	
            </div>
            <div class="statusbar">
            	<span id="score_container">Score: <span id="score">0</span></span>
            </div>
        </div>
    </body>
    <script type="text/javascript">
			var wrong_sound = new Audio("audio/wrong.mp3");
			var right_sound = new Audio("audio/right.wav");
			var letters_1 = "";
			var letters_2 = "";
        	var total_in_a_row = 0;
			var total_in_a_col = 0;
			var total_pixels = total_in_a_row * total_in_a_col;
			var opened = 0;
			var score = 0;
			var started = false;
			var working = false;
			
			var game_container = {};
			var each_pixel = {};
			function play_sound(sound_of){
				if(!$(".play_sound").hasClass('clicked')){
					if(sound_of == "wrong"){
						wrong_sound.currentTime = 0;
						wrong_sound.play();
						}
					else if(sound_of == "right"){
						right_sound.currentTime = 0;
						right_sound.play();
						}
					}
				}
			function start_game(){
				if(!started){
					create_container(function(){
						cleanUp('start');
						produce_grid(total_pixels,function(){
							started = true;
							});	
						});
					}
				else if(confirm('Are you sure about restarting?')){
					cleanUp('restart');						
					}
				}
			function cleanUp(status){
				working = false;
				letters_1 = "ABCDEFGHIJKLMNOPQR";
				letters_2 = "ABCDEFGHIJKLMNOPQR";
				opened = 0;
				$(".start_restart").css({
					'background-position':'0 -96px',
					}).text('Restart');
					
				$(".pixels").remove();
				score = 0;
				$("#score").text('0');
				started = false;
				if(status == 'restart') start_game();
				}
			function create_container(callback){
				var level_container = $(".level_container");
				var height = $(level_container).height();
				var width = $(level_container).width();
				
				if(height < width) size = height;
				else size = width;

				size = size - (size % 6);

				each_pixel = {
					'height' : parseInt(size / 6) - 2,
					'width' : parseInt(size / 6) - 2
					};
				
				size = (each_pixel.height * 6) + 8;
				
				var marin = 
				
				$(level_container).html('<div id="game_container"></div>');
				
				$("#game_container").css({
					'height' : size,
					'width' : size,
					'position' : 'absolute',
					'top' : '50%',
					'left' : '50%',
					'margin-left' : '-'+(size/2)+'px',
					'margin-top' : '-'+(size/2)+'px',
					/*'border' : '1px solid'*/
					});
				
				game_container = {
					'height' : size,
					'width' : size,
					}

				total_in_a_row = 6;
				total_in_a_col = 6;
				
				total_pixels = total_in_a_row * total_in_a_col;
				callback();
				}
			function end_game(){
				$("#btn_start").attr("disabled",false).removeClass("btn_disabled");;
				}
			
			function produce_grid(total_pixels, callback){
				var char_at = 0;
				for(i=1;i<=total_pixels;i++){
					$("#game_container").append("<div id='" + i + "' class='pixels'><div class='cover'></div><img src='images/shutter_1_header.png' class='cover_header' /></div>");
					if(i <= (total_pixels / 2)){
						char_at = Math.floor(Math.random() * letters_1.length);
						$("#" + i).append(letters_1.charAt(char_at));
						letters_1 = letters_1.substr(0,char_at) + letters_1.substr(char_at + 1);
						}
					else{
						char_at = Math.floor(Math.random() * letters_2.length);
						$("#" + i).append(letters_2.charAt(char_at));
						letters_2 = letters_2.substr(0,char_at) + letters_2.substr(char_at + 1);
						}
					}
				var font_size = (each_pixel.height - 10) < 12 ? 12+'px' : (each_pixel.height - 10)+'px';
				
				$('.pixels').css({
					'height' : each_pixel.height - 1,
					'width' : each_pixel.width - 1,
					'line-height' : each_pixel.height+'px',
					'font-size' : font_size,
					});
				$('.cover').css({
					'height' : each_pixel.height - 1,
					'width' : each_pixel.width - 1,
					});
				callback();
				}
			
			$(document).on("click", ".pixels", function(){
				
				if(!$(this).find(".cover").is(":hidden") && !$(this).hasClass("done") && !working){
					working = true;
					var data = new Array();
					
					if(opened == 0){
						
						$(this).find(".cover").hide("slide", {direction: 'up' }, 300, function(){
							opened++;
							$(this).parent().addClass("selected_pixel", function(){working = false;});
							});
						}
					else if(opened == 1){
						$(this).find(".cover").hide("slide", {direction: 'up' }, 300, function(){
							$(this).parent().addClass("selected_pixel");
							$(".selected_pixel").each(function(index, element) {
								data[index] = $(element).text();
								});
							if(data[0] == data[1]){
								$(".selected_pixel").addClass("correct_match",300, function(){
									//play_sound("right");
									//$(".pixels").removeClass("correct_match");
									$(".selected_pixel").each(function(index, element) {
										//$(element).html("").addClass("done");
										$('.cover',element).show("slide", {direction: 'up' },300,function(){
											$('.cover_header, .cover',element).hide('explode',1000);
											play_sound("right");
											});
										
										$(element).addClass("done").removeClass("selected_pixel");
										if($(".pixels").length == $(".done").length){
											end_game();
											//alert("You are done and your score is : " + score);
											}
										});
									setTimeout(function(){working = false;},350);
									});
								change_score('+');
								}
							else{play_sound("wrong");
								$(".selected_pixel").addClass("wrong_match",300,function(){
									$(".pixels").removeClass("wrong_match",200);
									$(".selected_pixel").find(".cover").delay(200).show("slide", {direction: 'up' }, 500,function(){
										$(".pixels").removeClass("selected_pixel");
										working = false;
										});
									});
								change_score('-');
								}
							});
						opened = 0;
						}

					}
				});
			function change_score(type){
				if(type == '+') score += 10;
				else score -= 1;
				$("#score").html(score);
				}
			/*Template COde*/
			$('.BUTTON, .pixels, .toolbar, .statusbar').disableSelection();
        </script>
</html>
