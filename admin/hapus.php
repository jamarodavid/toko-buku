<?php 

    require "conn.php";

    $id = $_GET['id'];

    $query = ("DELETE FROM data_buku WHERE id = $id");

    $sql = mysqli_query($conn, $query);
    
    if(mysqli_affected_rows($conn) > 0){
        echo "<script>
        alert('Data berhasil dihapus');
        document.location.href = 'data_buku.php';
    </script>";
    }

    mysqli_close($conn);


?>