​<?php
include "dbconfig.php";
if (isset($_GET['manv'])) {
    $manv = $_GET['manv'];
    $sql = "DELETE FROM NHANVIEN WHERE id ='$manv'";
     $result = $conn->query($sql);
     if ($result == TRUE) {
        echo "Xóa nhân viên thành công";
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}
?>