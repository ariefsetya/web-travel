<?php
$sql  = "SELECT * FROM kota";
$kota = mysqli_query($koneksi,$sql);

$kota_asal = $_SESSION['kota_asal'];
$kota_tujuan = $_SESSION['kota_tujuan'];
$tanggal = $_SESSION['tanggal'];
$penumpang = $_SESSION['penumpang'];
?>
<div style="width: 100%;height: 10px;background: #333;"></div>
<div style="width: 100%;background: DodgerBlue;">
  <div class="container" style="text-align: right;color:white;">
    <a href="index.php?m=register">Daftar</a> | <a href="">Masuk</a>
  </div>
</div>
<div class="bgimg-1">
  <div class="caption">
    <span class="border">More Travelling, More Experiences</span>
  </div>
</div>

<div class="header" id="myHeader">
  <div style="color: #777;background-color:DodgerBlue;text-align:center;padding: 20px 0;text-align: justify;">
<div class="container">
    <div class="booking_form w3-container">
      <form class="w3-container" action="proses/cari.php" method="POST">
        <div class="w3-row">
          <div class="w3-col s12 m3">
            <label class="w3-text-white">Kota Asal</label>
          </div>
          <div class="w3-col s12 m3">
            <label class="w3-text-white">Kota Tujuan</label>
          </div>
          <div class="w3-col s12 m3">
            <label class="w3-text-white">Tanggal</label>
          </div>
          <div class="w3-col s12 m2">
            <label class="w3-text-white">Penumpang</label>
          </div>
        </div>
        <div class="w3-row">
          <div class="w3-col s12 m3">
              <select name="kota_asal" required class="w3-select" >
                <option value="">Kota Asal</option>
                <?php foreach($kota as $row){ ?>
                <option <?=$kota_asal==$row['id']?"selected":"";?> value="<?=$row['id'];?>"><?=$row['nama'];?></option>
                <?php } ?>
              </select>
          </div>
          <div class="w3-col s12 m3">
              <select name="kota_tujuan" required class="w3-select" >
                <option value="">Kota Tujuan</option>
                <?php foreach($kota as $row){ ?>
                <option <?=$kota_tujuan==$row['id']?"selected":"";?> value="<?=$row['id'];?>"><?=$row['nama'];?></option>
                <?php } ?>
              </select>
          </div>
          <div class="w3-col s12 m3">
              <input type="text" value="<?=$tanggal==""?date("Y-m-d"):$tanggal;?>" name="tanggal" class="w3-input for_date">
          </div>
          <div class="w3-col s12 m2">
              <select class="w3-select" required name="penumpang">
                <option value="">Penumpang</option>
                <?php
                for ($i=1; $i < 5; $i++) { 
                  ?>
                  <option <?=$penumpang==$i?"selected":"";?> value="<?=$i;?>"><?=$i;?> orang</option>
                  <?php
                  }
                ?>
              </select>
          </div>
          <button class="w3-col s12 m1 w3-input" style="cursor: pointer;">
            Cari
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<script>
  $( function() {
    $( ".for_date" ).datepicker({minDate: 0,dateFormat:'yy-mm-dd',changeMonth: true,changeYear: true});
    $( ".for_date_old" ).datepicker({dateFormat:'yy-mm-dd',
      changeMonth: true,
      changeYear: true});
  } );
  </script>