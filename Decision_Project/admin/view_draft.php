<?php
session_start();
include("../inc/db_conn.php");


if (isset($_SESSION['user'])) {


    if (isset($_GET['dl'])) {

        $id = $_GET['dl'];

        $stmt = $pdo->prepare('DELETE  FROM draft WHERE id = ?');
        $stmt->execute([
            $id,
        ]);

        if ($stmt->rowcount()) {
            $_SESSION['del'] = "  The decision has been deleted";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Document</title>
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
                        <span class="title"> Make a Decision</span>
                    </a>
                </li>

                <li>
                    <a href="dashboard.php">
                        <span class="icon">
                        <i class="fa-solid fa-gauge"></i>
                        </span>
                        <span class="title">Control Panel </span>
                    </a>
                </li>

                <li>
                    <a href="view_draft.php">
                        <span class="icon">
                        <i class="fa-solid fa-file-lines"></i>
                        </span>
                        <span class="title"> List of Decision</span>
                    </a>
                </li>

                <li>
                    <a href="add_admin.php">
                        <span class="icon">
                        <i class="fa-solid fa-user-tie"></i>
                        </span>
                        <span class="title"> Add an administrator</span>
                    </a>
                </li>

                <li>
                    <a href="logout.php">
                        <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title"> Sign out</span>
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
                    <div class="cardName">Decision</div>
                        <div class="numbers" ><?php if(isset($_SESSION['count'])) {echo $_SESSION['count']; } ?></div>
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
                    <h2>Decision</h2>
                </div>



                <div>
                    
                    <p class="sucss">
                        <?php
                        if(isset($_SESSION['err_ed1'])){
                            echo $_SESSION['err_ed1'];
                        }

                            if(isset($_SESSION['del'])){
                                echo $_SESSION['del'];
                            }
                            unset($_SESSION['del'],$_SESSION['err_ed1']);
                        ?>
                    </p>
                </div>

                <!-- content -->


                <table class="table">
                    <thead>
                        <tr>
                            <td scope="col"> Copy of decision</td>
                            <td scope="col">signed by</td>
                            <td scope="col">those mentioned in the decision</th>
                            <td scope="col">About</td>
                            <td scope="col"> date of the decision</td>
                            <td scope="col">decision number</td>
                            <td scope="col">Update</td>


                        </tr>
                    </thead>


                    <tbody>


                        <?php








                        if (isset($_SESSION['user'])) {

                            $stmt = $pdo->prepare('SELECT * FROM draft where check_draft = ?');
                            $stmt->execute([
                                1,
                            ]);

                            foreach ($stmt->fetchall() as $v) {
                                ?>
                                <tr>

                                    <td>
                                        <a class="show-btn" target="blank" href="http://localhost/draft_project/img/<?php  echo $v['img_draft'];?>">View</a>
                                    </td>
                                    <td>
                                        <?php echo $v['signature']; ?>
                                    </td>
                                    <td>
                                        <?php echo $v['aforementioned']; ?>
                                    </td>
                                    <td>
                                        <?php echo $v['about']; ?>
                                    </td>
                                    <td>
                                        <?php echo $v['date']; ?>
                                    </td>
                                    <td>
                                        <?php echo $v['n_draft']; ?>
                                    </td>
                                    <td scope="row">
                                        <button class="delete-btn"><a
                                                href="http://localhost/draft_project/admin/view_draft.php?dl=<?php echo $v['id']; ?>">Delete</a></button>
                                        <button class="edit-btn"><a
                                                href="http://localhost/draft_project/admin/edit_draft.php?ed=<?php echo $v['id']; ?>">Update</a></button>

                                    </td>

                                </tr>
                                <tr>

                                <?php } ?>

                            <?php

                        } else {
                            header('location: logout.php');
                        }


                        ?>


                    </tbody>
                </table>



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