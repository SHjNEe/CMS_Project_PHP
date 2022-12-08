<?php
include "includes/db.php";
include  "includes/header.php";
include "includes/navigation.php";

?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                <?php
                $query = "SELECT * from posts";
                $select_all_post_query = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_all_post_query)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_tags = $row['post_tags'];
                    $post_content = $row['post_content'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];

                ?>





                <!-- First Blog Post -->
                <h2>
                    <a href="#"><? echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><? echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <? echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<? echo $post_image ?>" alt="">
                <hr>
                    <p>
                        <? echo $post_content ?>
                    </p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <?php
                }
                ?>


                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php

            include "includes/sidebar.php";
            ?>

        </div>
        <!-- /.row -->

        <hr>

<?php
include "includes/footer.php";
?>
