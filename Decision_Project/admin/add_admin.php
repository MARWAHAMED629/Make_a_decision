
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<?php
session_start();
include("../inc/db_conn.php");

if (isset($_SESSION['user'])) {

    if (isset($_POST['email'], $_POST['user_name'], $_POST['new_password'], $_POST['confirm_password'], $_POST['admin_password'])) {

        if ($_POST['new_password'] == $_POST['confirm_password']) {

            $stmt = $pdo->prepare('SELECT * FROM tb_admin where password = ?');
            $stmt->execute([
                $_POST['admin_password']
            ]);

            if ($stmt->rowcount()) {

                $stmt = $pdo->prepare('INSERT INTO tb_admin(email,user_name,password) VALUES(?,?,?)');
                $stmt->execute([
                    $_POST['email'],
                    $_POST['user_name'],
                    $_POST['new_password']
                ]);

                if ($stmt->rowcount()) {
                    $_SESSION['adm_add1'] = "The administrator has been successfully added";
                }

            } else {
                $_SESSION['adm_add2'] =  "The password of the administrator is incorrect";
            }

        } else {
            $_SESSION['adm_add3'] =  "The password is not identical.";
        }

    }



} else {
    header('location: login.php');
    exit;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>

    <!-- =============== Navigation ================ -->
    <!-- <div class="container"> -->
    <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <!-- <ion-icon name="logo-apple"></ion-icon> -->
                        </span>
                        <span class="title">Make a decision</span>
                    </a>
                </li>

                <li>
                    <a href="dashboard.php">
                        <span class="icon">
                        <i class="fa-solid fa-gauge"></i>
                        </span>
                        <span class="title">Control panel</span>
                    </a>
                </li>

                <li>
                    <a href="view_draft.php">
                        <span class="icon">
                        <i class="fa-solid fa-file-lines"></i>
                        </span>
                        <span class="title">List of decisions</span>
                    </a>
                </li>

                <li>
                    <a href="add_admin.php">
                        <span class="icon">
                        <i class="fa-solid fa-user-tie"></i>
                        </span>
                        <span class="title">Add an administrator</span>
                    </a>
                </li>

                <li>
                    <a href="logout.php">
                        <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sighn out</span>
                    </a>
                </li>
            </ul>
        </div>

    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        </div>

        <!-- ======================= Cards ================== -->
        <div class="cardBox">
                <div class="card">
                    <div>
                    <div class="cardName">The Decisions</div>
                        <div class="numbers"><?php if(isset($_SESSION['count'])) {echo $_SESSION['count']; } ?></div>
                    </div>

                    <div class="iconBx">
                    <i class="fa-solid fa-boxes-packing"></i>
                    </div>
                </div>
            </div>

        <!-- ================ Order Details List ================= -->
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>add an administrator</h2>
                </div>

                <div>

                <p class="sucss">
                        <?php 
                        
                        if(isset($_SESSION['adm_add1'])) {
                            echo $_SESSION['adm_add1'];
                        }
                        ?>

                    </p>


                    <p class="err">
                        <?php 

                        if(isset($_SESSION['adm_add2'])) {
                            echo $_SESSION['adm_add2'];
                        } 

                        if(isset($_SESSION['adm_add3'])) {
                            echo $_SESSION['adm_add3'];
                        } 

                        unset($_SESSION['adm_add1'],$_SESSION['adm_add2'],$_SESSION['adm_add3'])

                        ?>
                    </p>
                </div>

                <!-- content -->


                <!-- <form action="" method="POST">

        <input type="email" name="email" placeholder="email"><br><br>

        <input type="text" name="user_name" placeholder="username"><br><br>

        <input type="password" name="new_password" placeholder="كلمة السر"><br><br>

        <input type="password" name="confirm_password" placeholder="تأكيد كلمة السر"><br><br><br><br><br><br>


        <label for="">يرجى كتابة كلمة السر للمتابعة</label><br><br>
        <input type="password" name="admin_password" placeholder="كلمة السر"><br><br>

        <input type="submit" value="متابعة">

    </form> -->

   

                <form action="" method="POST" autocomplete="off">

                    <div class="mb-3">
                        <label for="formGroupExampleInput"   class="form-label">E-mail address</label>
                        <input type="email" class="form-control" name="email" id="formGroupExampleInput" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">User Name</label>
                        <input type="text" class="form-control" name="user_name" id="formGroupExampleInput"
                            placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Password</label>
                        <input type="password" class="form-control" name="new_password" id="formGroupExampleInput"
                            placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" id="formGroupExampleInput"
                            placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Please type your password to continue</label>
                        <input type="password" class="form-control" name="admin_password" id="formGroupExampleInput"
                            placeholder="">
                    </div>

                    <button class="btn add-draft-btn btn-primary" type="submit"> Continue <span class="material-icons">arrow_forward</span></button>

                </form>

            </div>
        </div>
    </div>
    <!-- </div> -->








    <!-- =========== Scripts =========  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/dashboard.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>