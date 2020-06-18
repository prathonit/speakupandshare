<?php 
/* CHECKING IF USER IS LOGGED IN */
include_once 'lib/config.php';
session_start();
if (!isset($_SESSION['user_email'])) {
    header('location:index.php');
}
?>
<!doctype html>
<html lang="en">
<?php
    include_once 'components/home_header.php';
?>

<body>
    <?php include_once 'components/home_navbar.php';?>
    <br><br><br><br><br><br>
    <div class="wrapper">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Feelings</a></li>
                    <li><a href="#articles" data-toggle="tab">Articles</a></li>
                    <li><a href="#edu" data-toggle="tab">Educational</a></li>
                    <li><a href="#phy" data-toggle="tab">Physical well being</a></li>
                </ul>
            </div>
        </div>
        <div id="my-tab-content" class="tab-content text-center">
            <div class="tab-pane active" id="home">
                <!-- POST CARD BEGIN  -->
                <section id="feed0">
                    <?php
                $post = new Post;
                echo $post->getPosts($_SESSION['user_email'], 0, 0, 0);
                ?>
                    <!-- POST CARD END  -->
                </section>
                <button class="btn btn-default" id="id0" count="9" onclick="loadPosts(0, 0)"><i class="fa fa-repeat"></i>
                    Load more posts</button>
            </div>

            <div class="tab-pane" id="articles">
                <!-- POST CARD BEGIN  -->
                <section id="feed1">
                    <?php
                $post = new Post;
                echo $post->getPosts($_SESSION['user_email'], 0, 1, 0);
                ?>
                    <!-- POST CARD END  -->
                </section>
                <button class="btn btn-default" id="id1" count="9" onclick="loadPosts(1, 0)"><i class="fa fa-repeat"></i>
                    Load more posts</button>
            </div>

            <div class="tab-pane" id="edu">
                <!-- POST CARD BEGIN  -->
                <section id="feed2">
                <?php
                $post = new Post;
                echo $post->getPosts($_SESSION['user_email'], 0, 2, 0);
                ?>
                <!-- POST CARD END  -->
                </section>
                <button class="btn btn-default" id="id2" count="9" onclick="loadPosts(2, 0)"><i class="fa fa-repeat"></i> Load more posts</button>
            </div>

            <div class="tab-pane" id="phy">
                <!-- POST CARD BEGIN  -->
                <section id="feed3">
                <?php
                $post = new Post;
                echo $post->getPosts($_SESSION['user_email'], 0, 3, 0);
                ?>
                <!-- POST CARD END  -->
                </section>
                <button class="btn btn-default" id="id3" count="9" onclick="loadPosts(3, 0)"><i class="fa fa-repeat"></i> Load more posts</button>
            </div>
        </div>
    </div>
    <?php include_once 'components/home_footer.php'; ?>

</body>
<?php
include_once 'components/home_footer_scripts.php';
?>

</html>