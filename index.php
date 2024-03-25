<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
table {
  border-collapse: collapse;
}

th, td {
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body>
<?php

    include("dbconfig.php");

    $query = $conn->query("SELECT * FROM NHANVIEN n, PHONGBAN p WHERE n.MaPhong = p.MaPhong");
    if($query->num_rows>0){
        $limit = 5;                    
        $total = mysqli_num_rows($query);
        $total_pages = ceil($total/$limit);  
        $page= isset($_GET['page']) ? $_GET['page'] : 1;

        $initial_page = ($page-1) * $limit;   

        $query = $conn->query("SELECT * FROM NHANVIEN n, PHONGBAN p WHERE n.MaPhong = p.MaPhong LIMIT $initial_page,$limit");
  
        echo '<table border="0" cellspacing="2" cellpadding="2"> 
        <tr> 
            <td> <font face="Arial">Mã Nhân Viên</font> </td> 
            <td> <font face="Arial">Tên Nhân Viên</font> </td> 
            <td> <font face="Arial">Giới tính</font> </td> 
            <td> <font face="Arial">Nơi Sinh</font> </td> 
            <td> <font face="Arial">Tên Phòng</font> </td>
            <td> <font face="Arial">Lương</font> </td>
            <td> <font face="Arial">Action</font> </td>  
        </tr>';

        while ($row = $query->fetch_assoc()) {
            $field1name = $row["MaNV"];
            $field2name = $row["TenNV"];
            $field3name = $row["Phai"];
            $field4name = $row["NoiSinh"];
            $field5name = $row["Luong"]; 
            $field6name = $row["TenPhong"];

            echo '<tr> 
                    <td>'.$field1name.'</td> 
                    <td>'.$field2name.'</td> ';
                    if($field3name == "NU"){
                        echo'<td><img src = "women.png" width="50px" height="50px"></td>';
                    }
                    else{
                        echo '<td><img src="men.png" width="50px" height="50px"></td>';
                    }
                    // <td>'.$field3name.'</td> ;
                    echo'
                    <td>'.$field4name.'</td> 
                    <td>'.$field6name.'</td> 
                    <td>'.$field5name.'</td> 
                    <td><a class="btn btn-info" href="SuaNV.php?id='.$row['MaNV'].'">Edit</a>
                     &nbsp;
                     <a class="btn btn-danger" href="XoaNV.php?id='.$row['MaNV'].'">Delete</a>
                    </td>
                </tr>';
        }
        
        $query->free();
        
    } 
    for($page_number = 1; $page_number<= $total_pages; $page_number++) {  

        echo '<a href = "index.php?page=' . $page_number . '">' . $page_number . ' </a>';  

    }
    
    
    $conn->close();

?>    

</body>
</html>
