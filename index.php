<!DOCTYPE html>
<html>
    <head>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="jquery-ui.min.js"></script>
    	<link type="text/css" rel="stylesheet" href="styles.css" />
    	<title>Letter Memory</title>
    </head>
    
    <body>
		<div id="whole_container">
            <div id="Title_Bar">
                Tanmay's Letter Memory Game
            </div>
            <!--START The Main Container, The Game is HERE-->
            <div style="overflow:hidden;margin-bottom:10px;">
                <div class="fl" id="container">
        
                </div>
                <fieldset class="tlc">
                	<legend>Controls</legend>
                    <button id="btn_start" onClick="start_game();">Start Game</button>
					<label><input type="checkbox" id="is_play_sound" checked>Play Sound</label>
                </fieldset>
                <fieldset class="tlc" id="score_card">
                	<legend>Score Card</legend>
                    <span style='font-size=18px; font-weight:bold; color:#C00;'>0</span>
                </fieldset>
                <fieldset>
                    <legend>
                        About The Game
                    </legend>
                    Click on cell to see the letter it holds. Then click on another cell to see the letter that holds. If these to cell holds the same letter then its a match and the cells will vanish, if not, then the cells will again get covered.<br /><br />
                    If the cells don't match, then keep the letters you saw in the cells in your memory, and keep clicking on other cells. Whenever you see a letter, try to remember in which cell you have seen it earlier and then open that cell.<br /><br />
                    Each correct match brings you 10 points and wrong match takes away 1 points.
                </fieldset>
            </div>
            <!--END The Main Container, The Game is HERE-->
            <fieldset id="addv">
                <div class="fl">
                    Created By Tanmay Chakrabarty
                </div>
                <div class="fr">
                    <a href="http://tanmayonrun.blogspot.com">
                        More at Tanmay On Run Blog
                    </a>
                </div>
            </fieldset>
        </div>
        <script type="text/javascript">
			var wrong_sound = new Audio("audio/wrong.mp3");
			var right_sound = new Audio("audio/right.wav");
			var letters_1 = "";
			var letters_2 = "";
        	var total_in_a_row = (600 / 100);
			var total_in_a_col = (600 / 100);
			var total_pixels = total_in_a_row * total_in_a_col;
			var opened = 0;
			var score = 0;
			var started = false;
			var working = false;
			function play_sound(sound_of){
				if($("#is_play_sound").is(":checked")){
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
				working = false;
				letters_1 = "ABCDEFGHIJKLMNOPQR";
				letters_2 = "ABCDEFGHIJKLMNOPQR";
				opened = 0;
				$("#btn_start").attr("disabled",true).addClass("btn_disabled");
				$(".pixels").remove();
				score = 0;
				produce_grid(total_pixels,function(){
					started = true;
					});
				}
			function end_game(){
				$("#btn_start").attr("disabled",false).removeClass("btn_disabled");;
				}
			
			function produce_grid(total_pixels, callback){
				var char_at = 0;
				for(i=1;i<=total_pixels;i++){
					$("#container").append("<div id='" + i + "' class='pixels'><div class='cover'></div></div>");
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
				callback();
				}
			
			$(document).on("click", ".pixels", function(){
				if(working == false){
					working = true;
					if(started == false) return;
					if($(this).find(".cover").is(":hidden")) return;
					if($(this).hasClass("done")) return;
					var data = new Array();
					
					if(opened == 0){
						$(this).find(".cover").hide("slide", {direction: 'down' }, 300, function(){
							opened++;
							$(this).parent().addClass("selected_pixel", function(){working = false;});
							});
						}
					else if(opened == 1){
						$(this).find(".cover").hide("slide", {direction: 'down' }, 300, function(){
							$(this).parent().addClass("selected_pixel");
							$(".selected_pixel").each(function(index, element) {
								data[index] = $(element).text();
								});
							if(data[0] == data[1]){
								$(".selected_pixel").addClass("correct_match",300, function(){
									play_sound("right");
									//$(".pixels").removeClass("correct_match");
									$(".selected_pixel").each(function(index, element) {
										//$(element).html("").addClass("done");
										$(element).addClass("done").removeClass("selected_pixel");
										if($(".pixels").length == $(".done").length){
											end_game();
											alert("You are done and your score is : " + score);
											}
										});
									setTimeout(function(){working = false;},350);
									});
								change_score('+');
								}
							else{play_sound("wrong");
								$(".selected_pixel").addClass("wrong_match",300,function(){
									$(".pixels").removeClass("wrong_match",200);
									$(".selected_pixel").find(".cover").delay(200).show("slide", {direction: 'down' }, 500,function(){
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
				$("#score_card").html("<legend>Score Card</legend><span style='font-size=18px; font-weight:bold; color:#C00;'>" + score + "</span>");
				}
        </script>
    </body>
</html>
