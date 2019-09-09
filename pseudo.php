<!DOCTYPE html>
<html>
<head>
	<title>Divisible by 7</title>
</head>
<body>
	<p id="demo"></p>
</body>
</html>

<script type="text/javascript">
	var p = document.getElementById('demo');
	var text = '';
	for(var a = 7; a<=72; a++){
		if(a % 7 == 0){
			text += "<br>Number" + " "+ a + " " + "is divisible by 7";
		}
		 document.getElementById("demo").innerHTML = text;
	}
</script>