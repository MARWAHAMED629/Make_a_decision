

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
            <form action="result4.php" method="post" autocomplete="off">

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
                    <label for="formGroupExampleInput" class="form-label">Date of decision</label>
                    <input type="text" name="search_date" class="form-control" id="formGroupExampleInput" placeholder=" search for a decision by the date Format 19-09-2023">
                </div>
                <button class="btn srh-btn btn-primary" type="submit">Search</button>
            </form>

        </div>
    </div>
    <!-- ################# END SEARCH VIEW ################# -->








    <?php include("./inc/footer.php"); ?>