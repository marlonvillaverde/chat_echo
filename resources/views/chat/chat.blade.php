<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Live Chat</title>
		<meta name="viewport" content="width=device-width, initial_scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="csrf-token" content="{{csrf_token()}}">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link rel="preconnect" href="https://fonts.bunny.net">
	</head>
	<body>
		<section class="msger">
			<header class="msger-header">
				<div class="msger-header-title">
					<i class="fas fa-comment-alt"></i>
					<span class="chatWith"></span>
					<span class="typing" style="display: none;">está escribiendo</span>
				</div>
				<div class="msger-header-option">
					<span class="chatStatus offline"><i class="fas fa-globe"></i></span>
				</div>
			</header>
			<div class="msger-chat"></div>

			<form class="msger-inputarea" >				
				<input type="text" class="msger-input" oninput="sendTypingEvent()" placeholder="Escribe tu mensaje...">
				<button type="submit" class="msger-send-btn">Enviar</button>
			</form>			
		</section>
	</body>
	@vite(['resources/css/app.css', 'resources/js/app.js'])	
	<script src="{{ asset('/js/jquery.min.js')}}"></script>
	<link rel="stylesheet" href="/css/chat.css">
	<script src="{{ asset('/js/chat.js')}}"></script>

</html>