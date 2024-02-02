<?php
    include 'template.php';

    if ($_SESSION['user']['cred'] != 'penilai') {
        echo '<script type="text/javascript">alert("Anda tidak memiliki akses ke halaman ini");window.location=\'index.php\';</script>';
    };
?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Setting User Siswa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Where your User alive!! </li>
                        </ol>
                        <button type="button" class="btn btn-info-thanks mb-4 text-white" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%); border: none; width: 250px; height: 50px" data-bs-toggle="modal" data-bs-target="#addUser">
                            Add New User Siswa
                        </button>

                        <?php if(isset($_GET['delete_success_siswa'])){?>
                            <div class="alert alert-success">
                                <strong>Sukses! </strong>User siswa berhasil di hapus.
                                <a href="user.php" class="close" data-dismiss="alert" aria-label="close">&times; </a>
                            </div>
                        <?php }?> 

                        <div class="card mb-4">
                            <div class="card-header" style="color: #ffff;">
                                <i class="fas fa-table me-1"></i>
                                User Siswa
                            </div>
                            <div class="card-body" style="color: #ffff;">
                                <table id="datatablesSimple" style="color: #ffff;">
                                    <thead>
                                        <tr>
                                            <th>NIS</th>
                                            <th>Username</th>
                                            <th>Nama Lengkap</th>
                                            <th>Jurusan</th>
                                            <th>Kelas</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $sql2 = "SELECT * FROM data_siswa";
                                    
                                    $result = mysqli_query($koneksi,$sql2);
                                    while($row = mysqli_fetch_row($result)){
                                       echo "<tr>";
                                        echo "<td>".$row[0]."</td>";
                                        echo "<td>".$row[1]."</td>";
                                        echo "<td>".$row[2]."</td>";
                                        echo "<td>".strtoupper($row[3])."</td>";
                                        echo "<td>".strtoupper($row[4])."</td>";
                                        echo "<td>";
                                            echo "<form method='post' action='function/delete_user.php'>";
                                            echo "<input type='hidden' value ='".$row[1]."' name = 'username'>";
                                            echo "<input type='hidden' value ='siswa' name = 'cred'>";

                                            echo "<input type='submit' class='btn btn-danger' value='Delete'></input>";
                                            echo "</form>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
    
                   
                                
                    </div>
                </main>

                <?php include 'footer.php'; ?>

<!-- addUser Modal -->
<div class="modal fade" id="addUser">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New User Siswa</h4>
        </div>

        <form method="post" action = "function/adduser_siswa.php" enctype="multipart/form-data">
            <!-- Modal body -->
            <div class="modal-body" data-closable>
            <input type="text" name="npm" class="form-control mt-3" placeholder="NPM" required>
            <input type="text" name="username" class="form-control mt-3" placeholder="Username" required>
            <input type="password" name="password" class="form-control mt-3" placeholder="Password" required>
            <input type="text" name="nama_lengkap" class="form-control mt-3" placeholder="Nama Lengkap" required>
            <h6 style="margin-top: 10px;">Jurusan</h6>
            <select name="prodi" id="" class="form-control mt-3" required>
                <option value="-">-</option>    
                <option value="mipa">MIPA</option>
                <option value="ips">IPS</option>
                <option value="bahasa">Bahasa</option>
            </select>
            <h6 style="margin-top: 10px;">Bidang Minat</h6>
            <select name="bidang_minat" id="" class="form-control mt-3" required>
                <option value="-">-</option>
                <option value="mipa1">MIPA 1</option>
                <option value="mipa2">MIPA 2</option>
                <option value="ips1">IPS 1</option>
                <option value="ips2">IPS 2</option>
                <option value="bahasa1">Bahasa 1</option>
            </select>

            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
            <input type="submit" class="btn btn-success" name="add user" value = "Add"></input>
            <button type="button" class="btn btn-danger" data-bs-target="#addUser" data-bs-toggle="collapse" href="user_siswa.php" data-close>Cancel</button>
            </div>
       </form>
        
      </div>
    </div>
  </div>               