<?php 
    // create a connection to the database
    include 'config/db_connect.php';

    // collect data from sign-up form and store in the db. 
    if(isset($_POST['first_name'])){
    $first_name = mysqli_escape_string($connect,$_POST['first_name']);
    }
    
    if(isset($_POST['last_name'])){
    $last_name = mysqli_escape_string($connect,$_POST['last_name']);
    }

    if(isset($_POST['dob'])){
    $date_of_birth = $_POST['dob'];
    }

    if(isset($_POST['mobile_number'])){
    $mobile_number = mysqli_escape_string($connect,$_POST['mobile_number']);
    }

    if(isset($_POST['id_number'])){
    $id_number = mysqli_escape_string($connect,$_POST['id_number']);
    }

    if(isset($_POST['email'])){
    $email = mysqli_escape_string($connect,$_POST['email']); 
    }

    if(isset($_POST['password'])){
    $password = mysqli_escape_string($connect,$_POST['password']); 
    }

    if(isset($_POST['gender'])){
    $gender = mysqli_escape_string($connect,$_POST['gender']); 
    }

    if(isset($_POST['street'])){
    $street = mysqli_escape_string($connect,$_POST['street']);
    }
    
    if(isset($_POST['city'])){
    $city = mysqli_escape_string($connect,$_POST['city']);
    }
    
    if(isset($_POST['province'])){
    $province = mysqli_escape_string($connect,$_POST['province']);
    }
    
    if(isset($_POST['country'])){
    $country = mysqli_escape_string($connect,$_POST['country']);
    }
    
    if(isset($_POST['zip_code'])){
    $zip_code = mysqli_escape_string($connect,$_POST['zip_code']);
    }

    
    // insert the collected data into the database
    $query = "INSERT INTO user_credentials(first_name,last_name,mobile_number,id_number,email,passwrd,gender,street,city,province,country,zip_code,dob) 
    VALUES ('$first_name','$last_name','$mobile_number','$id_number','$email','$password','$gender','$street','$city','$province','$country','$zip_code','$date_of_birth')";

    //Execute the query
    mysqli_query($connect, $query);

    // notify user
    if (mysqli_affected_rows($connect) > 0) {
    	echo "<p>You have signed up successfully</p>";
    	echo '<a href="index.html" class="main-button">Go Back</a>';
    } else {
    	echo "Sign up was not successful<br />";
    	echo mysqli_error ($connect);
    }