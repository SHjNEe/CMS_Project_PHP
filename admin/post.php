<?php
include "admin_header.php";
include  "../includes/db.php";
?>
<div id="wrapper">
    <?
    include "includes/admin_navigation.php";

    ?>
    <div id="page-wrapper">

        <div class="container-fluid">
            <h1 class="page-header">
                Welcome to admin
                <small>Author</small>
            </h1>
            <!-- Page Heading -->
            <?php
            if(isset($_GET['source'])) {
                $source = $_GET['source'];

            } else {
                $source = '';
            }
            switch ($source) {
                case 'add_post':
                    include "includes/add_post.php";

                    break;
                case '100':
                    echo "NICE 100";
                    break;
                case '200':
                    echo "NICE 200";
                    break;
                default:
                    include "includes/view_all_post.php";
                    break;
            }
            ?>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
</div>

<?php
include "includes/admin_footer.php";
?>
