<!DOCTYPE html>
<?php include 'db.php';?>
<html>
<head>
	<title>Chat Platform</title>
	<link rel="stylesheet" href="style.css" media="all"/>
	<script>
	        function ajax(){

	        	var req= new XMLHttpRequest();

	        	req.onreadystatechange =function(){

	        		if(req.readyState==4 && req.status==200)
	        		{
	        			document.getElementById('chat').innerHTML= req.responseText;
	        		}
	        	}
	        	req.open('GET','chat.php',true);
	        	req.send();
	        }
	        setInterval(function(){ajax()},1000);
	</script>
</head>
<body onload="ajax();">
	<div class ="container">
		<div class="chat_box">
			<div id="chat"></div>
		</div>
		<form action="index.php" method="post">
			<input type ="text" name="name" placeholder="Username"/>
			<textarea name="msg" placeholder="write down your message"></textarea>
			<input type="submit" name="submit" value="send"/>
		</form>
		<?php
		if(isset($_POST['submit'])){

			$name=$_POST['name'];
			$msg=$_POST['msg'];

			$insert ="insert into chat (name,msg) values ('$name','$msg')";
			$run = $db->query($insert);

			if($run){
				echo "<embed loop='false' src ='chat.mp3' hidden='true' autoplay='true'>";
			}
		}
		?>
	</div>
</body>
</html>

