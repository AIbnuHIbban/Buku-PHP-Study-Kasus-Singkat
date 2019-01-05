<?php

include 'koneksi.php';

$query = $conn->query("SELECT * FROM data_buku");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku</title>
</head>
<style>
    body{
        text-align:center
    }
</style>
<body>
    <table width='100%' cellpadding='5' cellspacing='0' border='1'>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; while($data=mysqli_fetch_array($query)): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['judul'] ?></td>
                <td>
                    <?php if($data['status'] === "0"): echo "Jarang di Baca"; else: echo "Sering di Baca"; endif; ?>
                </td>
                <td>
                    <a href="?aksi=1&id=<?= $data['id'] ?>">Sering Dibaca</a> || 
                    <a href="?aksi=0&id=<?= $data['id'] ?>">Jarang Dibaca</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>

<?php

if(isset($_GET['aksi'])){

    if($_GET['aksi'] === "1"){
        $id = $_GET['id'];
        $query = $conn->query("UPDATE data_buku SET status='1' WHERE id='$id'");
    }else{
        $id = $_GET['id'];
        $query = $conn->query("UPDATE data_buku SET status='0' WHERE id='$id'");
    }

    header("Location:index.php");

}else{
    
}




?>