<?
	include('../connect.php');
	include('../functions.php');
	session_name('admin_loja_fadergs');
	session_start();
	
	$login = anti_injection($_POST['login']);
	$senha = anti_injection($_POST['senha']);
	
	$query = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
	$query = $mysqli->query($query);
	if($query->num_rows) {
		$dados = $query->fetch_assoc();
		$_SESSION['LOGADO'] = true;
		$_SESSION['ID'] = $dados->id;
		$_SESSION['NOME'] = $dados->nome;
		$_SESSION['EMAIL'] = $dados->email;
		$_SESSION['LOGIN'] = $dados->login;
		
		location('admin.php');
	} else {
		session_destroy();
		erro('Usuario nao encontrado!');
	}
?>