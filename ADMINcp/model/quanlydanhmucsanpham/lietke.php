
<?php
    $sql_lietke_danhmucsp = "SELECT * FROM danhmucsp ORDER BY thutu DESC";
    $query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>
<p>Liệt Kê Danh Mục Sản Phẩm</p>
<table>
    <tr>
        <th>ID</th>
        <th>Tên Danh Mục</th>
        <!-- <th>Số Thứ Tự</th> -->
        <th>Quản Lý Danh Mục</th>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {    
    $i++;       
    ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $row['tendanhmuc']?></td>
        <!--  -->
        <td>
            <a class="button" href="model/quanlydanhmucsanpham/xuly.php?iddanhmuc=<?php echo $row['ID_Danhmuc']?>">Xoá</a>
            <a class="button" href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['ID_Danhmuc']?>">Sửa</a>
        </td>
    </tr> 
    <?php
    }
    ?> 
</table>
<style>
    table {
        border-collapse: collapse;
        width: 50%;
        margin: 20px auto;
    }
    th, td {
        padding: 10px;
        text-align: center;
        border: 1px solid black;
    }
    th {
        background-color: #ddd;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #fff;
    }
    .button {
        display: inline-block;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        background-color: #333333;
        color: white;
        border: none;
        border-radius: 6px;
        transition: background-color 0.3s;
    }
    .button:hover {
        background-color: #000;
		color: #fff;
    }
</style>
