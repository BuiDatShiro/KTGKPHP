
<?php
include "dbconfig.php";
  if (isset($_POST['submit'])) {
    $manv = $_POST['manv'];
    $tennv = $_POST['ten'];
    $gioitinh = $_POST['gt'];
    $noisinh = $_POST['ns'];
    $maphong = $_POST['maphong'];
    $luong = $_POST['luong'];
    $sql = "UPDATE `NHANVIEN`(`manv`, `tennv`, `phai`,`noisinh`,`maphong`,`luong`) VALUES ('$manv','$tennv','$gioitinh','$noisinh','$maphong',$luong)";
    $result = $conn->query($sql);
    if ($result == TRUE) {
      echo "Cập nhật nhân viên thành công.";
    }else{
      echo "Error:". $sql . "<br>". $conn->error;
    }

    if (isset($_GET['manv'])) {
        $manv = $_GET['manv'];
        $sql = "SELECT * FROM NHANVIEN WHERE id='$manv'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $manv = $row['manv'];
                $tennv = $row['ten'];
                $gioitinh = $row['gt'];
                $noisinh = $row['ns'];
                $maphong = $row['maphong'];
                $luong = $row['luong'];
            }
        }
    $conn->close();
  }
}
?>

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