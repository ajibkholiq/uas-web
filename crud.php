<!DOCTYPE html>
<html>
    <head>
        <title>C</title>
        <link rel="stylesheet" href="style.css"></head>
    <body>
        <?php
        // --- koneksi ke database
        $koneksi = mysqli_connect("localhost","root","","kemacetan") ;
        // --- Fngsi tambah data (Create)
        function tambah($koneksi){
            if ($_GET['tabel']=="daerah"){
                if (isset($_POST['simpan'])){
                $id = $_POST['id'];
                $nama = $_POST['nama'];
                $kab = $_POST['kabupaten'];
                

                if(!empty($id) &&!empty($nama) && !empty($kab)){
                $sql = "INSERT INTO daerah
                VALUES('$id','$nama','$kab')";
                $simpan = mysqli_query($koneksi, $sql);
                if($simpan && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'tambah'){
                header('location: crud.php?aksi=tampil&tabel=daerah');
                }
                }
                } else {
                $pesan = "Tidak dapat menyimpan, data belum lengkap!";
                }
                }
                ?>
                <div class="alas">
                <h2>Tambah data daerah </h2>
                <table class="tampil">
                <form action="" method="POST">
                <tr><td><label>Id daerah</td><td><input type="text" name="id" /></label></td></tr>

                <tr><td><label>Nama daerah</td><td><input type="text" name="nama"
                /></label></td></tr>
                <tr><td><label>kabupaten </td><td><input type="text" name="kabupaten" />
                </label></td></tr>
                <tr><td><label>
                </td><td><input type="submit" name="simpan" value="Simpan"/>
                <input type="reset" name="reset" value="Besihkan"/>
                </label>
                </td></tr>
                <p><?php echo isset($pesan) ? $pesan : "" ?></p>
                </form>
                </table>
                </div>
                <?php
                }
            if ($_GET['tabel']=="penyebab"){
                if (isset($_POST['simpan'])){
                $id = $_POST['id'];
                $nama = $_POST['nama'];
                
                
                if(!empty($id) &&!empty($nama)){
                $sql = "INSERT INTO penyebab VALUES('$id','$nama')";
                $simpan = mysqli_query($koneksi, $sql);
                if($simpan && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'tambah'){
                header('location: crud.php?aksi=tampil&tabel=penyebab');
                }
                }
                } else {
                $pesan = "Tidak dapat menyimpan, data belum lengkap!";
                }
                }
                ?>
                <div class="alas">
                <h2>Tambah Data Penyebab </h2>
                <table class="tampil">
                <form action="" method="POST">
                <tr><td><label>Id Penyebab</td><td><input type="text" name="id" /></label></td></tr>
            
                <tr><td><label>Nama Penyebab</td><td><input type="text" name="nama"/></label></td></tr>
                <tr><td><label>
                </td><td><input type="submit" name="simpan" value="Simpan"/>
                <input type="reset" name="reset" value="Besihkan"/>
                </label>
                </td></tr>
                <p><?php echo isset($pesan) ? $pesan : "" ?></p>
                </form>
                </table>
                </div>
                <?php
                }
            if ($_GET['tabel']=="kemacetan"){
            if (isset($_POST['simpan'])){
                $id = $_POST['id_d'];
                $panjang = $_POST['panjang'];
                $lama= $_POST['lama'];
                $idp= $_POST['id_pyb'];
                if(!empty($id) &&!empty($panjang)&&!empty($lama)&&!empty($id)){
                    $sql = "INSERT INTO `kemacetan` (`id_daerah`, `panjang`, `lama`, `tanggal`, `id_penyebab`) VALUES ('$id', '$panjang', '$lama', now() , '$idp')";
                    $simpan = mysqli_query($koneksi, $sql);
                    if($simpan && isset($_GET['aksi'])){
                    if($_GET['aksi'] == 'tambah'){
                    header('location: crud.php?aksi=tampil&tabel=view');
                        }
                    }
                    } else {
                    $pesan = "Tidak dapat menyimpan, data belum lengkap!";
                    }
                    }
                ?>
                <div class="alas">
                <h2>lapor kemacetan </h2>
                <table class="tampil">
                <form action="" method="POST">
                <tr><td><label>Id daerah</td><td><select name="id_d">
                <?php 
                    $sql = "SELECT * FROM daerah";
                    $query = mysqli_query($koneksi, $sql);
                    while($data = mysqli_fetch_array($query)){?>
                        <option value="<?php echo $data['id'] ?>"><?php echo $data['nama'] ?></option>
                    <?php } ?>
                    </select></label></td></tr>
                    <tr><td><label>panjang kemacetan</td><td><input type="text" name="panjang" placeholder="Kilo Meter" /></label></td></tr>
                    <tr><td><label>lama kemacetan</td><td><input type="text" name="lama" placeholder="Menit"/></label></td></tr>
                    <tr><td><label>Id daerah</td><td><select name="id_pyb" id="">
                        <?php 
                        $sql = "SELECT * FROM penyebab";
                        $query = mysqli_query($koneksi, $sql);
                    while($data = mysqli_fetch_array($query)){?>
                        <option value="<?php echo $data['id'] ?>"><?php echo $data['nama'] ?></option>
                    <?php } ?>
                    </select></label></td></tr>

                    <tr><td><label>
                    </td><td><input type="submit" name="simpan" value="Simpan"/>
                    <input type="reset" name="reset" value="Besihkan"/>
                    </label>
                    </td></tr>
                    <p><?php echo isset($pesan) ? $pesan : "" ?></p>
                    </form>
                    </table>
                    </div>
                    <?php
                }

            }


        function tampil_data($koneksi){
            if (isset($_GET['aksi'])){
                if ($_GET['tabel']=="daerah"){
                    $sql = "SELECT * FROM daerah";
                    $query = mysqli_query($koneksi, $sql);
                    echo "<div class='alas'><h2> Data daerah</h2>";
                    echo "<table border='1' cellpadding='10' class='tampil'>";
                    echo "<tr>
                    <th>ID</th>
                    <th>Nama daerah </th>
                    <th>Kabupaten</th>
                    <th>Tindakan</th>
                    </tr>";

                    while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['kabupaten']; ?></td>
                    <td class="act"> 
                    <a href="crud.php?aksi=ubah&tabel=daerah&id=<?php echo $data['id']; ?>&nama=<?php echo
                    $data['nama']; ?>&kabupaten=<?php echo $data['kabupaten']; ?>" >Ubah</a> |
                    <a href="crud.php?aksi=delete&tabel=daerah&id=<?php echo $data['id']; ?>">Hapus</a>
                    </td>
                    </tr>
                    <?php
                    }
                    echo "
                    </table>
                    </div>";
            
                    }
                if ($_GET['tabel']=="penyebab"){
                    $sql = "SELECT * FROM penyebab";
                    $query = mysqli_query($koneksi, $sql);
                    echo "<div class='alas'><h2> Data penyebab</h2>";
                    echo "<table border='1' cellpadding='10' class='tampil'>";
                    echo "<tr>
                    <th>ID</th>
                    <th>penyebab </th>
                    <th>Tindakan</th>
                    </tr>";

                    while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                    <td sty><?php echo $data['id']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td class="act"> 
                    <a href="crud.php?aksi=ubah&tabel=penyebab&id=<?php echo $data['id']; ?>&nama=<?php echo
                    $data['nama']; ?>" >Ubah</a> |
                    <a href="crud.php?aksi=delete&tabel=penyebab&id=<?php echo $data['id']; ?>">Hapus</a>
                    </td>
                    </tr>
                    <?php
                    }
                    echo "</table> 
                    </div>";
                
                    }
                
                if ($_GET['tabel']=="kemacetan"){
                        $sql = "SELECT * FROM kemacetan";
                        $query = mysqli_query($koneksi, $sql);
                        echo "<div class='alas'><h2> Data kemaetan</h2>";
                        echo "<table border='1' cellpadding='10' class='tampil'>";
                        echo "<tr>
                        <th>ID daerah</th>
                        <th>panjang kemacetan </th>
                        <th>lama kemacetan</th>
                        <th>id kemacetan </th>
                        <th>tanggal </th>
                        <th>Tindakan</th>
                        </tr>";

                        while($data = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                        <td ><?php echo $data['id_daerah']; ?></td>
                        <td><?php echo $data['panjang']; ?> KM</td>
                        <td><?php echo $data['lama']; ?> Menit</td>
                        <td><?php echo $data['id_penyebab']; ?></td>
                        <td><?php echo $data['tanggal']; ?></td>
                        <td class="act"> 
                        <a href="crud.php?aksi=delete&tabel=kemacetan&id=<?php echo $data['id_daerah']; ?>&idp=<?php echo $data['id_penyebab']; ?>&tgl=<?php echo $data['tanggal']; ?> &pnjg=<?php echo $data['panjang'];?>&lm=<?php echo $data['lama']; ?>">Hapus</a>
                        </td>
                        </tr>
                        <?php
                        }
                        echo "</table> 
                        </div>";
                    
                        }
                
                if ($_GET['tabel']=="view"){
                        if (isset($_POST['cari'])){
                            $cari =$_POST['date'];
                            $sql = "SELECT * FROM intensitas_kemacetan where tanggal='$cari'";
                            }else{
                                $sql = "SELECT * FROM intensitas_kemacetan where tanggal=(select curdate())";}
                        $query = mysqli_query($koneksi, $sql);
                        $cek = mysqli_fetch_array($query);
                        if(!empty($cek['tanggal'])){
                        echo "<div class='alas'><h2> Data kemacetan</h2>";
                        echo "<form method='POST'>
                        <label for ='date' style='margin-left:30px; margin: bottom 5px;px;font-size:medium; text-transform:uppercase; margin-right:10px'> lihat hari lain </label><input type='date' name='date' placeholder='Tanggal' id='date' style='margin-bottom:20px;'><input class='cari' type='submit' value='--cari--' name='cari'></form>";
                        echo "<table border='1' cellpadding='10' class='tampil'>";
                        echo "<tr>
                        <th>Nama Daerah</th>
                        <th>Panjang Kemacetan </th>
                        <th>Lama Kemacetan</th>
                        <th>Penyebab </th>
                        <th>Tanggal </th>
                        <th>Intensitas</th>

                        </tr>";

                        while($data = mysqli_fetch_array($query)){

                        ?>
                        <tr>
                        <td ><?php echo $data['daerah']; ?></td>
                        <td><?php echo $data['panjang']; ?> KM</td>
                        <td><?php echo $data['lama']; ?> Menit</td>
                        <td><?php echo $data['penyebab']; ?></td>
                        <td><?php echo $data['tanggal']; ?></td>
                        <td><?php echo $data['intensitas']; ?></td>
                        </tr>
                        <?php
                        }
                        echo "</table> <br>
                        <div class='dlink'>
                        <a class='link' href='crud.php?aksi=tambah&tabel=kemacetan' target ='isi'>laporkan kemacetan</a>
                        </div>
                        </div>";
                          }
                          else{
                            echo "<div class='alas'><h2> Data kemacetan</h2>";
                        echo "<form method='POST'>
                        <label for ='date' style='margin-left:30px; margin: bottom 5px;px;font-size:medium; text-transform:uppercase; margin-right:10px'> lihat hari lain </label><input type='date' name='date' placeholder='Tanggal' id='date' style='margin-bottom:20px;'><input class='cari' type='submit' value='--cari--' name='cari'></form>";
                        echo "<table border='1' cellpadding='10' class='tampil'>";
                        echo "<tr>
                        <th>Nama Daerah</th>
                        <th>Panjang Kemacetan </th>
                        <th>Lama Kemacetan</th>
                        <th>Penyebab </th>
                        <th>Tanggal </th>
                        <th>Intensitas</th>

                        </tr>";

                        while($data = mysqli_fetch_array($query)){

                        ?>
                        <tr>
                        <td ><?php echo $data['daerah']; ?></td>
                        <td><?php echo $data['panjang']; ?> KM</td>
                        <td><?php echo $data['lama']; ?> Menit</td>
                        <td><?php echo $data['penyebab']; ?></td>
                        <td><?php echo $data['tanggal']; ?></td>
                        <td><?php echo $data['intensitas']; ?></td>
                        </tr>
                        <?php
                        }
                        echo "</table> <br>";
                        if(!empty($cari)){
                        echo"<h3 style='text-align:center;'> Tidak ada kemacetan pada tanggal $cari </h3>";}
                        else{
                        echo"<h3 style='text-align:center;'> Tidak ada kemacetan pada hari ini </h3>";}

                        
                        echo"<br>
                        <div class='dlink'>
                        <a class='link' href='?aksi=tambah&tabel=kemacetan' target ='isi'>laporkan kemacetan</a>
                        </div>
                        </div>";
                          }
                        }
                    }
                }
        // --- fungsi update
        function update($koneksi){
            // ubah data
            if($_GET['tabel']=='daerah'){
                if(isset($_POST['ubah'])){
                $id = $_POST['id'];
                $nama = $_POST['nama'];
                $kab = $_POST['kabupaten'];

                if(!empty($id) &&!empty($nama) && !empty($kab)){
                // $perubahan = "namaclub='$nama',jmlpem='$jumlah',jmloffi='$jumlahof,alamat='$alamat',pemilik='$pemilik'";
                $sql_update = "UPDATE `daerah` SET `nama` = '$nama', `kabupaten` = '$kab' WHERE `daerah`.`id` = '$id'";
                $update = mysqli_query($koneksi, $sql_update);
                if($update && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'ubah'){
                header('location: crud.php?aksi=tampil&tabel=view');
                }
                }
                } else {
                $pesan = "Data tidak lengkap!";
                }
                }
                // tampilkan form ubah
                if(isset($_GET['id'])){
                ?>

                <hr>
                <div class='alas'>
                <form action="" method="POST">
                <h2>ubah data</h2>
                <table class="ubah">
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"/>
                <tr><td>Nama daerah</td>
                <td><input type="text" name="nama" value="<?php echo $_GET['nama']?>"/> </td></tr>
                <tr> <td> Kabupaten </td><td>
                <input type="text" name="kabupaten" value="<?php echo $_GET['kabupaten']?>"/></td></tr>
                <tr><td></td>
                <td><input type="submit" name="ubah" value="Simpan Perubahan"/></td></tr>
                <p><?php echo isset($pesan) ? $pesan : "" ?></p>

                </table>
                </form>
                </div>
                <?php
                }}
            if($_GET['tabel']=='penyebab'){
                if(isset($_POST['ubah'])){
                $id = $_POST['id'];
                $nama = $_POST['nama'];
            
                if(!empty($id) &&!empty($nama)){
                $sql_update = "UPDATE `penyebab` SET `nama` = '$nama' WHERE `penyebab`.`id` = '$id'";
                $update = mysqli_query($koneksi, $sql_update);
                if($update && isset($_GET['aksi'])){
                if($_GET['aksi'] == 'ubah'){
                header('location: crud.php?aksi=tampil&tabel=view');
                }
                }
                } else {
                $pesan = "Data tidak lengkap!";
                }
                }
                // tampilkan form ubah
                if(isset($_GET['id'])){
                ?>
            
                <hr>
                <div class='alas'>
                <form action="" method="POST">
                    <h2>ubah data</h2>
                <table class="ubah">
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"/>
                <tr><td>Penyebab</td>
                <td><input type="text" name="nama" value="<?php echo $_GET['nama']?>"/> </td></tr>
                <tr><td></td>
                <td><input type="submit" name="ubah" value="Simpan Perubahan"/></td></tr>
                <p><?php echo isset($pesan) ? $pesan : "" ?></p>
            
                </table>
                </form>
                </div>
                <?php
                }}
        
            }

        // --- Fungsi Delete
        function delete($koneksi){
            if(isset($_GET['id']) && isset($_GET['aksi'])){
                if($_GET['tabel']=='daerah'){
                    $id = $_GET['id'];
                    $sql_hapus = "DELETE FROM daerah WHERE id='$id'";
                    $hapus = mysqli_query($koneksi, $sql_hapus);
                
                    if($hapus){
                    if($_GET['aksi'] == 'delete'){
                    header('location: crud.php?aksi=tampil&tabel=daerah');
                    }
                    }}
                if($_GET['tabel']=='penyebab'){
                    $id = $_GET['id'];
                    $sql_hapus = "DELETE FROM penyebab WHERE id='$id'";
                    $hapus = mysqli_query($koneksi, $sql_hapus);
                
                    if($hapus){
                    if($_GET['aksi'] == 'delete'){
                    header('location: crud.php?aksi=tampil&tabel=penyebab');
                    }
                    }}
                if($_GET['tabel']=='kemacetan'){
                    $id = $_GET['id'];
                    $idp=$_GET['idp'];
                    $tgl=$_GET['tgl'];
                    $pnjg =$_GET['pnjg'];
                    $lm=$_GET['lm'];
                    $sql_hapus = "DELETE FROM kemacetan WHERE id_daerah='$id' and id_penyebab='$idp' and tanggal='$tgl' and panjang='$pnjg' and lama='$lm'";
                    $hapus = mysqli_query($koneksi, $sql_hapus);
                
                    if($hapus){
                    if($_GET['aksi'] == 'delete'){
                    header('location: crud.php?aksi=tampil&tabel=kemacetan');
                    }
                    }}
                }
        }
        // --- Program Utama
        if (isset($_GET['aksi'])){

            if($_GET['aksi']=="tambah"){
                tambah($koneksi);
            }
            if($_GET['aksi']=="tampil"){
                tambah($koneksi);
                tampil_data($koneksi);
                // if($_GET['tabel']=='kemacetan'){
                //     tambah($koneksi);
                //     tampil_data($koneksi);
                // }
                // else{
                //     tampil_data($koneksi);}

            }
            if($_GET['aksi']=="ubah"){
                update($koneksi);
            }
            if($_GET['aksi']=="delete"){
                delete($koneksi);
            }
            }
    
        ?></body></html>