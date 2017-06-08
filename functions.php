<?
	function anti_injection($string) {
		//remove palavras que contenham sintaxe sql
		$string = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"),"",$string);
		$string = trim($string);//limpa espaços vazio
		$string = strip_tags($string);//tira tags html e php
		$string = addslashes($string);//Adiciona barras invertidas a uma string
		return $string;
	}
	
	function alert($string) {
		?>
			<script>
				alert('<?=$string?>');
			</script>
		<?
	}
	
	function replace($page) {
		?>
			<script>
				document.location.replace('<?=$page?>');
			</script>
		<?
	}
	
	function href($page) {
		?>
			<script>
				document.location.href='<?=$page?>';
			</script>
		<?
	}
	
	function erro($string, $page = NULL) {
		alert($string);
		if($page) {
			location($page);
		} else {
			voltar();
		}
		exit();
	}
	
	function voltar() {
		?>
			<script>
				history.go(-1);
			</script>
		<?
	}
?>