<?php
include_once 'header.php';
include_once 'includes/alternatif.inc.php';
$pro1 = new Alternatif($db);
$stmt1 = $pro1->readAll3();
$stmt4 = $pro1->readAll2(); 
$stmt1x = $pro1->readAll();
include_once 'includes/kriteria.inc.php';
$pro2 = new Kriteria($db);
$stmt3 = $pro2->readAll();
$stmt2 = $pro2->readAll9();
$stmt5 = $pro2->readAll10();
include_once 'includes/rangking.inc.php';
$pro = new Rangking($db);
$stmt = $pro->readKhusus();
$count = $pro->countAll();
include_once 'includes/bobot.inc.php';
$pro2 = new Bobot($db);
$stmt2 = $pro2->readAll();
$stmt2x = $pro2->readAll();
$stmt2y = $pro2->readAll();
$stmt2yx = $pro2->readAll();


if(isset($_POST['hapus-contengan'])){
    $imp = "('".implode("','",array_values($_POST['checkbox']))."')";
    $result = $pro->hapusell($imp);
    if($result){
            ?>
            <script type="text/javascript">
            window.onload=function(){
                showSuccessToast();
                setTimeout(function(){
                    window.location.reload(1);
                    history.go(0)
                    location.href = location.href
                }, 5000);
            };
            </script>
            <?php
    } else{
            ?>
            <script type="text/javascript">
            window.onload=function(){
                showErrorToast();
                setTimeout(function(){
                    window.location.reload(1);
                    history.go(0)
                    location.href = location.href
                }, 5000);
            };
            </script>
            <?php
    }
}


?>
<style>
    .main-content {
        margin-top: 25px;
        padding: 20px;
        margin-bottom: 15px;
        box-shadow: 0px 0px 10px -5px rgba(0,0,0,0.7);
    }
</style>
<!-- Main content -->
    <div class="main-content">
	<br/>
	<div>
	
	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist">
	    <li role="presentation" ><a href="#lihat" aria-controls="lihat" role="tab" data-toggle="tab">Hasil</a></li>
	    <li role="presentation"><a href="#rangking2" aria-controls="rangking" role="tab" data-toggle="tab">Perangkingan</a></li>
	    <li role="presentation" ><a href="#rangking1" aria-controls="rangking" role="tab" data-toggle="tab">Lihat Semua Data</a></li>
	    <!-- <li role="presentation"><a href="rangking-baru.php" role="tab">Tambah Data</a></li> -->
	  </ul>
	  <div class="tab-content">
		

	  <!-- Tab panes -->
	<!-- <div class="tab-content"> -->






	  	<!-- data rangking -->
	    <div role="tabpanel" class="tab-pane" id="rangking1">
	    	<br/>
	    	<form method="post">
			<div class="row">
				<div class="col-md-6 text-left">
					<h4>Data Rangking</h4>
				</div>
				<div class="col-md-6 text-right">
		            <!-- <button type="button" onclick="location.href='rangking-baru.php'" class="btn btn-primary">Tambah Data</button> -->
		            <button type="submit" name="hapus-contengan" class="btn btn-danger">Hapus Contengan</button>
				</div>
			</div>
			<br/>
			<table width="100%" class="table table-striped table-bordered">
		        <thead>
		            <tr>
		            	<th rowspan="2" style="vertical-align: middle" class="text-center" width="10px"><input type="checkbox" name="select-all" id="select-all" /></th>
		            	<th rowspan="2" style="vertical-align: middle" class="text-center">No</th>
		                <th rowspan="2" style="vertical-align: middle" class="text-center">Alternatif</th>
		                <th colspan="<?php echo $stmt3->rowCount(); ?>" class="text-center">Kriteria</th>
		                <!-- <th rowspan="2" style="vertical-align: middle" class="text-center">Aksi</th> -->
		            </tr>
		            <tr>
		            <?php
					while ($row2x = $stmt3->fetch(PDO::FETCH_ASSOC)){
					?>
		                <th><?php echo $row2x['nama_kriteria'] ?><br/>(<?php echo $row2x['tipe_kriteria'] ?>)</th>
		            <?php
					}
					?>
		            </tr>
		        </thead>
		
		        <tbody>
					<!-- <tr>
		                <th>Bobot</th>
		                <?php
		                while ($row2y = $stmt2y->fetch(PDO::FETCH_ASSOC)){
						?>
		                <td>
		                	<?php 
		                	echo $row2y['hasil_bobot'];
		                	?>
		                </td>
		                <?php
		                }
						?>
		            </tr> -->
		<?php
		$is = 1;
		while ($row1x = $stmt1x->fetch(PDO::FETCH_ASSOC)){
		?>
		            <tr>
		            	<td style="vertical-align:middle;"><input type="checkbox" value="<?php echo $row1x['id_alternatif'] ?> <?php echo $row1x['id_kriteria'] ?>" name="checkbox[]" /></td> 
		            	<td><?= $is++; ?></td>
		                <th><?php echo $row1x['nama_alternatif'] ?></th>
		                <?php
		                $ax= $row1x['id_alternatif'];
						$stmtrx = $pro->readR($ax);
						while ($rowrx = $stmtrx->fetch(PDO::FETCH_ASSOC)){
						?>
		                <td>
		                	<?php 
		                	echo $rowrx['nilai_rangking'];
		                	?>
		                </td>
		                <?php
		                }
						?>
						
						 <td class="text-center" style="vertical-align:middle;"> 
							 <a href="rangking-ubah.php?ia=<?php echo $row['id_alternatif'] ?>&ik=<?php echo $row['id_kriteria'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
							 <a href="rangking-hapus.php?ia=<?php echo $rowrx['id_alternatif'] ?>&ik=<?php echo $rowrx['id_kriteria'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a> 

					   </td>  
						            </tr>
		<?php
		}
		?>
		        </tbody>
		
		    </table>
		    


		    	</form>	
	    </div>


	    <!-- Hasil -->
	   
	    

	    <div role="tabpanel" class="tab-pane" id="lihat">
	    	<br/>
	    	<h4>Hasil</h4>
			<table width="100%" class="table table-striped table-bordered" id="tabeldata">
		        <thead>
		            <tr>
		            	<th rowspan="2" style="vertical-align: middle" class="text-center">No</th>
		                <th rowspan="2" style="vertical-align: middle" class="text-center">Alternatif</th>
		                <!-- <th colspan="<?php echo $stmt2->rowCount(); ?>" class="text-center">Kriteria</th>  -->
		                <th rowspan="2" style="vertical-align: middle" class="text-center">Vektor S</th>
		                <th rowspan="2" style="vertical-align: middle" class="text-center">Vektor V</th>
		            </tr>
		            <!-- <tr>
		            <?php
					while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
					?>
		                <th><?php echo $row2['nama_kriteria'] ?></th>
		            <?php
					}
					?>
		            </tr>  -->
		        </thead>
		
		        <tbody>
		<?php
		$nn = 1;
		while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
		?>
		            <tr>
		            	<th><?= $nn++;  ?></th>
		                <th><?php echo $row1['nama_alternatif'] ?> <?php echo  "(" . $row1['kode_alternatif'] . ")";  ?></th>
		                <?php
		                $a= $row1['id_alternatif'];
						$stmtr = $pro->readR($a);
						while ($rowr = $stmtr->fetch(PDO::FETCH_ASSOC)){
							$b = $rowr['id_kriteria'];
							$tipe = $rowr['tipe_kriteria'];
							$bobot = $rowr['hasil_bobot'];
						?>
		                <!-- <td>
		                	<?php 
		                	if($tipe=='benefit'){
		                		echo $nor = pow($rowr['nilai_rangking'],$bobot);
							} else{
								echo $nor = pow($rowr['nilai_rangking'],-$bobot);
							}

							$pro->ia = $a;
							$pro->ik = $b;
							$pro->nn4 = $nor;
							$pro->normalisasi1();
		                	?>
		                </td>   --> 
		                <?php
		                }
						?>
						<td>
							<?php 
							$stmthasil = $pro->readHasil1($a);
							$hasil = $stmthasil->fetch(PDO::FETCH_ASSOC);
							echo $hasil['bbn'];
							$pro->has1 = $hasil['bbn'];
							$pro->hasil1();
							?>
						</td>  
						<td>
							<?php
							$stmtmax = $pro->readMax();
							$maxnr = $stmtmax->fetch(PDO::FETCH_ASSOC);
							echo $hasil['bbn']/$maxnr['mnr1'];
							$pro->has2 = $hasil['bbn']/$maxnr['mnr1'];
							$pro->hasil2();
							?>
						</td>
		            </tr>
		<?php
		}
		?>
		        </tbody>
		
		    </table>
		    	
	    </div>



	    <!-- Perangkingan -->

	    <div role="tabpanel" class="tab-pane" id="rangking2">
	    	<br/>
	    	<h4>Perangkingan</h4>
			<table width="100%" class="table table-striped table-bordered">
		        <thead>
		            <tr>
		            	<th rowspan="2" style="vertical-align: middle" class="text-center">No</th>
		                <th rowspan="2" style="vertical-align: middle" class="text-center">Alternatif</th>
		                <!-- <th colspan="<?php echo $stmt3->rowCount(); ?>" class="text-center">Kriteria</th>  
		                <th rowspan="2" style="vertical-align: middle" class="text-center">Vektor S</th> -->
		                <th rowspan="2" style="vertical-align: middle" class="text-center">Vektor V</th>
		            </tr>
		            <!-- <tr>
		            <?php
					while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
					?>
		                <th><?php echo $row3['nama_kriteria'] ?></th>
		            <?php
					}
					?>
		            </tr>   -->
		        </thead>
		
		        <tbody>
		<?php
		$i = 1;
		$ii = 1;
		while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
		?>
		            <tr>
						<td><?= $i++; ?></td>
		                <th><?php echo $row4['nama_alternatif']  ?> <?php echo  "(" . $row4['kode_alternatif'] . ")";  ?></th>
		                <?php
		                $a= $row4['id_alternatif'];
						$stmtr = $pro->readR($a);
						while ($rowr = $stmtr->fetch(PDO::FETCH_ASSOC)){
							$b = $rowr['id_kriteria'];
							$tipe = $rowr['tipe_kriteria'];
							$bobot = $rowr['hasil_bobot'];

						?>
		                <!-- <td>
		                	<?php 
		                	if($tipe=='benefit'){
		                		echo $nor = pow($rowr['nilai_rangking'],$bobot);
							} else{
								echo $nor = pow($rowr['nilai_rangking'],-$bobot);
							}

							$pro->ia = $a;
							$pro->ik = $b;
							$pro->nn4 = $nor;
							$pro->normalisasi1();
		                	?>
		                </td>   -->
		                <?php
		                }
						?>
						<!-- <td>
							<?php 
							$stmthasil = $pro->readHasil1($a);
							$hasil = $stmthasil->fetch(PDO::FETCH_ASSOC);
							echo $hasil['bbn'];
							$pro->has1 = $hasil['bbn'];
							$pro->hasil1();
							?>
						</td>  -->
						<td>
							<?php
							$stmtmax = $pro->readMax();
							$maxnr = $stmtmax->fetch(PDO::FETCH_ASSOC);
							echo $hasil['bbn']/$maxnr['mnr1'];
							$pro->has2 = $hasil['bbn']/$maxnr['mnr1'];
							$pro->hasil2();
							?>
						</td>
		            </tr>
		<?php
		}
		?>
		        </tbody>
		
		    </table>
		    	
	    </div>
	  </div>
	
	</div>
</section>
</div>
</div>
<?php
include_once 'footer.php';
?>