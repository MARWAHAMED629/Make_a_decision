<?php
session_start();
include('../inc/db_conn.php');
if (isset($_SESSION['user'])) {

    
    $stmt = $pdo->prepare("SELECT count(*) FROM `draft` WHERE check_draft = ?");
    $stmt->execute([1]);
    $count = $stmt->fetchColumn();

    $_SESSION['count'] = $count;
    

    if (isset($_POST['n_draft'], $_POST['d_draft'], $_POST['about_draft'], $_POST['name_draft'], $_POST['sig_draft'], $_FILES['img_draft'])) {



        $name_draft = $_POST['n_draft'];
        $d_draft = $_POST['d_draft'];
        $about_draft = $_POST['about_draft'];
        $names_in_draft = $_POST['name_draft'];
        $sig_draft = $_POST['sig_draft'];



                if (!empty($name_draft)  && !empty($d_draft) && !empty($about_draft) && !empty($names_in_draft) && !empty($sig_draft)) {

                    if (preg_match("/^[0-9.]*$/i", $_POST['n_draft'])) {


                $stmt = $pdo->prepare('INSERT INTO draft(n_draft,date,about,aforementioned,signature,img_draft) values (?,?,?,?,?,?)');
                $stmt->execute([
                    $name_draft,
                    $d_draft,
                    $about_draft,
                    $names_in_draft,
                    $sig_draft,
                    $_FILES['img_draft']['name']
                ]);



                if ($stmt->rowcount()) {
                    $_SESSION['add_d1'] = "Added successfully";

                }


                $image_temp = $_FILES['img_draft']['tmp_name'];
                $image_name = $_FILES['img_draft']['name'];
                ;
                move_uploaded_file($image_temp, 'C:\xampp\htdocs\draft_project\img\\' . $image_name);

    } else {
        $_SESSION['add_d4'] = "Sorry, the decision number should be made up of Numbers only.";
    }



} else {
    $_SESSION['add_d5'] = "The field cannot be left empty.";
}

            

    

        }





} else {
    header('location: login.php');
    exit;
}


?>

<!-- <a href="http://localhost/draft_project/admin/logout.php">تسجيل الخروج</a>
<a href="http://localhost/draft_project/admin/view_draft.php">القرارات</a>
<a href="http://localhost/draft_project/admin/add_draft.php">إضافة قرار</a>
<a href="http://localhost/draft_project/admin/add_admin.php">إضافة مسؤل جديد</a> -->




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
                    <span class="title"> Make a decision </span>
                </a>
            </li>

            <li>
                <a href="dashboard.php">
                    <span class="icon">
                        <i class="fa-solid fa-gauge"></i>
                    </span>
                    <span class="title">Control Panel</span>
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
                    <span class="title">Log out</span>
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
                    <div class="cardName">Decisions</div>
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
                    <h2>Add decision</h2>
                </div>

                <div>
                    <p class="sucss">
                        <?php

                        if (isset($_SESSION['add_d1'])) {
                            echo $_SESSION['add_d1'];
                        }
                        ?>

                    </p>


                    <p class="err">
                        <?php

                        if (isset($_SESSION['add_d2'])) {
                            echo $_SESSION['add_d2'];
                        }

                        if (isset($_SESSION['add_d3'])) {
                            echo $_SESSION['add_d3'];
                        }

                        if (isset($_SESSION['add_d4'])) {
                            echo $_SESSION['add_d4'];
                        }

                        if (isset($_SESSION['add_d5'])) {
                            echo $_SESSION['add_d5'];
                        }
                        if (isset($_SESSION['add_d6'])) {
                            echo $_SESSION['add_d6'];
                        }
                        if (isset($_SESSION['err_rz22'])) {
                            echo $_SESSION['err_rz22'];
                        }

                        unset($_SESSION['err_rz22'] ,$_SESSION['add_d1'], $_SESSION['add_d2'], $_SESSION['add_d3'], $_SESSION['add_d4'], $_SESSION['add_d5'],$_SESSION['add_d6'])

                            ?>
                    </p>
                </div>

                <!-- content -->

                <!-- <form action="" method="post">

                            <input type="text" name="n_draft" placeholder="رقم القرار"><br><br>

                            <input type="text" name="y_draft" placeholder="سنة القرار"><br><br>
                            <input type="date" name="d_draft" placeholder="تلريخ القرار"><br><br>
                            <input type="text" name="about_draft" placeholder="بشأن"><br><br>
                            <input type="text" name="name_draft" placeholder="المذكورين في القرار"><br><br>
                            <input type="text" name="sig_draft" placeholder="الموقع على القرار"><br><br>

                            <input type="file" name="img_draft"><br><br>

                            <input type="submit" name="submit" value="إضافة">

                        </form> -->

                <form action="" method="post" enctype="multipart/form-data" autocomplete="off">

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Decision number</label>
                        <input  type="text" class="form-control" placeholder="Decision number"  name="n_draft" id="formGroupExampleInput"
                            placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Date of Decision</label>
                        <input type="date" class="form-control" name="d_draft" id="formGroupExampleInput"
                            placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">About</label>
                        <input type="text" class="form-control" name="about_draft" id="formGroupExampleInput"
                            placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Those mentioned in the decision</label>
                        <input type="text" class="form-control" name="name_draft" id="formGroupExampleInput"
                            placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Signatory to the decision</label>
                        <input type="text" class="form-control" name="sig_draft" id="formGroupExampleInput"
                            placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Copy of the decision</label>
                        <input type="file" name="img_draft" enctype="multipart/form-data" class="form-control inp-file">
                    </div>

                    <button class="btn add-draft-btn btn-primary" name="submit" type="submit">Add</button>

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