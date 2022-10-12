<?php
    require 'Database.php';

    class User extends Database{
        public function store($request){
            $first_name = $request['first_name'];
            $last_name = $request['last_name'];
            $username = $request['username'];
            $password = $request['password'];

            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql ="INSERT INTO users(first_name, last_name, username, password) VALUES ('$first_name', '$last_name', '$username', '$password')";

            if($this->conn->query($sql)){
                header('location: ../views');
                exit;
            }else{
                die("Error adding user ".$this->conn->error);
            }
        }

        public function login($request){
            $username = $request['username'];
            $password = $request['password'];

            // create a query string
            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = $this->conn->query($sql);

            //check for the username
            if($result->num_rows == 1){
                $user = $result->fetch_assoc();
                if(password_verify($password, $user['password'])){
                    //create session variable
                    session_start();
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['full_name'] = $user['first_name']." ".$user['last_name'];
                    
                    header('Location: ../Views/dashboard.php');
                    exit;
                }else{
                    echo "Password is incorrect.";
                }
            }else{
                echo "Username Not Found.";
            }
        }

        public function logout(){
            session_start();
            session_unset();
            session_destroy();

            header('location: ../Views');
            exit;
        }

        public function getAllUsers(){
            $sql = "SELECT id, first_name, last_name, username, photo FROM users";

            if($result = $this->conn->query($sql)){
                return $result;
            }else{
                die("Error in retrieving user details ".$this->conn->error);
            }
        }

        public function getUser(){
            session_start();
            $id = $_SESSION['id'];

            $sql = "SELECT first_name, last_name, username, photo FROM users WHERE id = '$id'";

            if($result = $this->conn->query($sql)){
                return $result->fetch_assoc();
            }else{
                die("Error retrieving user info ".$this->conn->error);
            }
        }

        public function update($request, $files){
            session_start();
            $id = $_SESSION['id'];
            $first_name = $request['first_name'];
            $last_name = $request['last_name'];
            $username = $request['username'];
            $photo = $files['photo']['name'];
            $tmp_photo = $files['photo']['tmp_name'];

            $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username = '$username' WHERE id = '$id'";

            if($result = $this->conn->query($sql)){
                $_SESSION['username'] = $username;
                $_SESSION['full_name'] = "$first_name $last_name";

                if($photo){
                    $sql = "UPDATE users SET photo = '$photo' WHERE id = '$id'";
                    //create a destination path where the photo is tp be saved
                    $destination = "../Assets/images/$photo";
                    //this will save the image to the detabase
                    if($this->conn->query($sql)){
                        if(move_uploaded_file($tmp_photo, $destination)){
                            header('location: ../Views/dashboard.php');
                            exit;
                        }else{
                            die("Error in moving photo");
                        }
                    }else{
                        die("Error uploading image to the database ".$this->conn->error);
                    }
                }
                header('location: ../Views/dashboard.php');
                exit;
            }else{
                die("Error updating the user details. ".$this->conn->error );
            }

        }

        public function delete(){
            session_start();
            $id = $_SESSION['id'];

            //query starting
            $sql = "DELETE FROM users WHERE id='$id'";

            //execute the query
            if($this->conn->query($sql)){
                $this->logout();
            }else{
                die("Error in deleting your account ".$this->conn->error);
            }
        }
    }


?>