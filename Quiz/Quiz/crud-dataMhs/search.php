<?php
include 'koneksi.php';


if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];

    // Query untuk melakukan pencarian sesuai dengan keyword
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%'";
    $result = mysqli_query($conn, $query);

    $response = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response[] = $row;
        }
    }

    echo json_encode($response);
}
?>
