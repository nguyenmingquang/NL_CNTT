<?php
function taogiohang($tensp,$hinhsp,$gia,$soluong,$thanhtien,$idbill){
    $conn=ketnoidb();
    $sql = "INSERT INTO cart(tensp,hinhsp,gia,soluong,thanhtien,idbill) VALUES ('$tensp','$hinhsp','$gia','$soluong','$thanhtien','$idbill')";
    $conn->exec($sql);
    $conn = null;
}
function taodonhang($username,$name,$address,$phone,$total,$pttt){
    $conn=ketnoidb();
    $sql = "INSERT INTO bill(username,name,address,phone,total,pttt) VALUES ('$username','$name','$address','$phone','$total','$pttt')";
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();
    $conn = null;
    return $last_id;
}
function ketnoidb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_pet";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
        
    } catch(PDOException $e) {
       return $e->getMessage();
    }
    
}
function tongdonhang(){
    $tong=0;
    if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
        if(sizeof($_SESSION['giohang'])>0){
            
            for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
                $tt=$_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                $tong+=$tt;
                
            }
            
        }  
    }
    return $tong;
}

function showgiohang(){
    $ttgh="";
    if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
        if(sizeof($_SESSION['giohang'])>0){
            $tong=0;
            for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
                $t=$_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                $tt = sprintf('%.3f', $t);  
                $tong+=$tt;
                $tong = sprintf('%.3f', $tong); 
                $ttgh.= '<tr>
                <td>'.$_SESSION['giohang'][$i][0].'</td>
                        <td><img src="img/'.$_SESSION['giohang'][$i][1].'" alt="" witdh="100" height="120"></td>
                        <td>'.$_SESSION['giohang'][$i][2].'</td>
                        <td>'.$_SESSION['giohang'][$i][3].'</td>
                       
                        
                        <td>
                            <div>'.$tt.'</div>
                        </td>
                        <td>
                            <a href="cart.php?delid='.$i.'">Xóa</a>
                        </td>
                    </tr>';
            }
            $ttgh.= '<tr>
                    <th colspan="5">Tổng đơn hàng</th>
                    <th>
                        <div>'.$tong.'</div>
                    </th>

                </tr>';
        }   
    }
    return $ttgh;
}
function showbill(){
    $ttgh="";
    if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
        if(sizeof($_SESSION['giohang'])>0){
            $tong=0;
            for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
                $t=$_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                $tt = sprintf('%.3f', $t);  
                $tong+=$tt;
                $tong = sprintf('%.3f', $tong); 
                $ttgh.= 
                '<tr>
                        <td>'.$_SESSION['giohang'][$i][0].'</td>
                        <td><img src="img/'.$_SESSION['giohang'][$i][1].'" alt="" witdh="100" height="120"></td>
                        <td>'.$_SESSION['giohang'][$i][2].'</td>
                        <td>'.$_SESSION['giohang'][$i][3].'</td>
                        <td><div>'.$tt.'</div></td>
                </tr>';
            }
            $ttgh.= '<tr>
                        <th colspan="5">Tổng đơn hàng</th>
                        <th><div>'.$tong.'</div></th>
                    </tr>';
        }   
    }
    return $ttgh;
}
?>

