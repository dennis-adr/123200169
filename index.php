<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="header">
        <h1>Inventaris Barang Kantor Serba Ada</h1>
    </div>
  
    <div class="center">
        <center>
            <h1>Mohon Untuk Login Terlebih Dahulu</h1>
            <form action="ceklogin.php" method="POST">
                <input type="text" name="username" placeholder="Masukkan username" class="input">
                <input type="password" name="password" placeholder="Masukkan password" class="input"><br>
                <input type="submit" name="submit" value="Login" class="button">
            </form>
        </center>
    </div>
</body>

</html>