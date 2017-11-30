<?php
	require_once "bancodedados.php";
	session_start();
		
	if(isset($_SESSION['usuario'])&& !isset($_GET['uid'] ))
	{
		$u = $_SESSION['usuario'];
	}
	else if(isset($_SESSION['usuario'])&& isset($_GET['uid'] ))
	{
		$u = bd_obter_usuario_por_id( $con, $_GET['uid'] );
		if(!$u){
			header('location:erro.php');
			die();
		}
	}
	else if(!isset($_SESSION['usuario'])&& isset($_GET['uid'] ))
	{
		$u = bd_obter_usuario_por_id( $con, $_GET['uid'] );
		if(!$u){
			header('location:erro.php');
			die();
		}
	}
	else
	{
		header('location:erro.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/home2.css"/>
		<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
		<script type="text/javascript" src="./js/jquery.min.js"></script>
		
		<script>
		$(function(){
		
		});
		</script>
	</head>
	<body>
	<div class="fotos">
		<div class="ftPerfil">
		<img class="perfil" src= <?php echo '"dados/'.$u['apelido'].'/perfil.jpg"'?>/>
		</div>
		<div class="ftFundo">
		<img class="fundo" src= <?php echo '"dados/'.$u['apelido'].'/fundo.jpg"'?>/>
		</div>
	</div>
	
		<div class="apelido">
		<h2> <?php echo $u['apelido'];	?> </h2>
		</div>
	<div class="sobre" >
		
		<label>Nome: <?php echo $u['nome']; ?> </label>
		<label> <?php echo $u['sobrenome']; ?> </label></br>
		<label>Sexo: <?php echo $u['sexo'];	?>	</label></br>
		<label>Email: <?php echo $u['email']; ?> </label> 
		<button class="sair"> <a href="logout.php"> Sair </a> </button>
		
	</div>
	<?php 
	if(isset($_SESSION['usuario']) && isset($_GET['uid'] ))
	{ 
		if(!bd_verificar_amizade_existe( $con, $_SESSION['usuario'],[ 'id' => $_GET['uid'] ])){
	?>
	<form action="funcaoadd.php" method="get">
		<input type="submit" value="Adicionar" name="add" class="adicionar"/></br></br>
		<input type="hidden" name="uid" value=<?php echo '"'.$_GET['uid'].'"';?>/>
		
	</form>	
	<?php 
		}
		else{
			echo "<h3 class='existe'>Esse contato já está na sua lista de amigos</h3>";
		}
	?>
	<?php 
	}
	
	if(isset($_SESSION['usuario']))
	{
		//if( isset( $_GET[ 'uid' ] ) )
		//	$u = bd_obter_usuario_por_id( $con, $_GET['uid'] );
		//else
		//	$u = $_SESSION[ 'usuario' ];
		//var_dump( $_SESSION['usuario'] );
		$amigos=bd_obter_amigos_usuario( $con, $u );
	?>
		
		 <p id="amigos">Amigos</p> 
		
		
		<?php 
		foreach ($amigos as $amigo)
		{
		?>
		
		
		<div class="amigo">
			<?php echo $amigo['nome'];?>
			<div class="ftamigo">
			<img src="./dados/<?php echo $amigo['apelido'] ?>/perfil.jpg"/>
			</div>
		</div>
		</div>
		<?php
		}
	}
	?>
	 
	</ul>
	
	</body>
</html>