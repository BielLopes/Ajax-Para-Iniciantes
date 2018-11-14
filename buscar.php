<?php
	include_once "conexao.php";
	$get = $_GET['q'];

	$string = sprintf("SELECT * from Informacion where Title LIKE '%%s%' OR Decript LIKE '%%s%'", $get, $get);
	$execut = $conexao->query("SELECT * from Informacion where Title LIKE '%$get%' OR Decript LIKE '%$get%'");
	if(mysqli_num_rows($execut)){
		$num = mysqli_num_rows($execut);
		?>
		<p>Sua pesquisa retornou <b><?php echo $num; ?></b> resultados de <b><?php echo utf8_encode($get); ?></b></p>
		<ul>
			<?php 
			while ($row = mysqli_fetch_assoc($execut)) {
		
			?>
			<li>
				<span><?php echo utf8_encode($row['Title']); ?></span>
				<p><?php echo utf8_encode($row['Decript']); ?></p>
			</li>
			<?php 	}	?>
		</ul>
		<?php
	}else{
		echo '<p>Não foram encontrados resultados para sua pesquisa</p>';
	}