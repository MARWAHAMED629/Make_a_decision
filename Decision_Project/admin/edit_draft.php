<?php
session_start();
include("../inc/db_conn.php");


if (isset($_SESSION['user'])) {


    if (isset($_GET['ed'])) {

        $stmt = $pdo->prepare('SELECT * FROM draft WHERE id = ?');
        $stmt->execute([
            $_GET['ed'],
        ]);

        if ($stmt->rowcount()) {

            foreach ($stmt->fetchall() as $v) {


                $_SESSION['name_draft'] = $v['n_draft'];
                // $_SESSION['year_draft'] = $v['yare_draft'];
                $_SESSION['d_draft'] = $v['date'];
                $_SESSION['about_draft'] = $v['about'];
                $_SESSION['names_in_draft'] = $v['aforementioned'];
                $_SESSION['sig_draft'] = $v['signature'];
            }

        }
    }

    if (isset($_POST['n_draft'], $_POST['d_draft'], $_POST['about_draft'], $_POST['name_draft'], $_POST['sig_draft'], )) {

        // if (! empty($name_draft) && ! empty($year_draft) && ! empty($d_draft) && ! empty($about_draft) && ! empty($names_in_draft) && ! empty($sig_draft)) {

        // if (preg_match("/^[0-9]*$/i", $_POST['n_draft'])) {

        //     if (preg_match("/^[0-9]*$/i", $_POST['y_draft'])) {


                // if (strlen($_POST['y_draft']) == 4) {



                    $name_draft = $_POST['n_draft'];
                    // $year_draft = $_POST['y_draft'];
                    $d_draft = $_POST['d_draft'];
                    $about_draft = $_POST['about_draft'];
                    $names_in_draft = $_POST['name_draft'];
                    $sig_draft = $_POST['sig_draft'];

                    $stmt = $pdo->prepare(' TE draft SET n_draft = ?  , date = ? , about = ? , aforementioned = ? , signature = ? WHERE id = ? ');
                    $stmt->execute([
                        $name_draft,
                        // $year_draft,
                        $d_draft,
                        $about_draft,
                        $names_in_draft,
                        $sig_draft,
                        $_GET['ed']
                    ]);

                    if ($stmt->rowcount()) {

                        unset($_SESSION['name_draft'],
                            // $_SESSION['year_draft'],
                            $_SESSION['d_draft'],
                            $_SESSION['about_draft'],
                            $_SESSION['names_in_draft'],
                            $_SESSION['sig_draft']);

                        $_SESSION['err_ed1'] = "Successfully modified";
                        header('location: view_draft.php');

                    }


            //     } else {
            //         $_SESSION['add_d2'] = "خطأ في سنة القرار";

            //     }


            // } else {
            //     $_SESSION['add_d3'] = "عذرا يجب ان يكون تاريخ القرار متكون من ارقام فقط";
            // }
        // } else {
        //     $_SESSION['add_d4'] = "عذرا يجب ان يكون رقم القرار متكون من ارقام فقط";
        // }

        // } else {
        //     $_SESSION['add_d5'] = "لايمكن ترك الحقل فارغ";
        // }

    }



} else {
    header('location: ../view.php');
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
                    <span class="title"> Contro Panel</span>
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
                    <div class="numbers">
                        <?php if (isset($_SESSION['count'])) {
                            echo $_SESSION['count'];
                        } ?>
                    </div>
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
                    <h2>modify Decision</h2>
                </div>


                <div>
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

                        unset($_SESSION['add_d1'], $_SESSION['add_d2'], $_SESSION['add_d3'], $_SESSION['add_d4'], $_SESSION['add_d5'])

                            ?>
                    </p>
                </div>



                <!-- content -->

                <form action="" autocomplete="off" method="post" enctype="multipart/form-data">






                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Decision number</label>
                        <input type="text" class="form-control" name="n_draft" value="<?php if (isset($_SESSION['name_draft'])) {
                            echo $_SESSION['name_draft'];
                        } ?>" id="formGroupExampleInput" placeholder="">
                    </div>



                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Decision Date</label>
                        <input type="date" class="form-control" name="d_draft" value="<?php if (isset($_SESSION['d_draft'])) {
                            echo $_SESSION['d_draft'];
                        } ?>" id="formGroupExampleInput" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">About</label>
                        <input type="text" class="form-control" name="about_draft" value="<?php if (isset($_SESSION['about_draft'])) {
                            echo $_SESSION['about_draft'];
                        } ?>" id="formGroupExampleInput" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Those mentioned in the Decision</label>
                        <input type="text" class="form-control" name="name_draft" value="<?php if (isset($_SESSION['names_in_draft'])) {
                            echo $_SESSION['names_in_draft'];
                        } ?>" id="formGroupExampleInput" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Search for decisions by signature"</label>
                        <input type="text" class="form-control" name="sig_draft" value="<?php if (isset($_SESSION['sig_draft'])) {
                            echo $_SESSION['sig_draft'];
                        } ?>" id="formGroupExampleInput" placeholder="">
                    </div>

                    <button class="btn add-draft-btn btn-primary" name="submit" type="submit">Update</button>

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