<?php
$n1 = $_POST['degistir_no'];
$a1 = $_POST['degistir_ad'];
$s1 = $_POST['degistir_soyad'];
$conn = mysqli_connect('localhost','root','','proje');


$guncelle = "UPDATE kisiler SET ono ='$n1' , ad ='$a1' , soyadi ='$s1' WHERE ono ='$n1'";

$result=mysqli_query($conn , $guncelle );

if(!mysqli_query($conn,$result)){
  ?> <h3 style="position: absolute; top:20%; left:42%;"   >Değiştirildi  </h3> <?php
}
      else{
      ?> <h3 style="position: absolute; top:20%; left:42%;"   >Değiştirilemedi </h3> <?php
    }

mysqli_close($conn);
?>
