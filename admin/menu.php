<?php
$sql  = "SELECT * FROM transportasi ORDER BY nama ASC";
$data = mysqli_query($koneksi,$sql);
?>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="index.php" class="nav-link"><i class="fe fe-home"></i> Dashboard</a>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i> Master Data</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="index.php?m=transportasi" class="dropdown-item ">Transportasi</a>
                      <a href="index.php?m=kota" class="dropdown-item ">Kota</a>
                      <a href="index.php?m=metode_pembayaran" class="dropdown-item ">Metode Pembayaran</a>
                      <a href="index.php?m=jenis_penumpang" class="dropdown-item ">Jenis Penumpang</a>
                      <a href="index.php?m=status_pembayaran" class="dropdown-item ">Status Pembayaran</a>
                      <a href="index.php?m=rute" class="dropdown-item ">Rute</a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-file-text"></i> Transaksi</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <?php while($row = mysqli_fetch_array($data)){ ?>
                        <a href="index.php?m=transaksi&p=list&id=<?=$row['id'];?>" class="dropdown-item"><?=$row['nama'];?></a>
                      <?php } ?>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>