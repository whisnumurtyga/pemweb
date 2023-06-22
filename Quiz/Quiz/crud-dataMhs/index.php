<?php 
    require_once('koneksi.php');     
    // $nim= $_GET['NIM'];
    // $query = " SELECT * FROM mahasiswa WHERE NIM='$nim' ";
    // $data = mysqli_query($conn,$query);
    // $arrdat = mysqli_fetch_array($data);
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ADA ADA SAJA </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <style>
            svg {
                color: inherit;
                text-decoration: none;
            }
            .image-container {
                max-width: 100px; /* Atur lebar maksimum gambar */
                margin: 0 auto; /* Tengahkan gambar secara horizontal */
            }

            .img-fluid {
                max-width: 100%;
                height: auto;
            }
            #search-loading {
                display: none; /* Sembunyikan ikon loading secara default */
            }

            @keyframes spin {
                0% {
                    transform: rotate(0deg);
                }
                100% {
                    transform: rotate(360deg);
                }
            }

            .loading-svg {
                animation: spin 2.5s infinite linear;
            }
        </style>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg bg-danger navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container d-flex justify-content-center align-items-center mt-5">
        <div class="card" style="width: 50rem;">
            <div class="card-body">
                <h5 class="card-title text-center mt-2" >DATA MAHASISWA</h5>
                <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#addDataModal">Add Data</button>
                <div class="d-flex justify-content-center mb-5">
                    <form class="col-lg-6 text-center" role="search">
                        <div class="input-group mt-3">
                            <input class="form-control rounded-3" id="search-input" type="search" placeholder="Search" aria-label="Search">

                        </div>
                    </form>
                </div>
                <div class="input-group-append mt-1 ml-3 d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" id="search-loading" class="ml-3 loading-svg" width="100" height="100" fill="currentColor" class="bi bi-brightness-low-fill" viewBox="0 0 16 16">
                        <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8.5 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 11a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm5-5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm-11 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9.743-4.036a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707zm-7.779 7.779a.5.5 0 1 1-.707-.707.5.5 0 0 1 .707.707zm7.072 0a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707zM3.757 4.464a.5.5 0 1 1 .707-.707.5.5 0 0 1-.707.707z"/>
                    </svg>
                </div>
                <table class="table">
                    <tbody id="search-results">
                    <?php
                    include 'koneksi.php';
                        $siswa = mysqli_query($conn,"SELECT * FROM mahasiswa");
                        $id = 1;
                        Foreach($siswa as $row){
                    ?>
                        <tr>
                            <th scope="row" style="vertical-align: middle;"><?= $id ?></th>
                            <td style="vertical-align: middle;"><?= $row["nama"] ?></td>
                            <td class="text-center">
                                <div class="image-container">
                                    <img src="<?= $row['path_img'] ?>" alt="" width="100px" class="img-fluid">
                                </div>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-sm mt-2 edit-button" data-bs-toggle="modal" data-bs-target="#editDataModal" data-nim="<?=$row['NIM']?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </button>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-sm delete-button mt-2" data-bs-toggle="modal" data-nim="<?= $row['NIM'] ?>" data-bs-target="#confirmDeleteModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    <?php
                            $id++;
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="input.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama">NIM :</label>
                            <input type="number" class="form-control" id="nim" name="nim">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama :</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat :</label>
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                        <div class="form-group">
                            <label for="notelp">No Telepon :</label>
                            <input type="number" class="form-control" id="notelp" name="notelp">
                        </div>
                        
                        <div class="form-group mt-1 mb-1">
                            <label for="prodi" class="mt-1 mb-1">Hobi :</label> <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="Ngoding" id="ngoding" name="hobby-1">
                                <label class="form-check-label" for="ngoding">Ngoding</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="Baca Buku" id="baca-buku" name="hobby-2">
                                <label class="form-check-label" for="baca-buku">Baca Buku</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="Bermain Game" id="bermain-game" name="hobby-3">
                                <label class="form-check-label" for="bermain-game">Bermain Game</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mt-1">Prodi :</label> <br>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="prodi">
                                <option selected>Program Studi</option>
                                <option value="Informatika" >Informatika</option>
                                <option value="Sains Data">Sains Data</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prodi" class="mb-1">Fakultas :</label> <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="fakultas" id="ftib" value="FTIB" >
                                <label class="form-check-label" for="ftib">
                                    FTIB
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="fakultas" id="fteic" value="FTEIC" >
                                <label class="form-check-label" for="fteic">
                                    FTEIC
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prodi" class="mb-1">Jenis Kelamin :</label> <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" id="L" value="L" >
                                <label class="form-check-label" for="L">
                                    L
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" id="P" value="P" >
                                <label class="form-check-label" for="P">
                                    P
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="foto">Foto : </label>
                            <input type="file" class="form-control-file" id="fileInput" accept="image/*" name="foto">
                        </div><br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" value="simpan" class="btn btn-danger">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Edit -->
    <div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body d-flex justify-content-center">
                        <img src="" id="editImg" alt="" width="200px" class="mx-auto">
                    </div>
                    <form method="post" action="update.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama">NIM :</label>
                            <input type="number" class="form-control" id="editNIM" name="nim" value="">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama :</label>
                            <input type="text" class="form-control" id="editNama" name="nama" value="" >
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat :</label>
                            <input type="text" class="form-control" id="editAlamat" name="alamat" value="">
                        </div>
                        <div class="form-group">
                            <label for="notelp">No Telepon :</label>
                            <input type="number" class="form-control" id="editNotelp" name="notelp" value="">
                        </div>
                        
                        <div class="form-group mt-1 mb-1">
                            <label for="prodi" class="mt-1 mb-1">Hobi :</label> <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="Ngoding" id="editNgoding" name="edit-hobby-1">
                                <label class="form-check-label" for="ngoding">Ngoding</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="Baca Buku" id="editNgoding" name="edit-hobby-2">
                                <label class="form-check-label" for="baca-buku">Baca Buku</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="Bermain Game" id="editNgegame" name="edit-hobby-3">
                                <label class="form-check-label" for="bermain-game">Bermain Game</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mt-1">Prodi :</label> <br>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="prodi" id="editProdi">
                                <option  selected>Program Studi</option>
                                <option value="Informatika" >Informatika</option>
                                <option value="Sains Data">Sains Data</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prodi" class="mb-1">Fakultas :</label> <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="fakultas" id="editFTIB" value="FTIB" >
                                <label class="form-check-label" for="editFTIB">
                                    FTIB
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="fakultas" id="editFTEIC" value="FTEIC" >
                                <label class="form-check-label" for="editFTEIC">
                                    FTEIC
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prodi" class="mb-1">Jenis Kelamin :</label> <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" id="editL" value="L" >
                                <label class="form-check-label" for="L">
                                    L
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" id="editP" value="P" >
                                <label class="form-check-label" for="P">
                                    P
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="foto">Foto : </label>
                            <input type="file" class="form-control-file" id="editFileInput" accept="image/*" name="editFoto">
                        </div><br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" value="simpan" class="btn btn-danger">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure want to delete?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                    <a href="" id="deleteLink">
                        <button type="button" class="btn btn-danger">Delete</button>
                    </a>
                </div>
            </div>
        </div>
    </div>




    <!-- Delete -->
    <script>
        $(document).ready(function() {
            $('.delete-button').click(function() {
                var nim = $(this).data('nim');
                var deleteUrl = 'delete.php?nim=' + nim;
                $('#deleteLink').attr('href', deleteUrl);
            });
        });
    </script>

    <!-- Edit -->
    <script>
        $(document).ready(function() {
            // Tangkap klik pada tombol edit
            $('.edit-button').click(function() {
                var nim = $(this).data('nim'); // Ambil nilai NIM dari atribut data-nim
                alert(nim)
                // Kirim permintaan AJAX untuk mendapatkan data mahasiswa
                $.ajax({
                    url: 'get_mahasiswa.php', // Ganti 'get_mahasiswa.php' dengan skrip yang mengambil data mahasiswa berdasarkan NIM
                    method: 'GET',
                    data: {
                        nim: nim
                    },
                    success: function(response) {
                        var mahasiswa = JSON.parse(response); // Mengurai data mahasiswa dari JSON menjadi objek
                        console.log(mahasiswa)
                        // Isi nilai awal (old value) pada.
                        if (mahasiswa.path_img) {   
                            $('#editImg').attr('src', mahasiswa.path_img)
                        }
                        $('#editNama').val(mahasiswa.nama);
                        $('#editNIM').val(mahasiswa.NIM);
                        $('#editAlamat').val(mahasiswa.alamat);
                        $('#editNotelp').val(mahasiswa.telp)
                        $('#editProdi').val(mahasiswa.prodi);
                        $('input[name="fakultas"]').prop('checked', false); // Menghapus seleksi sebelumnya
                        $('input[name="fakultas"][value="' + mahasiswa.fakultas + '"]').prop('checked', true);

                        $('input[name="jk"]').prop('checked', false); // Menghapus seleksi sebelumnya
                        $('input[name="jk"][value="' + mahasiswa.jenis_kelamin + '"]').prop('checked', true);
                        // Tambahkan kode di atas untuk setiap input pada modal edit yang ingin Anda isi dengan nilai awal dari data mahasiswa
                        
                        // Isi nilai awal (old value) pada elemen checkbox
                        $('input[name="edit-hobby-1"]').prop('checked', false); // Menghapus seleksi sebelumnya
                        $('input[name="edit-hobby-2"]').prop('checked', false); // Menghapus seleksi sebelumnya
                        $('input[name="edit-hobby-3"]').prop('checked', false); // Menghapus seleksi sebelumnya

                        // Mengatur seleksi berdasarkan data mahasiswa
                        if (mahasiswa.hobby.includes('Ngoding')) {
                            $('input[name="edit-hobby-1"]').prop('checked', true);
                        }
                        if (mahasiswa.hobby.includes('Baca Buku')) {
                            $('input[name="edit-hobby-2"]').prop('checked', true);
                        }
                        if (mahasiswa.hobby.includes('Bermain Game')) {
                            $('input[name="edit-hobby-3"]').prop('checked', true);
                        }
                        // Tampilkan modal edit
                        $('#editDataModal').modal('show');
                        alert('dalam success')
                    }
                });
                alert('dalam ajax')
            });
        });
    </script>

    <!-- SEARCH -->
    <script>
        $(document).ready(function() {
            var searchLoading = $('#search-loading')
            var table = $('.table')
            $('#search-input').on('input', function() {
                var keyword = $(this).val();
                table.hide()
                searchLoading.show()
                setTimeout(function() {
                    $.ajax({
                        url: 'search.php',
                        method: 'POST',
                        data: { keyword: keyword },
                        dataType: 'json',
                        success: function(response) {
                            console.log(response)
                            var html = '';
                            if (response.length > 0) {
                                $.each(response, function(index, data) {
                                    html += '<tr>';
                                    html += '<th scope="row" style="vertical-align: middle;">' + (index + 1) + '</th>';
                                    html += '<td style="vertical-align: middle;">' + data.nama + '</td>';
                                    html += '<td class="text-center">';
                                    html += '<div class="image-container">';
                                    html += '<img src="' + data.path_img + '" alt="" width="100px" class="img-fluid">';
                                    html += '</div>';
                                    html += '</td>';
                                    html += '<td class="text-center">';
                                    html += '<button type="button" class="btn btn-danger btn-sm mt-2 edit-button" data-bs-toggle="modal" data-bs-target="#editDataModal" data-nim="' + data.NIM + '">';
                                    html += '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">';
                                    html += '<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>';
                                    html += '<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>';
                                    html += '</svg>';
                                    html += '</button>';
                                    html += '</td>';
                                    html += '<td class="text-center">';
                                    html += '<button type="button" class="btn btn-danger btn-sm delete-button mt-2" data-bs-toggle="modal" data-nim="' + data.NIM + '" data-bs-target="#confirmDeleteModal">';
                                    html += '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">';
                                    html += '<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>';
                                    html += '<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>';
                                    html += '</svg>';
                                    html += '</button>';
                                    html += '</td>';
                                    html += '</tr>';
                                });
                            } else {
                                html = '<tr><td colspan="5" class="text-center">No data found</td></tr>';
                            }
                            $('#search-results').html(html);
                        },
                        complete: function() {
                            searchLoading.hide()
                            table.show()
                        }
                    })
                }, 3000)
            })
        });
    </script>

    
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    </body>
</html>