<?php      
    include('connection.php');  
    $username = $_POST['inputEmail'];  
    $password = $_POST['inputPassword'];  

        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  

        $sql = "select * from login where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
    
        if($count == 1){  
            echo '
                <script>
                    alert("Login Successful!!");
                    window.location.href = "../index.html";
                </script>';
        }  
        else{  
            echo '
                <script>
                    alert(" Login failed. Invalid username or password.");
                    window.location.href = "../login.html";
                </script>';
        }     
?>  