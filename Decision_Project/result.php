<?php
session_start();
include("./inc/db_conn.php");



if (isset($_POST['search_num'])) {

                $stmt = $pdo->prepare("SELECT * FROM draft where n_draft =  ? " );
                $stmt->execute([
                    $_POST['search_num']  ,
                ]);
                

    ?>



    <!-- ################# START NAVBAR ################# -->
    <?php include("./inc/navbar.php"); ?>
    <!-- ################# END NAVBAR ################# -->




    <!-- ################# START RESULT ################# -->
    <div class="result-client-table">
        <div class="table-responsive">
        <div class="main-title pt-3 pb-3">
            <h2>View results</h2>
        </div>
        <style>
        .table {
            direction: rtl;
        }
    </style>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Print Decisions </th>
                    <th scope="col">Image of decision</th>
                    <th scope="col">signed by</th>
                    <th scope="col">those mentioned in the decision</th>
                    <th scope="col">About</th>
                    <th scope="col">date of the decision</th>
                    <th scope="col">decision number</th>
                </tr>
            </thead>
            <tbody>

                <?php
                            
            
                if ($stmt->rowCount()) {
                    foreach ($stmt->fetchall() as $v) {
                            
                        ?>

                        <tr>
                        <td>
                                <a class="show-btn" target="blank" href="invoice_book.php?id=<?php echo $v['id']; ?>">Print</a>
                            </td>
                            <td>
                                <a class="show-btn" target="blank" href="http://localhost/draft_project/img/<?php echo $v['img_draft']; ?>">View</a>
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
                        </tr>

                    <?php }

                } else {
                    $_SESSION['err_rz'] = "Sorry the Decisions was not found";
                    header('Location: draft_number.php');
                    
                }
}

?>
        </tbody>
    </table>
    <button class="btn srh-btn btn-primary" type="submit"><a href="view.php">Back</a></button>
        </div>
    </div>
    <!-- ################# END RESULT ################# -->









    <!-- ################# START FOOTER ################# -->
    <?php include("./inc/footer.php"); ?>
    <!-- ################# START FOOTER ################# -->
