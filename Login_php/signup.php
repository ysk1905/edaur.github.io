<?php 
    include('connection.php');
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];
    $passwordConfirm = $_POST['confirmPassword'];
    $data = $_POST;

    //to prevent from mysqli injection  
    $firstname = stripcslashes($firstname);  
    $lastname = stripcslashes($lastname);  
    $email = stripcslashes($email);  
    $password = stripcslashes($password);  
    $passwordConfirm = stripcslashes($passwordConfirm);  
    $firstname = mysqli_real_escape_string($con, $firstname); 
    $lastname = mysqli_real_escape_string($con, $lastname);  
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);  
    $passwordConfirm = mysqli_real_escape_string($con, $passwordConfirm);
    

    if ($password !== $passwordConfirm) {
        echo '
            <script>
                alert("Password and Confirm Password should Match.....");
                window.location.href = "../signup.html";
            </script>';  
    }
    else{
        $sql = "INSERT INTO `login`(`username`, `password`, `firstname`, `lastname`) VALUES ('$email','$password','$firstname','$lastname');";
        if(mysqli_query($con, $sql)){
            echo '
                <script>
                    alert("Congratulations! Signed up succesfully. Sign in Now.....");
                    window.location.href = "../login.html";
                </script>'; 
        }
        else {
            echo '
                <script>
                    alert("Something went wrong ....");
                    window.location.href = "../login.html";
                </script>'; 
        }
    }
?>