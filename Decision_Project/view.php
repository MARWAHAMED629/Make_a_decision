
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- ################# START NAVBAR ################# -->
    <?php
    session_start();
    include("./inc/navbar.php");
    

?>
    <!-- ################# END NAVBAR ################# -->






    <!-- ################# START SEARCH VIEW ################# -->
    <!-- <form action="" method="post">

        <input type="text" name="search"><br><br>
        <input type="submit" value="بحث">

    </form> -->

    <div class="view-search-parent">
        <div class="container">
            <!-- <form action="result.php" method="post" autocomplete="off">

            <div>
                    <p class="err">
                        <?php 

                        if(isset($_SESSION['err_rz'])) {
                            echo $_SESSION['err_rz'];
                        }
                        if(isset($_SESSION['err_rz2'])) {
                            echo $_SESSION['err_rz2'];
                        }
                        if(isset($_SESSION['err_rz3'])) {
                            echo $_SESSION['err_rz3'];
                        } 
                        if(isset($_SESSION['err_rz0'])) {
                            echo $_SESSION['err_rz0'];
                        }

                        unset($_SESSION['err_rz0'],$_SESSION['err_rz'],$_SESSION['err_rz2'],$_SESSION['err_rz3']);

                        ?>
                    </p>
                </div>


                <div class="mb-4">
                    <label for="formGroupExampleInput" class="form-label">رقم القرار مع السنة</label>
                    <input type="text" name="search_num"  class="form-control" id="formGroupExampleInput" placeholder="2022.232 يجب فصل الرقم والسنة بنقطة بهاذا الشكل">
                </div>
                <div class="mb-4">
                    <label for="formGroupExampleInput" class="form-label">بشأن</label>
                    <input type="text" name="about" class="form-control" id="formGroupExampleInput" placeholder="">
                </div>
                <div class="mb-4">
                    <label for="formGroupExampleInput" class="form-label">المذكورين في القرار</label>
                    <input type="text" name="mentioned" class="form-control" id="formGroupExampleInput" placeholder="">
                </div>
                <div class="mb-4">
                    <label for="formGroupExampleInput" class="form-label">الموقع على القرار</label>
                    <input type="text" name="signature" class="form-control" id="formGroupExampleInput" placeholder="">
                </div>
                <div class="mb-4">
                    <label for="formGroupExampleInput" class="form-label">تاريخ القرار</label>
                    <input type="date" name="search_date" class="form-control" id="formGroupExampleInput" placeholder="">
                </div>
                <button class="btn srh-btn btn-primary" type="submit">بحث</button>
            </form> -->

            

            <div class="searching-by-btns" style="z-index: 99;">
            <a href="draft_date.php"><button type="button" class="btn btn-primary" style="margin-right: 15px; padding: 10px 20px;">Search decision Date</button></a>
            <a href="location_draft.php"><button type="button" class="btn btn-primary" style="margin-right: 15px; padding: 10px 20px;">Search decisions by signature</button></a>
            <a href="draft.php"><button type="button" class="btn btn-primary" style="margin-right: 15px; padding: 10px 20px;">Search for those mentioned in the decision</button></a>
            <a href="about_draft.php"><button type="button" class="btn btn-primary" style="margin-right: 15px; padding: 10px 20px;">Search About decisions</button></a>
            <a href="draft_number.php"><button type="button" class="btn btn-primary" style="margin-right: 15px; padding: 10px 20px;">Search by decision number</button></a>

            </div>

        </div>
    </div>
    <!-- ################# END SEARCH VIEW ################# -->








    <?php include("./inc/footer.php"); ?>