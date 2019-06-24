<?php

  $conn = mysqli_connect('localhost' , 'root' , '', 'proje');


  $id = $_POST['sil_ono'];
  
  $sql = "DELETE FROM kisiler WHERE ono={$id} ";  //get ile url den alınan ono ya göre silme işlemi yapılıyor
  $sil = mysqli_query($conn, $sql);
    if(!mysqli_query($conn,$sil)){
      ?> <h3 style="position: absolute; top:20%; left:42%;"   >Silindi  </h3> <?php
    }
          else{
          ?> <h3 style="position: absolute; top:20%; left:42%;"   >Silinemedi  </h3> <?php
        }
  mysqli_close($conn);

?>
