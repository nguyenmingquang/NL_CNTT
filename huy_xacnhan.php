<!DOCTYPE html>
<html>
    <body>
    <?php
                    $conn =mysqli_connect('localhost', 'root', '','db_pet');
                    $id = $_GET['id'];
                    $sql = "UPDATE bill  SET xacnhan='Đặt hàng không thành công!'  WHERE id = $id"; 
                    mysqli_query($conn, $sql);
                    header('Location: list.php')
    ?>
    </body>
</html>