<?php
	$sql_lienhe = "SELECT * FROM lienhe WHERE ID_Lienhe";
	$query_lienhe = mysqli_query($mysqli,$sql_lienhe);
?>

	<?php
		while($dong = mysqli_fetch_array($query_lienhe)){
	?>
		<p><?php echo $dong['thongtinlienhe']?></p>

	<?php	
	}
	?>  
