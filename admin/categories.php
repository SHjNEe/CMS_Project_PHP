<?php
include "admin_header.php";
include  "../includes/db.php";

?>
<div id="wrapper">
    <?
    include "includes/admin_navigation.php";
    global $connection;


    ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small>Author</small>
                    </h1>



                    <div class="col-xs-6">
                        <?
                        if(isset($_POST['submit'])) {
                            $cat_title = $_POST['cat_title'];
                            if($cat_title == "" || empty($cat_title)) {
                                echo "This field shoude not be empty";
                            } else {
                                $query = "INSERT INTO categories (cat_title) ";
                                $query .= "VALUE('{$cat_title}')";
                                $create_category = mysqli_query($connection, $query);
                                if(!$create_category) {
                                    die("QUERY FAILED" . mysqli_error($connection));
                                }
                            }
                        }

                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group ">
                                <input class="btn btn-primary" type="submit" name="submit" value="Create Category">
                            </div>
                        </form>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Edit Category</label>
                                <?
                                    if(isset($_GET['edit']))  {
                                        $cat_id = $_GET['edit'];
                                        $query = "SELECT * from categories WHERE cat_id = {$cat_id} ";
                                        $result = mysqli_query($connection, $query);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $cat_title = $row['cat_title'];
                                            $cat_id = $row['cat_id'];
                                            ?>
                                <input value="<?if(isset($cat_title)) echo $cat_title ?>" class="form-control" type="text" name="cat_title_update">
                            </div>
                            <div class="form-group ">
                                <input class="btn btn-primary" type="submit" name="update_category" value="Create Category">
                            </div>

                                <?
                                        }
                                    }
                                ?>
                            <?php
                                if(isset($_POST['update_category'])) {
                                    $cat_title_update = $_POST['cat_title_update'];
                                    if($cat_title_update == "" || empty($cat_title_update)) {
                                        echo "This field shoude not be empty";
                                    } else {
                                        $query = "UPDATE categories SET cat_title = '{$cat_title_update}' WHERE cat_id = {$cat_id} ";
                                        $create_category = mysqli_query($connection, $query);
                                        if(!$create_category) {
                                            die("QUERY FAILED" . mysqli_error($connection));
                                        } else {
                                            header("Location: categories.php");
                                        }
                                    }
                                }
                            ?>

                            </div>
                        </form>
                    </div>
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                            </tr>
                            </thead>
                            <tbody>

                                <?
                                $query = "SELECT * from categories ";
                                $result = mysqli_query($connection, $query);
                                if(!$result) {
                                    die("QUERY FAILED" . mysqli_error($connection));
                                } else {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                echo "<tr>";
                                    echo "<td> $cat_id </td>";
                                    echo "<td> $cat_title</td>";
                                    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                echo "</tr>";


                                    }
                                }
                                ?>
                                <?php
                                if(isset($_GET['delete'])) {
                                    $cat_id = $_GET['delete'];
                                    $query = "DELETE FROM categories WHERE cat_id = {$cat_id} ";
                                    $delete_query = mysqli_query($connection, $query);
                                    if(!$delete_query) {
                                        echo "QUERY FAILED";
                                    } else {
                                        header("Location: categories.php");
                                    }

                                }
                                ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
</div>

<?php
include "includes/admin_footer.php";
?>
