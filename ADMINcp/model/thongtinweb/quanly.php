<style>
	.ttlh {
		font-size: 24px;
		font-weight: bold;
		margin-bottom: 20px;
	}
	table {
		border: 1px solid #ccc;
		width: 100%;
		border-collapse: collapse;
		margin-bottom: 20px;
	}
	th {
		background-color: #eee;
		padding: 10px;
		text-align: left;
	}
	td {
		padding: 10px;
	}
	textarea {
		padding: 5px;
		border: 1px solid #ccc;
		border-radius: 4px;
		width: 100%;
		resize: none;
	}
	input[type="submit"] {
		background-color: #333333;
		color: #fff;
		border: none;
		padding: 10px 20px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		border-radius: 4px;
		cursor: pointer;
		margin-top: 10px;
	}
	input[type="submit"]:hover {
		background-color: #000;
	}
	
</style>
<?php
	$sql_lienhe = "SELECT * FROM lienhe WHERE ID_Lienhe";
	$query_lienhe = mysqli_query($mysqli,$sql_lienhe);
?>
<p class="ttlh">Quản lý thông tin website</p>
<table border="1" width="100%" style="border-collapse: collapse;">
	<?php
		while($dong = mysqli_fetch_array($query_lienhe)){
	?>
	<form method="POST" action="model/thongtinweb/xuly.php?id=<?php echo $dong['ID_Lienhe']?>" enctype="multipart/form-data">	
			
	  <tr>
	    <td>Thông Tin Liên Hệ</td>
	    <td><textarea rows="10" name="thongtinlienhe" style="resize: none;"> <?php echo $dong['thongtinlienhe']?></textarea></td>
	  </tr>
	 
	  <tr>
	  	<td colspan="2"><input type="submit" name="updateliennhe" value="Cập nhật thông tin liên hệ" ></td>
	  </tr>

		<?php	
		}
		?>  
	</form>  
</table>