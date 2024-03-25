<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
  <fieldset>
    <legend>Nhan Vien:</legend>
    Mã nhân viên:<br>
    <input type="text" name="manv"> <br>
    Tên Nhân Viên:<br>
    <input type="text" name="ten"> <br>
    Giới Tinh:<br>
    <input type="text" name="gt"><br>
    Nơi Sinh:<br>
    <input type="text" name="ns"><br>
    Mã Phòng:<br>
    <input type="text" name="maphong"><br>
    Lương:<br>
    <input type="number" name="luong"><br>
    <br><br>
    <input type="submit" name="submit" value="submit">
  </fieldset>
</form>
</body>
</html>

<?php
include "dbconfig.php";
  if (isset($_POST['submit'])) {
    $manv = $_POST['manv'];
    $tennv = $_POST['ten'];
    $gioitinh = $_POST['gt'];
    $noisinh = $_POST['ns'];
    $maphong = $_POST['maphong'];
    $luong = $_POST['luong'];
    $sql = "INSERT INTO `NHANVIEN`(`manv`, `tennv`, `phai`,`noisinh`,`maphong`,`luong`) VALUES ('$manv','$tennv','$gioitinh','$noisinh','$maphong',$luong)";
    $result = $conn->query($sql);
    if ($result == TRUE) {
      echo "Thêm nhân viên thành công.";
    }else{
      echo "Error:". $sql . "<br>". $conn->error;
    }
    $conn->close();
  }
?>