<!DOCTYPE html>
<html>
    <body>
    <?php
                    $conn =mysqli_connect('localhost', 'root', '','db_pet');
                    $id = $_GET['id'];
                    $sql = "DELETE FROM sanpham WHERE id = $id"; 
                    mysqli_query($conn, $sql);
                    header('Location: list.php')
    ?>
    </body>
</html>