<?php 
include 'koneksi.php';
?>

<a href="./" class="btn btn-secondary">Back</a><br>
<h2>Form Pencarian</h2>
<form action="search_data.php" method="get">
 <label>Judul Project :</label><br>
 <input type="text" name="cari_project"><br>
 <label>Nama Client  :</label><br>
 <input type="text" name="cari_client"><br>
 <input type="submit" value="Pencarian">
</form>
 
<?php 
if(isset($_GET['cari_project']) && ($_GET['cari_client'])){
 $cari_project = $_GET['cari_project'];
 $cari_client = $_GET['cari_client'];
 echo "<b>Hasil pencarian : <br>".$cari_nik." <br> ".$cari_nama." </b>";
}
?>
    <p>
    <table class="table table-hover table-bordered table-hover" id="dataTables-example">
        <thead class="table-info" disabled>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Project</th>
                    <th>Client</th>
                    <th>Project Leader</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Progress</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(isset($_GET['cari_project']) && ($_GET['cari_client'])){
                $cari_project = $_GET['cari_project'];
                $cari_client = $_GET['cari_client'];
                $data = mysqli_query($database,"select * from data_monitoring where project_name like '%".$cari_project."%' union select * from project_name where client like '%".$cari_client."%'");
                }elseif(isset($_GET['cari_project'])){
                $cari_project = $_GET['cari_project'];
                $data = mysqli_query($database,"select * from data_monitoring where project_name like '%".$cari_project."%'");
                }else{
                $data = mysqli_query($database,"select * from data_monitoring");  
                }
                $no = 1;
                while($d = mysqli_fetch_array($data)){
                ?>
                <tr>  
                <td align="center"><?php echo $no++; ?></td>
                <td class="text-center"><?php echo $d['project_name']; ?></td>
                <td class="text-center"><?php echo $d['client']; ?></td>
                <td class="text-center"><?php echo $d['project_leader']; ?></td>
                <td class="text-center"><?php echo $d['start_date']; ?></td>
                <td class="text-center"><?php echo $d['end_date']; ?></td>
                <td class="process"><?php echo $d['progress']; ?></td>
                </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
    </p>
</div>
