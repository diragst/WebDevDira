<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<title> Edit Project </title>
</head>
<body>
<?php
	 include 'koneksi.php';
	 $ambil=mysqli_query($database,"SELECT * FROM data_monitoring WHERE project_name='$_GET[project_name]'");
	 $data=mysqli_fetch_array($ambil);
	 
	 ?>
<div class="col-sm-12" style="padding-top: 20px">
	<a href="../WEBDEVMONITORING/index.php?p=monitoring" class="btn btn-danger"><img src="icons/gear.svg"> List Data</a>
	<h2>Edit Project</h2><hr>
	<form role="form" method="POST" action="">
		<div class="form-group">
			<label>PROJECT NAME</label>
			<input type="text" name="project_name" class="form-control" value="<?=$data['project_name']?>">
		</div>
		<div class="form-group">
			<label>CLIENT</label>
			<input type="text" name="client" class="form-control" value="<?=$data['client']?>">
		</div>
		<div class="form-group">
			<label>PROJECT LEADER</label>
			<input type="text" name="project_leader" class="form-control" value="<?=$data['project_leader']?>">
		</div>
        <div class="form-group">
			<label>START DATE</label> <br>
			<input type="date" name="start_date" value="<?=$data['start_date']?>">
		</div>
		<div class="form-group">
			<label>END DATE</label> <br>
			<input type="date" name="end_date" value="<?=$data['end_date']?>">
		</div>
		<div class="form-group">
			<label>PROGRESS</label>
			<input type="number" name="progress" class="form-control" value="<?=$data['progress']?>">
		</div>
		<button type="submit" class="btn btn-primary" name="edit_data" value="update">Simpan</button>
		<button type="reset" class="btn btn-default">Reset</button>
	</form>
	<?php
		if (isset($_POST['edit_data'])) {
			$update=mysqli_query($database,"UPDATE data_monitoring SET
                        		project_name = '$_POST[project_name]',
                                client ='$_POST[client]',
                                project_leader = '$_POST[project_leader]',
                                start_date = '$_POST[start_date]',
								end_date = '$_POST[end_date]',
                                progress = '$_POST[progress]'			
								WHERE project_name = '$_GET[project_name]'");
			if ($update) 
                header('location:../WEBDEVMONITORING/index.php?p=monitoring');
		}
	?>
</div>
</body>
</html>