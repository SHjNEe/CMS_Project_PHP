<div class="col-md-4">



    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">

        <div class="input-group">
            <input type="text" name="search" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" name="submit" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?
                    $query = "SELECT * from categories LIMIT 2";
                    $result = mysqli_query($connection, $query);
                    if(!$result) {
                        echo "QUERY FAILED";
                    } else {
                        while($row = mysqli_fetch_assoc($result)) {
                            $cat_title = $row['cat_title'];
                            ?>
                            <li><a href="#"><? echo $cat_title?></a>

                            <?

                        }
                    }

                    ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?
                    $query = "SELECT * from categories LIMIT 2 OFFSET 2";
                    $result = mysqli_query($connection, $query);
                    if(!$result) {
                        echo "QUERY FAILED";
                    } else {
                    while($row = mysqli_fetch_assoc($result)) {
                    $cat_title = $row['cat_title'];
                    ?>
                    <li><a href="#"><? echo $cat_title?></a>

                        <?

                        }
                        }

                        ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>