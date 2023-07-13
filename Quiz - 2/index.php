<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Offerta</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>
    <body>

    <nav class="navbar navbar-expand-lg bg-danger navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="font-size:24px; font-weight:bold; letter-spacing:3px;">OFERTA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
        </div>
    </nav>


    <div class="container d-flex justify-content-center align-items-center mt-5">
        <div class="card" style="width: 50rem;">
            <div class="card-body">
                <h5 class="card-title text-center mt-2" >DATA USER</h5>
                <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#addDataModal">Add Data</button>
                <br><br>
                <table class="table table-hover">
                    <tbody id="search-results">
                    <tr>
                        <th>No</th>
                        <th>Role</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                    <?php
                    include 'koneksi.php';
                        $siswa = mysqli_query($conn,"SELECT * FROM users");
                        $id = 1;
                        Foreach($siswa as $row){
                            $role = "";
                            if($row["role_id"] == 2) {
                                $role = "Admin";
                            } else {
                                $role = "Kasir";
                            }
                    ?>
                        <tr>
                            <th scope="row" style="vertical-align: middle;"><?= $id ?></th>
                            <td style="vertical-align: middle;"><?= $role ?></td>
                            <td style="vertical-align: middle;"><?= $row["name"] ?></td>
                            <td style="vertical-align: middle;"><?= $row["username"] ?></td>
                            <td style="vertical-align: middle;"><?= $row["email"] ?></td>
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
                            <label class="mt-1">Role :</label> <br>
                            <select class="form-select form-select mb-3" aria-label=".form-select example" name="role">
                                <option selected>Select Role</option>
                                <option value="Admin" >Admin</option>
                                <option value="Kasir">Kasir</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="name">Name :</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="username">Username :</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password :</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" value="simpan" class="btn btn-danger">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    </body>
</html>