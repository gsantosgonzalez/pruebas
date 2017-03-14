<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>APIgram Test</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div class="apitelegram">
		<ul id="log"></ul>
	</div>
	<script src="jquery-3.1.1.min.js"></script>
	<script>
		$.get('https://api.telegram.org/bot295859298:AAH91CiNc353GNZEVh51XtmH3gaAxFJ0soc/getMe', function(data) {
    		$('#log').append('<li>getMe:</li>');
    		$('#log').append('<li>ID: ' + data.result.id + '</li>');
    		$('#log').append('<li>Username: '+ data.result.username +'</li>');
    		$('#log').append('<li>Nombre: ' + data.result.first_name + '</li>');
		});
	</script>
</body>
</html>