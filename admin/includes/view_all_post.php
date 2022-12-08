<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    <?
    global $connection;
    $query = "SELECT * FROM posts ";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    } else {
        while ($row = mysqli_fetch_assoc(($result))) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_date =  $row['post_date'];


            echo "<tr>";
            echo "<td>{$post_id}</td>";
            echo "<td>{$post_author}</td>";
            echo "<td>{$post_title}</td>";
            echo "<td>{$post_category_id}</td>";
            echo "<td>{$post_status}</td>";
            echo "<td><img class='img-responsive' src='../images/{$post_image}' alt='images'></td>";
            echo "<td>{$post_tags}</td>";
            echo "<td>{$post_comment_count}</td>";
            echo "<td>{$post_date}</td>";
            echo "</tr>";



        }
    }
    ?>
    </tbody>
</table>