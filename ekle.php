<?php

  $conn= mysqli_connect('localhost' , 'root' ,'', 'proje');


$no = $_POST['ekle_no'];
$name = $_POST['ekle_ad'];
$surname = $_POST['ekle_surname'];

$ekle= "INSERT INTO kisiler(ono,ad,soyadi) VALUES('{$no}','{$name}','{$surname}')";

  if(!mysqli_query($conn,$ekle)){
    ?> <h3 style="position: absolute; top:20%; left:60;"   >Eklenemedi  </h3> <?php
  }
      else{
      ?>  <h3 style="position: absolute; top:20%; left:60;"    >Eklendi  </h3> <?php
    }




?>
