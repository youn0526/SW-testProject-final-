<?php
$host = 'localhost';
$user = 'dbs0834';
$pw = 'dbs7834!';
$dbName = 'dbs0834';
$mysqli = new mysqli($host, $user, $pw, $dbName);

$product=$_POST['product'];
$count=$_POST['count'];
$name=$_POST['name'];
$tel=$_POST['tel'];
$address=$_POST['address'];

// if($product==NULL )
// {
//     echo '<script> alert("상품을 선택해주세요");
//     history.back();
//      </script>';
//      exit();
// }

// if($count==NULL )
// {
//     echo '<script> alert("상품 수량을 선택해주세요"); 
//     history.back();
//     </script>';
//     exit();
// }

// if($name==NULL )
// {
//     echo '<script> alert("이름을 적어주세요");
//     history.back();
//      </script>';
//      exit();
// }

// if($tel==NULL )
// {
//     echo '<script> alert("전화번호를 적어주세요"); 
//     history.back();
//     </script>';
//     exit();
// }

// if($address==NULL )
// {
//     echo '<script> alert("주소를 적어주세요"); 
//     history.back();
//     </script>';
//     exit();
// }

$mysqli=mysqli_connect("localhost", "dbs0834", "dbs7834!", "dbs0834");

$insert=mysqli_query($mysqli,"INSERT INTO product (상품, 수량, 이름, 전화번호, 주소, 주문일자) 
VALUES ('$product', '$count', '$name', '$tel','$address',  NOW())");
if($insert){
    echo '<script> 
    alert("정상적으로 주문 되었습니다!");
    window.close(); </script>';
} else {
    echo("오류" . mysqli_error($mysqli));
}
?>