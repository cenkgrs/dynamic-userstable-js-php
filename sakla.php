<?php

  $conn= mysqli_connect('localhost' , 'root' ,'', 'proje');


$no = $_POST['ono_sakla'];
$name = $_POST['ad_sakla'];
$surname = $_POST['soyad_sakla'];

$ekle= "INSERT INTO yedek(ono,ad,soyadi) VALUES('{$no}','{$name}','{$surname}')";

  if(!mysqli_query($conn,$ekle)){
    ?> <h3 style="position: absolute; top:20%; left:60;"   >Eklenemedi  </h3> <?php
  }
      else{
      ?>  <h3 style="position: absolute; top:20%; left:60;"    >Eklendi  </h3> <?php
    }




?>
