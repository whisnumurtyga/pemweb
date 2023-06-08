<?php 
    require_once('koneksi.php');
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
        <style>
            svg {
                color: inherit;
                text-decoration: none;
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
                <button type="button" class="btn btn-danger mb-5 mt-3" data-bs-toggle="modal" data-bs-target="#addDataModal">Add Data</button>
                <table class="table">
                    <tbody>
                    <?php
                    include 'koneksi.php';
                        $siswa = mysqli_query($conn,"SELECT * FROM mahasiswa");
                        $id = 1;
                        Foreach($siswa as $row){
                    ?>
                        <tr>
                            <th scope="row" style="vertical-align: middle;"><?= $id ?></th>
                            <td style="vertical-align: middle;"><?= $row["nama"] ?></td>
                            <td class="justify-content-center">
                                <!-- <a href="update.php?nim=<?= $row['NIM'] ?>"> -->
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#editDataModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </button>
                                <!-- </a> -->
                            </td>
                            <td class="justify-content-center">
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </button>
                                <!-- <a href="delete.php?nim=<?= $row['NIM'] ?>">
                                </a> -->
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="input.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama">NIM :</label>
                            <input type="number" class="form-control" id="nim" name="nim" value="<?= $arrdat['NIM'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama :</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $arrdat['nama'] ?>" >
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat :</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $arrdat['alamat'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="notelp">No Telepon :</label>
                            <input type="number" class="form-control" id="notelp" name="notelp" value="<?= $arrdat['notelp'] ?>">
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

    <!-- Modal Konfirmasi -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure want to delete ?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                <a href="">
                    <button type="button" class="btn btn-danger">Delete</button>
                </a>
            </div>
            </div>
        </div>
    </div>





    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    </body>
</html>