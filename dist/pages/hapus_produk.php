<?php
include('../../src/config/db.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    mysqli_query($conn, "DELETE FROM dimsum WHERE id = $id");
}

header("Location: lihat_data.php");
exit;
