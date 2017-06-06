<?
	session_name('loja-fadergs');
	session_start();
	
	ini_set('display_errors', 0);
	include('conexao.php');
	
	$_SESSION['carrinho']['quantidade'] = 2;	
?>
<!doctype html>
<html>
    <head>
        <meta charset="iso-8859-1">
        <title>Ecommerce Fadergs</title>
    	<script src="js/jquery-3.1.1.js"></script>
        <link rel="stylesheet" type="text/css" href="css/css.css">
    </head>
    <body>
    	<header>
        	<div>
            	<a href="index.php">
                	<img src="img/logo.png" alt="Logo FADERGS">
                </a>
            </div>
            <nav>
            	<ul>
            		<li>
                    	<a href="index.php">Home</a>
                    </li>
            		<li>
                    	<a href="#">Sobre</a>
                    </li>
            		<li>
                    	<a href="index.php">Produtos</a>
                    </li>
            		<li>
                    	<a href="#">Meu Cadastro</a>
                    </li>
            		<li>
                    	<a href="#">Carrinho</a>
                    </li>
            		<li>
                    	<a href="#">Contato</a>
                    </li>
            	</ul>
                <a href="#">
                    <div title="Meu Carrinho">
                        <?
							if($_SESSION['carrinho']['quantidade']) {
								?>
                                	<div id="quantidade_carrinho_menu"><?=$_SESSION['carrinho']['quantidade']?></div>
                                <?
							}
						?>
                    </div>
                </a>
            </nav>
        </header>
        <section>
        	<?
				if($_GET['page']=='carrinho') {
					include('carrinho.php');
				} elseif($_GET['page']=='adicionar_carrinho') {
					include('adicionar_carrinho.php');
				} else {
					include('home.php');
				}
			?>
        </section>
        <footer>
        	<?
				include('footer.php');
			?>
        </footer>
    </body>
</html>