<?php
    class Post {

        public function addPost($post_user_email, $post_text, $post_c) {
            $database = new Db;
            $handle = $database->handle;
            $post_time = date('d-m-y H:i');
            $query = "INSERT INTO posts (post_user_email, post_text, post_time, post_c) VALUES ('{$post_user_email}', '{$post_text}', '{$post_time}', '{$post_c}')";
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
            $query = "DELETE FROM posts WHERE post_user_email = '{$post_user_email}' AND post_id = '{$post_id}'";
            if ($handle->query($query)) {
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

        public function getUserUpvotes($user_email) {
            $database = new Db;
            $handle = $database->handle;
        
        }
    }
?>