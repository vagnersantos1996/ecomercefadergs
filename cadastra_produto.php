<?
	if(empty($_POST['nome'])) {
		//erro 'nome' vazio
	} else {
		$nome = addslashes($_POST['nome']);
	}
	
	if(empty($_POST['preco_venda'])) {
		//erro 'preco_venda' vazio
	} else {
		$preco_venda = addslashes($_POST['preco_venda']);
	}
	
	if(empty($_POST['preco_compra'])) {
		//erro 'preco_compra' vazio
	} else {
		$preco_compra = addslashes($_POST['preco_compra']);
	}
	
	if(empty($_POST['estoque'])) {
		//erro 'estoque' vazio
	} else {
		$estoque = addslashes($_POST['estoque']);
	}
	
	if(empty($_POST['ativo'])) {
		//erro 'ativo' vazio
	} else {
		$ativo = addslashes($_POST['ativo']);
	}

	if(!empty($_FILES['name']['imagem'])) {
		$ext = strrchr(strtolower($_FILES['name']['imagem']), '.');
		if(!empty($ext) && ($ext=='jpg' || $ext=='png')) {
			$nome_img = md5(mktime()).$ext;
			if(move_uploaded_file($_FILES['tmp_name']['imagem']), 'img/'.$nome_img) {
				//query inserir registro
				$insert_produto =
				"INSERT INTO produtos (nome, preco_venda, preco_compra, desconto, estoque, ativo, usuarios) VALUES ('$nome', '$preco_venda', '$preco_compra', '$desconto', '$estoque', $ativo, {$_SESSION['id']})";
			} else {
				//erro ao mover
			}
		} else {
			//erro extensão
		}
	} else {
		//imagem vazia
	}
?>