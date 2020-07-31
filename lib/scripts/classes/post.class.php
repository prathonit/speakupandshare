<?php
    class Post {

        public function addPost($post_user_email, $post_user_name, $post_user_pic,$post_text, $post_c) {
            $database = new Db;
            $handle = $database->handle;
            $post_time = date('d-m-y H:i');
            $query = "INSERT INTO posts (post_user_email, post_user_name, post_user_pic,post_text, post_time, post_c) VALUES ('{$post_user_email}', '{$post_user_name}', '{$post_user_pic}','{$post_text}', '{$post_time}', '{$post_c}')";
            if ($handle->query($query)) {
                $handle->close();
                return 1;
            } else {
                $handle->close();
                return 0;
            }
        }

        public function deletePost($post_user_email, $post_id) {
            $database = new Db;
            $handle = $database->handle;
            $query = "SELECT * FROM posts WHERE post_id = '{$post_id}'";
            $result = $handle->query($query);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if ($row['post_user_email'] == $post_user_email || $post_user_email == ADMIN) {
                $query = "DELETE FROM posts WHERE post_id = '{$post_id}'";
                $handle->query($query);
                $handle->close();
                return 1;
            } else {
                $handle->close();
                return 0;
            }
        }

        public function updateUpvote($user_email, $post_id) {
            $database = new Db;
            $handle = $database->handle;
            $query = "SELECT * FROM posts WHERE post_id = '{$post_id}'";
            $result = $handle->query($query);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $post_upvotes = $row['post_upvotes'];
            $query = "SELECT * FROM upvotes WHERE user_email = '{$user_email}' AND post_id = '{$post_id}'";
            $result = $handle->query($query);
            if ($result->num_rows == 1) {
                $post_upvotes--;
                $query = "DELETE FROM upvotes WHERE user_email = '{$user_email}' AND post_id = '{$post_id}'";
            } else {
                $post_upvotes++;
                $query = "INSERT INTO upvotes (user_email, post_id) VALUES ('{$user_email}', '{$post_id}')";
            }
            $handle->query($query);
            $query = "UPDATE posts SET post_upvotes = '{$post_upvotes}' WHERE post_id = '{$post_id}'";
            $handle->query($query);
            $handle->close();
        }

        public function createPost($post_id, $post_author_img, $post_author_name, $post_author_email, $post_time, $post_text, $post_upvotes, $post_viewer) {
            $database = new Db;
            $handle = $database->handle;
            $query = "SELECT * FROM upvotes WHERE post_id = '{$post_id}' AND user_email = '{$post_viewer}'";
            $result = $handle->query($query);
            if ($result->num_rows == 1) {
                $upvote_class = 'btn btn-fill btn-danger';
            } else {
                $upvote_class = 'btn btn-danger';
            }
            $post_peek = limit_text($post_text, 20);
            $post_read_more = $post_text;
            $post_markup = "
            <div class='card' id='{$post_id}'>
                <img src='{$post_author_img}' alt='AUTHOR PIC' style='width : 100px'>
                <div class='row'>
                    <center>
                    <div class='col-sm-12'>
                    <h5><b>Posted By : {$post_author_name}</b></h5>
                    </div>
                    </center>
                </div>
                <p class='title'>Posted at : {$post_time}</p>
                <span id='peek{$post_id}' class='post_c'>{$post_peek}</span>
                <span id='full{$post_id}' class='post_c' style='display : none'>{$post_read_more}</span>
                <p><button class='{$upvote_class}' id='upvoteBtn{$post_id}' onclick='upvotePost({$post_id})'><i class='fa fa-arrow-up'></i> <span id='upvotes{$post_id}'>{$post_upvotes}</span></button></p>
                <p id='readMore{$post_id}'><button  onclick='readMore({$post_id})'><b style='color : white'>Read more</b></button></p>
        ";
        if ($post_author_email == $post_viewer) {
            $post_markup .= "<p><button class='btn btn-danger btn-fill' id='delete{$post_id}' count='0' onclick='deletePost({$post_id})'><b style='color : white'>Delete Post</b></button></p></div>";
        } else if ($post_viewer == ADMIN) {
            $post_markup .= "<p><button class='btn btn-danger btn-fill' id='delete{$post_id}' count='0' onclick='deletePost({$post_id})'><b style='color : white'>Delete Post</b></button></p></div>";
        } else {
            $post_markup .= "</div>";
        }
        return $post_markup . "<br><hr>";
        }

        public function getPosts($user_email, $offset, $post_c, $user_posts) {
            $database = new Db;
            $handle = $database->handle;
            $query = "SELECT * FROM posts WHERE post_c = '{$post_c}' ORDER BY post_time DESC LIMIT 9 OFFSET " . $offset;
            if ($user_posts == 1) {
                $query = "SELECT * FROM posts WHERE post_c = '{$post_c}' AND post_user_email = '{$user_email}' ORDER BY post_time DESC LIMIT 9 OFFSET " . $offset;
            }
            $result = $handle->query($query);
            $handle->close();
            $txt = "";
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $txt .= $this->createPost($row['post_id'], $row['post_user_pic'], $row['post_user_name'], $row['post_user_email'], $row['post_time'], $row['post_text'], $row['post_upvotes'], $user_email);
            }
            return $txt;
        }
    }
?>