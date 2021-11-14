<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">

            <!-- input-group -->
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
            <!-- /.input-group -->

        </form>
    </div>
    <!-- /.Blog Search Well -->

    <!-- Blog Login Well -->
    <div class="well">
        <h4>Login</h4>
        <form action="includes/login.php" method="post">

            <!-- form-group -->
            <div class="form-group">
                <!-- <label for="username">Username</label> -->
                <input name="username" type="text" class="form-control"
                    placeholder="Enter Username">
            </div>
            <!-- /.form-group -->

            <!-- form-group -->
            <div class="input-group">
                <!-- <label for="password">Password</label> -->
                <input name="password" type="password" class="form-control"
                    placeholder="Enter Password">
                <span class="input-group-btn">
                    <button name="login" class="btn btn-primary" type="submit">
                        Login
                    </button>
                </span>
            </div>
            <!-- /.form-group -->

            
            
            

        </form>
    </div>
    <!-- /.Blog Login Well-->

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>

        <?php
        $cat_query = "SELECT * FROM categories";
        $cat_query_select_all = mysqli_query($connection, $cat_query);
        
        $count = mysqli_num_rows($cat_query_select_all);

        $col_count_one = 0;
        $col_count_two = 0;

        if ($count % 2 === 0) {
            $col_count_one = $count / 2;
            $col_count_two = $count / 2;
        } else {
            $col_count_one = ((($count - 1) / 2) + 1);
            $col_count_two = (($count - 1) / 2);
        }
        ?>

        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php
                    $count = 0;
                    while ($count < $col_count_one) {
                        $row = mysqli_fetch_assoc($cat_query_select_all);
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        echo "<li><a href='category.php?category={$cat_id}'>{$cat_title}</a></li>";
                        ++$count;
                    }
                    ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php
                    $count = 0;
                    while ($count < $col_count_two) {
                        $row = mysqli_fetch_assoc($cat_query_select_all);
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        echo "<li><a href='category.php?category={$cat_id}'>{$cat_title}</a></li>";
                        ++$count;
                    }
                    ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.well -->

    <!-- Side Widget Well -->
    <?php include "includes/widget.php"; ?>
    <!-- /.Side Widget Well -->

</div>