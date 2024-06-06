<?php 
session_start();
include("./inc/db_conn.php");




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>diet center</title>

<!-- WEBSITE ICON -->
<link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- WEBSITE ICON -->
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    
</head>

<style>
@import url("https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap");
    body {
        margin-top: 20px;
        background-color: #eee;
        font-family: "Cairo", sans-serif;
    }
    .card {
        box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: 1rem;
    }
    .edit {
        flex-direction: row-reverse;
    }
</style>

<body>








    <!-- <div class="parent-loading" id="parent-loading">
        <div class="spinner"></div>
    </div> -->
<?php 
$stmt = $pdo->prepare('SELECT * FROM draft WHERE id = ?');
$stmt->execute([
$_GET['id'],
]);
if($stmt->rowcount()) {
foreach($stmt->fetchAll() as $v) {


?>

    <div class="container" id="container-invoice">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="invoice-title">
                            
                            

                            <!-- <div class="text-muted">
                                <p class="mb-1">3184 Spruce Drive Pittsburgh, PA 15201</p>
                                <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i> xyz@987.com</p>
                                <p><i class="uil uil-phone me-1"></i> 012-345-6789</p>
                            </div> -->
                        </div>

                        <div class="row edit">
                            

                            <img src="./img/<?php echo $v['img_draft']?>" alt="" width="100" height="600">

                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="py-2">

                            <div class="table-responsive">
                                
                            </div><!-- end table responsive -->
                            <div class="d-print-none mt-4">
                                <div class="float-end">
                                    <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i>طباعة </a>
                                    <a href="view.php" class="btn btn-primary w-md">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div>

<?php 
}
}
?>






    <!-- <div class="invoice-page-parent">

        <div class="container">
        <div class="table-responsive">
        <div class="logo">
            <img src="./img/logo-black.png" alt="">
        </div>
        <div class="main-title my-5">
        <h1>فاتورة الحجز</h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
        </tbody>
        </table>
        </div>

            </div>



    <div class="container part-two">
    <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
        </tbody>
    </table>
    </div>
    </div>


    </div> -->






    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="./js/main.js"></script> -->
</body>

</html>