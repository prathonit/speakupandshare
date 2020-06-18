<nav class="navbar navbar-ct-danger navbar-fixed-top" role="navigation-demo" id="register-navbar">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">SpeakUp&Share</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation-example-2">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="btn btn-primary" data-toggle="modal" data-target="#apost"><i
                            class="fa fa-plus-square"></i>Post</a>
                </li>
                <?php 
                    if ($_SESSION['user_email'] == ADMIN) {
                        echo "<li>
                        <a class='btn btn-primary btn-fill' data-toggle='modal' data-target='#adminapost'><i class='fa fa-plus-square'></i>Admin Post</a> 
                        </li>";
                    }
                    ?>
                <li>
                    <a href="profile.php" class="btn btn-simple"><i class="fa fa-user"></i>Profile</a>
                </li>
                <li>
                    <a href="logout.php" class="btn btn-simple"><i class="fa fa-power-off"></i> Logout</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-->
</nav>
<!-- MODALS HERE  -->
<!-- POST MODAL BEGINS -->
<div class="modal fade" id="apost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">How are you feeling ? </h4>
            </div>
            <div class="modal-body">
                <form class="register-form">
                    <label>Write something : </label>
                    <textarea id="npost" class="form-control" placeholder="Speak Up & Share" rows="10"
                        required></textarea>
                </form>
            </div>
            <div class="modal-footer">
                <div class="left-side">
                    <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Never
                        mind</button>
                </div>
                <div class="divider"></div>
                <div class="right-side">
                    <button class="btn btn-danger btn-simple" onclick="addPost()">Post</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function addPost() {
        var user_email = "<?php echo $_SESSION['user_email']; ?>";
        var post_text = document.getElementById('npost').value;
        xhttps = new XMLHttpRequest();
        xhttps.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                $('#apost').modal('toggle');
                document.getElementById('npost').value = "";
                location.reload();
            }
        }
        xhttps.open("GET", "lib/ajaxify/add_post.php?user_email=" + user_email + "&post_text=" + post_text);
        xhttps.send();
    }
</script>
<!-- POST MODAL ENDS  -->
<!-- ADMIN POST MODAL BEGINS -->
<div class="modal fade" id="adminapost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Admin Posts </h4>
            </div>
            <div class="modal-body">
                <form class="register-form">
                    <div class="form-group">
                        <label>Category<font color="red">*</font></label>
                        <select name="gender" class="form-control" id="admin_post_c">
                            <option value="0">Feelings</option>
                            <option value="1">Articles</option>
                            <option value="2">Educational</option>
                            <option value="3">Physical Well Being</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Write something : </label>
                        <textarea id="admin_post_text" class="form-control" placeholder="Speak Up & Share" rows="10"
                            required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="left-side">
                    <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Never
                        mind</button>
                </div>
                <div class="divider"></div>
                <div class="right-side">
                    <button class="btn btn-danger btn-simple" onclick="addAdminPost()">Post</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function addAdminPost() {
        var admin_post_text = document.getElementById('admin_post_text').value;
        var admin_post_c = document.getElementById('admin_post_c').value;
        xhttps = new XMLHttpRequest();
        xhttps.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4) {
                $('#adminapost').modal('toggle');
                document.getElementById('adminapost').value = "";
                location.reload();
            }
        }
        xhttps.open("GET", "lib/ajaxify/add_admin_post.php?admin_post_c=" + admin_post_c +'&admin_post_text=' + admin_post_text);
        xhttps.send();
    }
</script>
<!-- ADMIN POST MODAL ENDS  -->
<!-- MODALS HERE  -->