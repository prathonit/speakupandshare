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
                        <a class="btn btn-primary" data-toggle="modal" data-target="#apost"><i class="fa fa-plus-square"></i>Post</a>
                    </li>
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
                        <textarea id="npost" class="form-control" placeholder="Speak Up & Share" rows="10" required></textarea>
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
      xhttps.onreadystatechange = function()
      {
        if (this.status == 200 && this.readyState == 4)
        {
          $('#apost').modal('toggle');
          alert(this.responseText);
        }
      }
    xhttps.open("GET","lib/ajaxify/add_post.php?user_email="+user_email+"&post_text="+post_text);
    xhttps.send();
    }
    </script>
    <!-- POST MODAL ENDS  -->
    <!-- MODALS HERE  -->