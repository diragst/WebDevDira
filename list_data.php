<div class="col-sm" style="padding-top: 20px">
    <h2>Search Name Project</h2>
    <td align="center"><a href=?p=search_data class="search"><img src="icons/search.svg"> Search Project</a><br></td>
	<h2>List Project</h2>
	<a href=?p=entri_data class="btn btn-primary"><img src="icons/plus.svg"> Entri Project</a><br>
	<p>
		<table class="table table-hover table-bordered table-hover" id="dataTables-example">
			<thead class="table-info" disabled>
				<tr class="text-center">
					<th>No</th>
					<th>Projek Name</th>
					<th>Client</th>
					<th>Projek Leader</th>
					<th>Start Date</th>
					<th>End Date</th>
                    <th>Progress</th>
					<?php
					if($_SESSION['level']=='administrator'){
						echo "<th>Aksi</th>";
					}
					?>
				</tr>
			</thead>
			<tbody>
				<?php
					include 'koneksi.php';
					$no=1;
					$tampil=mysqli_query($database,"SELECT * FROM data_monitoring");
					while ($data=mysqli_fetch_array($tampil)) {
				?>
				<tr>
					<td align="center"><?php echo $no++,"."; ?></td>
					<td class="text-center"><?php echo $data['project_name']; ?></td>
					<td><?php echo $data['client']; ?></td>
					<td class="text-center"><?php echo $data['project_leader'] ?></td>
					<td class="text-center"><?php echo $data['start_date']; ?></td>
                    <td class="text-center"><?php echo $data['end_date'] ?></td>
					<td class="text-center"><?php echo $data['progress']; ?></td>
					<?php
					if($_SESSION['level']=='administrator'){
						?>
					<td class="text-center">
                        <a href="detail_data.php?project_name=<?php echo $data ['project_name']; ?> ">detail</a> |
						<a href="edit_data.php?project_name=<?php echo $data['project_name']; ?>"> <img src="icons/reply.svg"></a> |
						<a href="delete_data.php?project_name=<?php echo $data['project_name']; ?>" onclick="return confirm('Yakin akan menghapus data ?');"><img src="icons/trash.svg"></a>
					</td> 
					<?php
					}
					?>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</p>
</div>