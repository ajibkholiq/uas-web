<html>

<head>
    <title>menu</title>
    <style>
        a{text-decoration: none;
            font-size: 1.1rem;
            color:white;
            margin-left: 30px;
            text-transform: lowercase;
            
        }

        a:hover{
            color :black;
            transform: scale(1);
            text-transform: uppercase;
        }
    </style>
</head>
<body bgcolor="gray" style="font-size: larger;">
    <h2> <center>MENU </center> </h2>

    <?php
    if (isset($_POST['login'])){
        $user = $_POST['user'];
        $pw =$_POST['pwd'];

        if($user== "ajib19" && $pw =="190802"){
             ?>
            <a href="crud.php?aksi=tampil&tabel=daerah" target ="isi">data daerah</a>
            <br><br>
            <a href="crud.php?aksi=tampil&tabel=penyebab" target ="isi">data penyebab</a>
            <br><br>
            <a href="crud.php?aksi=tampil&tabel=kemacetan" target ="isi">laporan kemacetan</a>
            <br><br>
            <a href="profil.html" target ="isi">profil admin</a>
            <br><br>
            <a href="menu.php">logout</a>

            <?php   
            }
        else{
            ?>
            <a href="crud.php?aksi=view&tabel=view" target ="isi">laporan kemacetan</a>
            <br><br>
            <a href="crud.php?aksi=tambah&tabel=kemacetan" target ="isi">laporkan kemacetan</a>
            <br><br>
            <a href="profil.html" target ="isi">profil admin</a>
            <br><br>
            <a href="login.php">login admin</a><?php }}
    else{ 
        ?>
        <a href="crud.php?aksi=tampil&tabel=view" target ="isi">laporan kemacetan</a>
        <br><br>
        <a href="crud.php?aksi=tambah&tabel=kemacetan" target ="isi">laporkan kemacetan</a>
        <br><br>
        <a href="profil.html" target ="isi">profil admin</a>
        <br><br>
        <a href="login.php">Login Admin</a><?php
        }
        ?>
</body>
</html>