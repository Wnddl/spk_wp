<?php
include_once 'header.php';
include_once 'includes/nilai.inc.php';
$pro3 = new Nilai($db);
$stmt3 = $pro3->readAll();
include_once 'includes/alternatif.inc.php';
$pro1 = new Alternatif($db);
$stmt1 = $pro1->readAll();
$stmt4 = $pro1->readAll();
include_once 'includes/kriteria.inc.php';
$pro2 = new Kriteria($db);
$stmt2 = $pro2->readAll();
include_once 'includes/bobot.inc.php';
$pro5 = new Bobot($db);
$stmt5 = $pro5->readAll();
?>
	

<style>
	.kotak {
		border-radius: 10px;
		width: 1100px;
		padding:120px;
		box-shadow: 0px 0px 11px -5px rgba(0,0,0,0.7);
	}
</style>
	<h1 style="color: #050c57;"><b>Sistem Pendukung Keputusan Pemilihan Bibit Cabai Terbaik </b></h1>
	<h1 style="color:#050c57; text-align: center; margin-top: -10px;"><b> Dengan Metode Weighted Product</b></h1>
		<div class="row">
		  <div class="col-xs-12 col-sm-12 col-md-4">
		  	<br/>
		  	<!-- <div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Input Data</h3>
			  </div>
			  <div class="panel-body">
			    <ul class="nav nav-pills nav-stacked">
				  <li role="presentation"><a href="nilai.php">Nilai</a></li>
				  <li role="presentation"><a href="kriteria.php">Kriteria</a></li>
				  <li role="presentation"><a href="alternatif.php">Alternatif</a></li>
				</ul>
			  </div>
			</div>
		  	<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Analisa Data</h3>
			  </div>
			  <div class="panel-body">
			    <ul class="nav nav-pills nav-stacked">
				  <li role="presentation"><a href="bobot.php">Bobot</a></li>
				  <li role="presentation"><a href="rangking.php">Rangking</a></li>
				  <li role="presentation"><a href="laporan.php">Laporan</a></li>
				</ul>
			  </div> -->
			<!-- </div> -->
		  </div>
		  <!-- <div class="col-xs-12 col-sm-12 col-md-8" style="margin-left: -120px;">
			<div id="container2" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
		  </div> -->
		</div>
	<div class="kotak">
		<div class="row" >
		  <div class="col-xs-12 col-sm-10 col-md-3" >
			<div class="panel panel-default" >
			  <div class="panel-heading">
			    <h3 class="panel-title" >PENILAIAN KRITERIA</h3>
			</div>
			  <div class="panel-body">
							    <ol>
			    	<?php
					while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
					?>
				  	<li><?php echo $row3['ket_nilai'] ?> (<?php echo $row3['jum_nilai'] ?>)</li>
				  	<?php
					}
				  	?>
				</ol>
			  </div>
			</div>
		  </div>
		  
		  <div class="col-xs-12 col-sm-12 col-md-3">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Kriteria-Kriteria</h3>
			  </div>
			  <div class="panel-body">
			    <ol>
			    	<?php
					while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
					?>
				  	<li><?php echo $row2['nama_kriteria'] ?></li>
				  	<?php
					}
				  	?>
				</ol>
			  </div>
			</div>
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-3">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">nilai kepentingan</h3>
			  </div>
			  <div class="panel-body">
			    <ol class="list-unstyled">
			    	<?php
					while ($row5 = $stmt5->fetch(PDO::FETCH_ASSOC)){
					?>
				  	<li style="text-align: center;"><?php echo $row5['nilai_bobot'] ?></li>
				  	<?php
					}
				  	?>
				</ol>
			  </div>
			</div>
		  </div>
		  <div class="col-xs-12 col-sm-12 col-md-3">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Alternatif (MERK BENIH)</h3>
			  </div>
			  <div class="panel-body">
			    <ol>
			    	<?php
					while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
					?>
				  	<li><?php echo $row1['nama_alternatif'] ?></li>
				  	<?php
					}
				  	?>
				</ol>
			  </div>
			</div>
		  </div>
		</div>
	 	<div class="col-xs-12 col-sm-15 col-md-18">
			<div class="panel panel-default">
			  <div class="panel-heading"> 
			KETERANGAN :<BR>	
			  jika kriteria dengan tipe : <br>
						Benefit = Maka Semakin tinggi nilainya, semakin baik (misalnya, jumlah cabang atau daun dan tinggi tanaman).
						<br>Cost = Semakin rendah nilainya, semakin baik (misalnya, harga atau umur panen).
			  					</div>
		  </div>
		</div>
		
		<!-- <footer class="text-center">&copy; 2015</footer> -->
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/highcharts.js"></script>
	<script src="js/exporting.js"></script>
	<script>
	var chart1; // globally available
	$(document).ready(function() {
	      chart1 = new Highcharts.Chart({
	         chart: {
	            renderTo: 'container2',
	            type: 'column'
	         },  
	         title: {
	            text: 'Grafik Perangkingan '
	         },
	         xAxis: {
	            categories: ['Alternatif']
	         },
	         yAxis: {
	            title: {
	               text: 'Jumlah Nilai'
	            }
	         },
	              series:            
	            [
	            <?php
	            while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
	                  ?>
	                 //data yang diambil dari database dimasukan ke variable nama dan data
	                 //
	                  {
	                      name: '<?php echo $row4['nama_alternatif'] ?>',
	                      data: [<?php echo $row4['vektor_v'] ?>]
	                  },
	                  <?php } ?>
	            ]
	      });
	   });  
	   </script>
	</body>
</html>