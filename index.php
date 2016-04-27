<!DOCTYPE html>
<html>

<head>  
	
	
	
	
	
	<meta charset="utf-8">  
	<title>web app</title>  

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="jquery/jquery-ui.theme.min.css">
<link rel="stylesheet" href="jquery/jquery-ui.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">

  <script src="jquery/jquery.js"></script>
  <script src="jquery/jquery-ui.min.js"></script>

<script>
	//comment
var currentID = 0;
function gotAnswer(){
		$.ajax({
			method: 'post',
			url: 'ajax.php',
			data: {type:"gotanswer", id:currentID}
		})
		.done(function(data){
			
			$("#chatbox").html(data);
			
		});
		
	}
	
	function checkAnswer(){
		
		$.ajax({
			method:'post',
			url: 'ajax.php',
			data: {type: "statuscheck", id:currentID}
		})
		.done(function(data){
			if(data == '0'){
				
				}else {
					
				
			gotAnswer();
		}
		});
	}
	
	
	function askquestion(){
		
			
		
		var varMsg= $("#msg").val();
			
			
			$.ajax({
				method: "post",
				url: "ajax.php",
				data: {type:"submitquestion" , msg:varMsg}
					   
			})
			.done(function(data){
				currentID = data;
				
				$("#waitdialog").dialog();
	//$("#chatbox").scrollTop($("#chatbox").prop("scrollHeight"));	
				
			});
	
		}
		setInterval(function()
    { checkAnswer(); }, 2000);
    
    



	


    

    /*function keypress(){
		$("#msg").keypress(function(Event){
			if (event.which == 13){
				event.preventDefault();
				function askquestion();
				
				$("#msg").val('');
			}
		});
	}
*/


//document ready 
</script>

<body>
<div id="box">
		<div id="timezone">
			<form>
		 		<div class="form-group">	
			 	 			
			 <label for="zone">	SELECT TIME ZONE </label>
			<select class="form-control" name="zone" id="zone">
				  <option value="Europe/Dublin">Europe/Dublin</option>
				  <option value="Europe/Andorra">Europe/Andorra</option>
				  <option value="Asia/Dubai">Asia/Dubai</option>
				  <option value="Asia/Kabul">Asia/Kabul</option>
				  <option value="America/Antigua">America/Antigua</option>
				  <option value="Europe/Dublin">Europe/Dublin</option>
				   
				   <option value="Indian/Comoro">Indian/Comoro</option>
				  <option value="Africa/Lagos">Africa/Lagos</option>
				  <option value="Asia/Tokyo">Asia/Tokyo</option>
				  <option value="Europe/Malta">Europe/Malta</option>
				  <option value="Pacific/Efate">Pacific/Efate</option>
			  
			  
			</select>
 				</div>
			</form>
			
		</div>
			<div id="zoneDisplay"></div>
			
			<div id="chatbox"></div>
	
	<div class="input-group">
		<input class="form-control" type="text" name="msg" 
		id="msg" placeholder="Enter your Question here">  
	
		<span class="input-group-btn">
			<button class="btn btn-success" type="button" id="ask"
			onclick="askquestion();">Send</button>
		</span>
	</div>	
</div>
<div id="waitdialog" title="Chat Help">Wait please</div>
<script>
	$("#waitdialog").hide();
	</script>
</body>
</html>
    
    
