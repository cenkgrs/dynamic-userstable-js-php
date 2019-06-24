  <html>
  	<head>
  		<title>Projem</title>
  			<style>

  				body{
  					background-color:#2c2c54;
  				}
  				.t1{
  					width:80%;
  					height:15%;
  					background-color:#474787;
  					border: 5px solid black;
            margin-left: auto;
            margin-right: auto;
  				}
  				.tk{
  					width:80%;
  					height:40%;
  					background-color:#40407a;
  					border: 5px solid black;

            margin-left: auto;
            margin-right: auto;
  				}
          .
          .tk  td{
            height: 40%;
          }
  				th{
  					border:3px groove black;
  					width:16%;
  					color:#aaa69d;
  				}
  				td{
  					border:3px groove black;
  					width:190px;

  					color:#d1ccc0;
  				}
  				td:hover{
  					color:#aaa69d;
  				}
          .r1{
            height: 20%;
          }
          .r2{
            height: 20%;
          }
          .r3{
            height: 50px;
          }
  				.i1{
            height: 100%;
  					width:100%;
  					background-color:#A8B2CA;
  				}
          .i1none{
            height: 50%;
  					width:100%;
  					background-color:#A8B2CA;
            display: none;
  				}
          .s1none{
            height: 100%;
            width:100%;
            background-color:#AFBDDE;
            display: none;
          }
          .s1none:hover{
  					color:blue;
  				}

  				.s1{
            height: 100%;
  					width:100%;
  					background-color:#AFBDDE;
  				}
  				.s1:hover{
  					color:blue;
  				}
  				.a1{
  					color:#34ace0;
  					text-decoration:none;
  					padding:1px;
  				}
  				.a1:visited{
  					color:#34ace0;
  				}
  				.a1:hover{
  					color:#C8D2EA;
  				}
  				a{
  					padding:20px;
  					text-decoration:none;
  					color:#25CCF7;
  				}
  				a:hover{
  					color:white;
  				}

  				.stable{
  					width:49%;
  					height:50%;
  					background-color:#40407a;
  					border: 5px solid black;
  					float:right;
  				}
  				.itable{
  					width:25%;
  					height:8%;
  					background-color:#40407a;
  					border: 5px solid black;
  					position: absolute;;
            left:50%;
  				}
  				.linkler{
            position: absolute;
            top:85%;
            left:0%;
  					padding:20px;
  					float:left;

  				}
          .hh{
            top:40%;
            left:40%;
          }
          .newCells{
            height: 50px;
          }
          .sil-button{
            height: 100%;
            width: 100%;
          }

          <script type="text/javascript" >




          </script


  			</style>
  	<body>








            <table class="t1">
    <tr class="r1">
      <th >  NO </th>
      <th >  AD </th>
      <th > SOYAD </th>
      <th >SİL </th>
      <th >DEĞİŞTİR</th>
    </tr>


    <tr class="r2" >
        <td> <input class='i1' type=text name=ekleno id='ekleno'></td>
        <td><input class='i1' type=text name=eklead id='eklead' ></td>
        <td><input class='i1' type=text name=eklesoyad id='eklesoyad'></td>
        <td><button style="width:100%;"  onclick="ekle()"  class="s1" >EKLE </button></td>
        <td><input class='s1' type=button name=clear value=TEMİZLE onclick="window.location.href='http://localhost/proje/p4.php'"> </td>
  </tr>

    </table>

  <?php
  echo "
    <table class='tk' id='dataTable' >";
  $conn= mysqli_connect('localhost' , 'root' ,'', 'proje');
  $statement = "kisiler order by ono	";
  $records = mysqli_query($conn, "SELECT * FROM {$statement}  ;");



        while($rec = mysqli_fetch_array($records) ){
        ?>
      <tr class="r3" id="<?php echo $rec['ono'] ?>">
      <td><input id="ono_veri<?php echo $rec['ono'] ?>" type="text" id='degistirno' style="width:100%; display:none"> <?php echo $rec['ono']; ?> </td>
      <td><input id="ad_veri<?php echo $rec['ono'] ?>" type="text" id='degistirad' style="width:100%; display:none"> <?php echo $rec['ad']; ?> </td>
      <td><input id="soyad_veri<?php echo $rec['ono'] ?>" type="text" id='degistirsoyad' style="width:100%; display:none"> <?php echo $rec['soyadi']; ?> </td>
      <td> <button class="s1" style="width:100%;height:100%;" onclick="sil(<?php echo $rec['ono']; ?>)" class="sil"> SİL </button> </td>
      <td><button class="s1" style="width:100%;height:100%; display:block;" id="degistir<?php echo $rec['ono'] ?>" onclick="degTosak(<?php echo $rec['ono']; ?>)" > DEĞİŞTİR</button>
      <button class="s1" style="width:100%;height:100%;display:none;" onclick="sakla('<?php echo $rec['ono']; ?>','<?php echo $rec['ad']; ?>','<?php echo $rec['soyadi']; ?>')"  name="saklabutonu" id="sakla<?php echo $rec['ono']; ?>" >SAKLA</button>
      <button class="s1" style="width=100%;height:100%;display:none;" id="degistir2<?php echo $rec['ono'] ?>" onclick="degistir(<?php echo $rec['ono']; ?>)" > DEĞİŞTİR   </button></td>




</tr>


<?php
}
echo " </table> ";



  mysqli_close($conn);
  ?>

  <script type="text/javascript">

      function sil(ono){

          if(confirm('Silmek istediğinize emin misiniz ?')){

            $.ajax({
                type:'post',
                url: "sil.php",
                data:{sil_ono:ono},
                success:function(data){

                  var row = document.getElementById(ono);
                  row.style.display = 'none';

                }



              });


          }


      }



   </script>
   <script type="text/javascript">

    function degTosak(ono){

        $('#degistir'+ono).fadeOut('slow');
        $('#sakla'+ono).fadeIn(2000);

    }


   </script>

   <script type="text/javascript">

    function degTosaktwo(ono){

        $('#degistir'+ono).fadeOut('slow');
        $('#sakla'+ono).fadeIn(2000);

        $('#degafterekle').fadeOut('slow');
        $('#saklaafterdeg').fadeIn('2000');

    }


   </script>

   <script type="text/javascript">

   function sakla(ono,ad,soyad){
     if(confirm('Eski değerler saklansın mı ?')){


       $('#sakla'+ono).fadeOut('slow');
       $('#degistir2'+ono).fadeIn(1000);
       $('#ono_veri'+ono).fadeIn(1000);
       $('#ad_veri'+ono).fadeIn(1000);
       $('#soyad_veri'+ono).fadeIn(1000);

       $('#ono_veri'+ono).val(ono);

         $.ajax({
           type:'post',
           url:'sakla.php',
           data:{"ono_sakla": ono,
           "ad_sakla": ad,
         "soyad_sakla": soyad},

         success:function(data){
            $("");
         }

           });


   }
     }


   </script>

   <script type="text/javascript">

   function saklatwo(ono,ad,soyad){
     if(confirm('Eski değerler saklansın mı ?')){


       $('#saklaafterdeg').fadeOut('slow');
       $('#degbtntwo').fadeIn(1000);
       $('#noekle'+ono).fadeIn(1000);
       $('#adekle'+ono).fadeIn(1000);
       $('#soyadekle'+ono).fadeIn(1000);



       $('#noekle'+ono).val(ono);

         $.ajax({
           type:'post',
           url:'sakla.php',
           data:{"ono_sakla": ono,
           "ad_sakla": ad,
         "soyad_sakla": soyad},

         success:function(data){
            $("");
         }

           });


   }
     }


   </script>

   <script type="text/javascript">

   function degistir(ono){

     var no = $("#ono_veri"+ono).val();
     var name = $("#ad_veri"+ono).val();
     var surname = $("#soyad_veri"+ono).val();


     $('#ono_veri'+ono).hide('slow');
     $('#ad_veri'+ono).hide('slow');
     $('#soyad_veri'+ono).hide('slow');
      $('#degistir2'+ono).hide('slow');
      $('#degistir'+ono).show(1000);



      if(confirm('Değerler değiştirilsin mi ?')){
          $.ajax({
            url: 'degistir.php',
              type:'post',

              data:{"degistir_no": ono,
               "degistir_ad": name,
                "degistir_soyad": surname},

                success:function(data){

                  var row = document.getElementById(ono);
                  row.style.display = 'none';

                   var dbtn = document.createElement('input');
                   dbtn.className = "s1";
                   dbtn.type = "button";
                   dbtn.value = "DEĞİŞTİR";
                   dbtn.id="degbtn";
                   dbtn.setAttribute("onclick","degTosaktwo("+ono+");");




                   var btn =  document.createElement('input');
                   btn.type = "button";
                   btn.className = "s1";

                   btn.value = "SİL";
                   btn.setAttribute("onclick","sil("+ono+");");



                   var table = document.getElementById('dataTable');
                   var row = table.insertRow(0);
                   row.id = ono;
                   var cell1 = row.insertCell(0);
                   var cell2 = row.insertCell(1);
                   var cell3 = row.insertCell(2);
                   var cell4 = row.insertCell(3);
                   var cell5 = row.insertCell(4);
                   cell1.innerHTML = $("#ono_veri"+ono).val();

                   cell2.innerHTML = $("#ad_veri"+ono).val();

                   cell3.innerHTML = $("#soyad_veri"+ono).val();

                   cell4.appendChild(btn);
                   cell5.appendChild(dbtn);

                   cell1.className = 'newCells';
                    cell2.className = 'newCells';
                    cell3.className = 'newCells';
                    cell4.className = 'newCells';
                    cell5.className = 'newCells';
                }


            });

}
   }

   </script>

   <script type="text/javascript">

   function degistirtwo(ono){



     var no = $("#noekle"+ono).val();
     var name = $("#adekle"+ono).val();
     var surname = $("#soyadekle"+ono).val();


      $('#noekle'+ono).hide('slow');
      $('#adekle'+ono).hide('slow');
      $('#soyadekle'+ono).hide('slow');
      $('#degbtntwo'+ono).hide('slow');
      $('#degafterekle'+ono).show(1000);


      if(confirm('Değerler değiştirilsin mi ?')){
          $.ajax({
            url: 'degistir.php',
              type:'post',

              data:{"degistir_no": ono,
               "degistir_ad": name,
                "degistir_soyad": surname},

                success:function(data){

                  var row = document.getElementById(ono);
                  row.style.display = 'none';

                   var dbtn = document.createElement('input');
                   dbtn.className = "s1";
                   dbtn.type = "button";
                   dbtn.value = "DEĞİŞTİR";
                   dbtn.id="degbtn";
                   dbtn.setAttribute("onclick","degTosaktwo("+ono+");");




                   var btn =  document.createElement('input');
                   btn.type = "button";
                   btn.className = "s1";

                   btn.value = "SİL";
                   btn.setAttribute("onclick","sil("+ono+");");



                   var table = document.getElementById('dataTable');
                   var row = table.insertRow(0);
                   row.id = ono;
                   var cell1 = row.insertCell(0);
                   var cell2 = row.insertCell(1);
                   var cell3 = row.insertCell(2);
                   var cell4 = row.insertCell(3);
                   var cell5 = row.insertCell(4);
                   cell1.innerHTML = $("#ono_veri"+ono).val();
                   cell1.innerHTML = $("#noekle"+ono).val();
                   cell2.innerHTML = $("#ad_veri"+ono).val();
                   cell2.innerHTML = $("#adekle"+ono).val();
                   cell3.innerHTML = $("#soyad_veri"+ono).val();
                   cell3.innerHTML = $("#soyadekle"+ono).val();
                   cell4.appendChild(btn);
                   cell5.appendChild(dbtn);

                   cell1.className = 'newCells';
                    cell2.className = 'newCells';
                    cell3.className = 'newCells';
                    cell4.className = 'newCells';
                    cell5.className = 'newCells';
                }


            });

}
   }

   </script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script type="text/javascript">

        function ekle(){


          var no = document.getElementById('ekleno').value;
          var isim = document.getElementById('eklead').value;
          var soyisim = document.getElementById('eklesoyad').value;
          var number = $('#sil'+no);

        




          var dbtn = document.createElement('input');
          dbtn.className = "s1";
          dbtn.type = "button";
          dbtn.value = "DEĞİŞTİR";
          dbtn.id="degafterekle";
          dbtn.setAttribute("onclick","degTosaktwo("+no+");");

          var saklabtn = document.createElement('input');
          saklabtn.type="button";
          saklabtn.className = "s1none";
          saklabtn.value = "SAKLA";
          saklabtn.id="saklaafterdeg";
          saklabtn.setAttribute("onclick","saklatwo("+no+","+name+","+surname+");");

          var noekle = document.createElement('input');
          noekle.type = "text";
          noekle.id="noekle"+no;
          noekle.className = "i1none";


          var adekle = document.createElement('input');
          adekle.type = "text";
          adekle.id="adekle"+no;
          adekle.className = "i1none";


          var soyadekle = document.createElement('input');
          soyadekle.type = "text";
          soyadekle.id="soyadekle"+no;
          soyadekle.className = "i1none";

          var degno = $("#noekle"+no).val();
          var degad = $("#adekle"+no).val();
          var degsoyad = $("#soyadekle"+no).val();



          var dbtntwo = document.createElement('input');
          dbtntwo.className = "s1none";
          dbtntwo.type = "button";
          dbtntwo.value = "DEĞİŞTİR";
          dbtntwo.id="degbtntwo";
          dbtntwo.setAttribute("onclick","degistirtwo("+no+");");

          var btn =  document.createElement('input');
          btn.type = "button";
          btn.className = "s1";
          btn.value = "SİL";
          btn.setAttribute("onclick","sil("+no+");");

     var table = document.getElementById('dataTable');
     var row = table.insertRow(no);
     row.id = no;
     var cell1 = row.insertCell(0);
     var cell2 = row.insertCell(1);
     var cell3 = row.insertCell(2);
     var cell4 = row.insertCell(3);
     var cell5 = row.insertCell(4);
     cell1.innerHTML = document.getElementById("ekleno").value;
     cell2.innerHTML = document.getElementById("eklead").value;
     cell3.innerHTML = document.getElementById("eklesoyad").value;
     cell1.appendChild(noekle);
     cell2.appendChild(adekle);
     cell3.appendChild(soyadekle);
     cell4.appendChild(btn);
     cell5.appendChild(dbtn);
     cell5.appendChild(saklabtn);
     cell5.appendChild(dbtntwo);

     cell1.className = 'newCells';
      cell2.className = 'newCells';
      cell3.className = 'newCells';
      cell4.className = 'newCells';
      cell5.className = 'newCells';



      var no = $("#ekleno").val();
      var name = $("#eklead").val();
      var surname = $("#eklesoyad").val();

      if(confirm('Emin misin ?')){
          $.ajax({
            url: "ekle.php",
              type:'post',

              data:{"ekle_no": no,
               "ekle_ad": name,
                "ekle_surname": surname},

                success:function(data){
                   $("");
                }


            });

}


   }


   </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  </body>
  </html>
