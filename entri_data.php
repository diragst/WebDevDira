<div class="col-sm-12" style="padding-top: 20px">
	<a href="../WEBDEVMONITORING/index.php?p=monitoring" class="btn btn-danger"><img src="icons/gear.svg"> List Data</a>
	<h2>Entri Monitoring</h2><hr>

	<form role="form" method="POST" action="">
		<div class="form-group">
			<label>PROJECT NAME</label>
			<input type="text" name="project_name" class="form-control" placeholder="Name Project">
		</div>
		<div class="form-group">
			<label>CLIENT</label>
			<input type="text" name="client" class="form-control" placeholder="Name Client">
		</div>
		<div class="form-group">
			<label>PROJECT LEADER</label>
			<input type="text" name="project_leader" class="form-control" placeholder="Project Leader">
		</div>
        <div class="form-group">
			<label>START DATE</label> <br>
			<input type="date" name="start_date" value="<?php echo date("d-m-Y"); ?>">
		</div>
		<div class="form-group">
			<label>END DATE</label> <br>
			<input type="date" name="end_date" value="<?php echo date("d-m-Y"); ?>">
		</div>
		<div class="form-group">
			<label>PROGRESS</label>
			<input type="number" name="progress" class="form-control" placeholder="Progress">
		</div>
		<button type="submit" class="btn btn-primary" name="submit">Simpan</button>
		<button type="reset" class="btn btn-default">Reset</button>
	</form>
	<?php
        include ("koneksi.php");
		if (isset($_POST['submit'])) {
			$simpan=mysqli_query($database,"INSERT INTO data_monitoring (project_name,client,project_leader,start_date,end_date,progress) 
									VALUES(
											'$_POST[project_name]','$_POST[client]','$_POST[project_leader]','$_POST[start_date]',
											'$_POST[end_date]','$_POST[progress]')"
									);
			if ($simpan) 
			echo "<script>window.location='index.php?p=monitoring'</script>";
		}
	?>
</div>