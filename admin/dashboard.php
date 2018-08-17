<?php
$sql = "SELECT COUNT(id) as jumlah FROM transaksi";
$pesanan = mysqli_query($koneksi,$sql);
$pesanan = mysqli_fetch_assoc($pesanan);

$date = date("Y-m-d");

$sql = "SELECT COUNT(id) as jumlah FROM transaksi WHERE date(created_date)='$date'";
$pesanan_today = mysqli_query($koneksi,$sql);
$pesanan_today = mysqli_fetch_assoc($pesanan_today);

$sql = "SELECT COUNT(id) as jumlah FROM transportasi";
$transportasi = mysqli_query($koneksi,$sql);
$transportasi = mysqli_fetch_assoc($transportasi);


$sql = "SELECT * FROM transportasi";
$transport = mysqli_query($koneksi,$sql);
$trx = [];
foreach ($transport as $key) {
  
    $sql = "SELECT COUNT(id) as jumlah 
        FROM transaksi 
        WHERE transportasi_id='".$key['id']."'
        GROUP BY date(created_date)
        ORDER BY date(created_date) ASC";
    $trx_transport = mysqli_query($koneksi,$sql);
    $trx[] = ['id'=>$key['id'],
                'nama'=>$key['nama'],
                'trx'=>$trx_transport];
}

$sql = "SELECT COUNT(id) as jumlah FROM kota";
$kota = mysqli_query($koneksi,$sql);
$kota = mysqli_fetch_assoc($kota);

$sql = "SELECT COUNT(id) as jumlah FROM rute";
$rute = mysqli_query($koneksi,$sql);
$rute = mysqli_fetch_assoc($rute);

$sql = "SELECT COUNT(id) as jumlah FROM user WHERE jenis='user'";
$user = mysqli_query($koneksi,$sql);
$user = mysqli_fetch_assoc($user);

$sql = "SELECT COUNT(id) as jumlah, date(created_date) as tanggal FROM transaksi GROUP BY date(created_date) ORDER BY date(created_date) ASC";
$transaksi = mysqli_query($koneksi,$sql);

$sql = "SELECT COUNT(a.id) as jumlah, b.nama as transportasi, a.transportasi_id 
        FROM transaksi a 
        LEFT JOIN transportasi b ON a.transportasi_id=b.id
        GROUP BY a.transportasi_id";
$trx_transportasi = mysqli_query($koneksi,$sql);

$sql = "SELECT COUNT(a.id) as jumlah, coalesce(c.nama,'Belum Diproses Ke Pembayaran') as status
        FROM transaksi a 
        LEFT JOIN pembayaran b ON b.transaksi_id=a.id
        LEFT JOIN status_pembayaran c ON b.status_pembayaran_id=c.id
        GROUP BY c.id";
$trx_status = mysqli_query($koneksi,$sql);
?>

        <div class="my-3 my-md-5">
          <div class="container">
            <div class="row row-cards">
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="h1 m-0"><?=$pesanan['jumlah'];?></div>
                    <div class="text-muted mb-4">Pesanan</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="h1 m-0"><?=$pesanan_today['jumlah'];?></div>
                    <div class="text-muted mb-4">Pesanan Hari ini</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="h1 m-0"><?=$transportasi['jumlah'];?></div>
                    <div class="text-muted mb-4">Transportasi</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="h1 m-0"><?=$kota['jumlah'];?></div>
                    <div class="text-muted mb-4">Kota</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="h1 m-0"><?=$rute['jumlah'];?></div>
                    <div class="text-muted mb-4">Rute</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="h1 m-0"><?=$user['jumlah'];?></div>
                    <div class="text-muted mb-4">Customer</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Statistik Pesanan</h3>
                  </div>
                  <div id="chart-development-activity" style="height: 15rem"></div>
                </div>
                <script>
                  require(['c3', 'jquery'], function(c3, $) {
                  	$(document).ready(function(){
                  		var chart = c3.generate({
                  			bindto: '#chart-development-activity', // id of chart wrapper
                  			data: {
                  				columns: [
                              <?php
                              foreach ($trx as $key) {
                                    echo "['data".$key['id']."',";
                                    foreach ($key['trx'] as $row) {
                                      echo $row['jumlah'].",";
                                    }
                                    echo "],";
                              }?>
                  				],
                  				type: 'area',
                          names:{
                            <?php
                              foreach ($trx as $key) {
                                    echo "'data".$key['id']."':'".$key['nama']."',";
                              }?>
                          }
                  			},
                  			axis: {
                  				y: {
                  					padding: {
                  						bottom: 0,
                  					},
                  					show: false,
                  						tick: {
                  						outer: false
                  					}
                  				},
                  				x: {
                  					padding: {
                  						left: 0,
                  						right: 0
                  					},
                  					show: false
                  				}
                  			},
                  			legend: {
                  			   show: true
                  			},
                  			tooltip: {
                  				format: {
                  					title: function (x) {
                  						return '';
                  					}
                  				}
                  			},
                  			padding: {
                  				bottom: 0,
                  				left: 0,
                  				right: 0
                  			},
                  			point: {
                  				show: true
                  			}
                  		});
                  	});
                  });
                </script>
              </div>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Pesanan per Transportasi</h3>
                      </div>
                      <div class="card-body">
                        <div id="chart-donut" style="height: 12rem;"></div>
                      </div>
                    </div>
                    <script>
                      require(['c3', 'jquery'], function(c3, $) {
                      	$(document).ready(function(){
                      		var chart = c3.generate({
                      			bindto: '#chart-donut', // id of chart wrapper
                      			data: {
                      				columns: [
                              <?php foreach ($trx_transportasi as $key) { 
                                echo "['".$key['transportasi_id']."',".$key['jumlah']."],"; 
                              }?>
                      				],
                      				type: 'pie',
                      				names: {
                      					<?php foreach ($trx_transportasi as $key) { 
                                echo "'".$key['transportasi_id']."':'".$key['transportasi']."',"; 
                              }?>
                      				}
                      			},
                      			axis: {
                      			},
                      			legend: {
                                      show: true, //hide legend
                      			},
                      			padding: {
                      				bottom: 0,
                      				top: 0
                      			},
                      		});
                      	});
                      });
                    </script>
                  </div>
                  <div class="col-sm-6">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Pesanan per Status</h3>
                      </div>
                      <div class="card-body">
                        <div id="chart-pie" style="height: 12rem;"></div>
                      </div>
                    </div>
                    <script>
                      require(['c3', 'jquery'], function(c3, $) {
                      	$(document).ready(function(){
                      		var chart = c3.generate({
                      			bindto: '#chart-pie', // id of chart wrapper
                      			data: {
                      				columns: [
                      				  <?php foreach ($trx_status as $key) { 
                                echo "['".$key['status']."',".$key['jumlah']."],"; 
                              }?>
                      				],
                      				type: 'pie', // default type of chart
                      				names: {
                                <?php foreach ($trx_status as $key) { 
                                echo "'".$key['status']."':'".$key['status']."',"; 
                              }?>
                      				}
                      			},
                      			axis: {
                      			},
                      			legend: {
                                      show: true, //hide legend
                      			},
                      			padding: {
                      				bottom: 0,
                      				top: 0
                      			},
                      		});
                      	});
                      });
                    </script>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>