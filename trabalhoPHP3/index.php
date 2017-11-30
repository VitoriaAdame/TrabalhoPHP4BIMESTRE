<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="./css/index1.css"/>
	<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
		
	</head>
	<body>
		
		<div class="log">
			<div class="imglogo">
			<img class="logo" src="./imagem/logo1.png"/>
			</div>
			<h1 class="title">Bem-vindo à Aliança</h1>
			<form action="loginphp.php" method="post" class="login">
				<input type="text" placeholder="Nome de usuário" name="username" class="box"/></br></br>
				<input type="password" placeholder="Senha" name="senha"class="box"/></br></br>
				<a href="home.php"><input type="submit" value="Entrar" id="ent"/></a>
			</form><br>
			<button id="ent"><a href="cadastrar.php">Cadastrar-se</a></button>
		</div>
	</body>
</html>