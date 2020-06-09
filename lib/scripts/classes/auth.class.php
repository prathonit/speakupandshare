<?php
    class Auth {
        /* VERIFIES USER AND STARTS SESSION */
        public function loginUser($user_email, $user_password) {
            $database = new Db;
            $handle = $database->handle;
            $query = "SELECT * FROM users WHERE user_email = '{$user_email}'";
            $result = $handle->query($query);
            $handle->close();
            if ($result->num_rows == 1) {
                $row = $result->fetch_array(MYSQLI_ASSOC);
                if (checkPassword($user_password, $row['password'])) {
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return 0;
            }
        }
        /* REGISTERS THE USER */
        public function registerUser($user_name, $user_email, $user_password, $pic, $bio) {
            $database = new Db;
            $handle = $database->handle;
            $password_hash = hashPassword($user_password);
            $query = "INSERT INTO users (user_email, user_name, password, pic, bio) VALUES ('{$user_email}', '{$user_name}', '{$password_hash}', '{$pic}', '{$bio}')";
            if ($handle->query($query)) {
                $handle->close();
                return 1;
            } else {
                $handle->close();
                return 0;
            }

        }
        /* PASSWORD CHANGE */
        public function changePassword($user_email, $current_password, $new_password) {
            $database = new Db;
            $handle = $database->handle;
            $query = "SELECT * FROM users WHERE user_email = '{$user_email}'";
            $result = $handle->query($query);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if (checkPassword($current_password, $row['password'])) {
                $new_hash = hashPassword($new_password);
                $query = "UPDATE users SET password = '{$new_hash}' WHERE user_email = '{$user_email}'";
                if ($handle->query($query)) {
                    $handle->close();
                    return 1;
                } else {
                    $handle->close();
                    return 0;
                }
            }
        }
        /* UPDATING PROFILE BIO */
        public function updateBio($user_email, $bio) {
            $database = new Db;
            $handle = $database->handle;
            $query = "UPDATE users SET bio = '{$bio}' WHERE user_email = '{$user_email}'";
            if ($handle->query($query)) {
                $handle->close();
                return 1;
            } else {
                $handle->close();
                return 0;
            }
        }
    }
?>