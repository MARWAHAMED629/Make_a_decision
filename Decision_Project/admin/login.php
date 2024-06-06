<?php
session_start();
include("../inc/db_conn.php");

if (isset($_POST['login'], $_POST['pass'])) {
    $login = $_POST['login'];
    $password = $_POST['pass'];

    if (!empty($login) && !empty($password)) {

        $stmt = $pdo->prepare('SELECT * FROM tb_admin WHERE user_name = ? and password = ?');
        $stmt->execute([
            $login,
            $password
        ]);

        if ($stmt->rowcount()) {
            $_SESSION['user'] = $login;
            header('location: dashboard.php');
            exit;

        } else {
            $_SESSION['err_lo1'] = "Incorrect username or password";
        }

    } else {
        $_SESSION['err_lo1'] = " The field cannot be left empty";
    }

} else {
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/forms.css">
</head>

<body>

    <!-- <form action="" method="post">

<input type="text" name="login" value=""  placeholder="usename" ><br><br>

<input type="password" name="pass" placeholder="passwod"><br><br>

<input type="submit" value="submit">

</form> -->


    <div class="login-page-parent">
        <div class="container">
            <form action="" method="post" autocomplete="off">
            <div>
                    <p class="err">
                        <?php 

                        if(isset($_SESSION['err_lo1'])) {
                            echo $_SESSION['err_lo1'];
                        } 

                        if(isset($_SESSION['err_lo2'])) {
                            echo $_SESSION['err_lo2'];
                        } 

                        unset($_SESSION['err_lo1'],$_SESSION['err_lo2'])

                        ?>
                    </p>
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">User Name</label>
                    <input type="text" class="form-control" name="login" value="<?php if (isset($login)) {
                        echo $login;
                    } ?>" id="formGroupExampleInput" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Password</label>
                    <input type="password" class="form-control" name="pass" id="formGroupExampleInput"
                        placeholder="">
                </div>
                <button class="btn srh-btn btn-primary" type="submit">Sign in</button>
            </form>
        </div>
    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>