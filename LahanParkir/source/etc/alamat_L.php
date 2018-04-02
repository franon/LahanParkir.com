<?php


  ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>alamat_L.php</title>
     <!-- <link rel="stylesheet" href="../../source/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
     <!-- <link rel="stylesheet" href="../../source/css/bootstrap.min.css.map"> -->
     <?php
      if(file_exists("source/css/select2.min.css")) {
        include 'db.php';
        $ajaxpage = "source/etc/selectTempatSign.php";
        ?>
       <link rel="stylesheet" href="source/css/select2.min.css">
       <link rel="stylesheet" href="source/css/select2-bootstrap.min.css">
        <script src="source/js/jquery-3.3.1.min.js"></script>
        <script src="source/js/select2.min.js"></script>

       <?php
      } else {
        include '../../db.php';
        $ajaxpage = "../../source/etc/selectTempatSign.php";
        ?>
       <link rel="stylesheet" href="../../source/css/select2.min.css">
       <link rel="stylesheet" href="../../source/css/select2-bootstrap.min.css">
      <script src="../../source/js/jquery-3.3.1.min.js"></script>
      <script src="../../source/js/select2.min.js"></script>

       <?php
      }
      ?>
   </head>
   <body>
     <div class="form-group">
      <select class="form-control select2 select2up" id="kabupaten" name="kabupaten" required>
        <option value="">Kota/Kabupaten</option>
        <?php
          $stmt = $mysqli->prepare("SELECT id_kab, id_prov, nama FROM kabupaten_daerah ORDER BY nama");
          $stmt->execute();
          $stmt->bind_result($id_kab, $id_prov, $nama);
          while($stmt->fetch()) {
            echo "<option value='".$id_kab."' prov='".$id_prov."'>$nama</option>";
          }
          $stmt->close();
         ?>
      </select>
     </div>
     <div class="form-group">
      <select class="form-control select2 select2up" id="kecamatan" name="kecamatan" required>
        <option value="">Kecamatan</option>
      </select>
     </div>
     <div class="form-group">
      <select class="form-control select2" id="kelurahan" name="kelurahan" required>
        <option value="">Kelurahan</option>
      </select>
     </div>


     <!--  -->

     <script type="text/javascript">
      $(".select2").select2({
        allowClear:true,
        placeholder: 'Position'
      });
      </script>
     <script type="text/javascript">
     $(document).on('change', '#kabupaten', function(){
         $("#s2id_kecamatan .select2-chosen").empty();
         $("#s2id_kecamatan .select2-chosen").text("Kecamatan");
         $("#s2id_kelurahan .select2-chosen").empty();
         $("#s2id_kelurahan .select2-chosen").text("Kelurahan");
     })
     $(document).on('change', '#kecamatan', function(){
       $("#s2id_kelurahan .select2-chosen").empty();
       $("#s2id_kelurahan .select2-chosen").text("Kelurahan");
     })
     // ajax

     $(document).on('change', '.select2', function(){
         var value = $(this).val();
         var name = $(this).attr("id");
         if(name == "kelurahan") {
           return false;
         }
         var place = "";
         var ajaxpage = '<?php echo $ajaxpage ?>';
         if(name == "kabupaten") {
           place = "kecamatan";
         } else if(name == "kecamatan") {
           place = "kelurahan";
         }
         $.ajax({    //create an ajax request to display.php
         type: "GET",
         url: ajaxpage+"?r="+value+"&name="+name+"&place="+place,
         dataType: "html",   //expect html to be returned
         success: function(response){
                     $("#"+place).html(response);
                 }
         });
     });
     </script>
   </body>
 </html>
