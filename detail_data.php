<?php
    if(isset($_GET['project_name'])){
        $project_name =$_GET['project_name'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    include "koneksi.php";
    $query    =mysqli_query($database, "SELECT * FROM data_monitoring WHERE project_name='$project_name'");
    $result   =mysqli_fetch_array($query);
?>
<html>
<head>
    <title>Script PHP untuk Menampilkan Data dari Database Derdasarkan Id</title>
</head>
<body>
    <h2>Detail Data Project</h2>
    <p><i>Note: Dibawah ini adalah detail informasi project</i> <b><?php echo $project_name?></b></p>
    <table border="0" cellpadding="4">
        <tr>
            <td size="90">PROJECT NAME</td>
            <td>: <?php echo $result['project_name']?></td>
        </tr>
        <tr>
            <td>CLIENT</td>
            <td>: <?php echo $result['client']?></td>
        </tr>
        <tr>
            <td>PROJECT LEADER</td>
            <td>: <?php echo $result['project_leader']?></td>
        </tr>
        <tr>
            <td>START DATE</td>
            <td>: <?php echo $result['start_date']?></td>
        </tr>
        <tr>
            <td>END DATE</td>
            <td>: <?php echo $result['end_date']?></td>
        </tr>
        <tr>
            <td>PROGRESS</td>
            <td>: <?php echo $result['progress']?></td>
        </tr>
        <tr height="40">
            <td></td>
            <td>   <a href="./">Back</a></td>
        </tr>
    </table>
</body>
</html>