<?php

$conn = mysqli_connect("localhost", "root","", "placement");
session_start();
if (isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender=$_POST['gender'];
    $course=$_POST['course'];
    $sem=$_POST['sem'];

    if (!$conn){
        die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    else{ 
        $sql = "INSERT INTO `form` (`username`, `email`, `password`, `gender`, `course`, `sem`)VALUES( '$name', '$email', '$password', ' $gender', '$course', '$sem')";
        $result = mysqli_query($conn, $sql);

        if($result){
            $_SESSION['status'] = "Your entry has been submitted successfully!";
        }
        else{
            $_SESSION['status'] = "entry ws not submitted successfully!";
        }
    }
    if(isset($_SESSION['status']))
    {
        ?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <?= $_SESSION['status']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php 
        unset($_SESSION['status']);
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <title>form</title>
    <Style>
    .center {
        border: 2px solid rgb(15, 233, 230);
        border-radius: 5px;
        width: 40%;
        padding: 20px;
    }
    </Style>
</head>

<body class="m-5 text-light bg-dark">
    <div class="container center" style="align-items:center;">
        <h2 class="mx-auto m-4 mb-4" style="text-align:center;">Registration Form</h2>
        <form class="w-100 " action="form.php" method="POST">
            <div class="form-group my-2">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" name="name" class="form-control" id="l1" placeholder="Enter email" require>
            </div>
            <div class="form-group my-2">
                <label for="examplel1">Email address</label>
                <input type="email" name="email" type="email" class="form-control" placeholder="Enter email" id="ail1"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group my-2">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="ssword1" placeholder="Password">
            </div>
            <div class="form-group my-2">
                <label for="exampleInputPassword1">Gender : </label>

                <input class="form-check-input" type="radio" name="gender" value="Male" id="exampleRadios1">
                <label class="form-check-label" for="exampleRadios1">Male</label>

                <input class="form-check-input" type="radio" name="gender" value="Female" id="exampleRadios2">
                <label class="form-check-label" for="exampleRadios2">Female</label>
            </div>
            <div class="form-group my-2" name="courses">
                <label for="exampleInputPassword1">Course : </label>
                <input class="form-check-input" name="course" type="checkbox" value="BCA" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">BCA</label>

                <input class="form-check-input" name="course" type="checkbox" value="BBA" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">BBA</label>

                <input class="form-check-input" name="course" type="checkbox" value="MCA" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">MCA</label>

                <input class="form-check-input" name="course" type="checkbox" value="MBA" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">MBA</label>

            </div>
            <div class="form-group my-2">
                <label for="exampleFormControlSelect1">Mca Sem</label>
                <select class="form-control" name="sem" id="exampleFormControlSelect1">
                    <option value="" selected hidden>selected</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <button type="submit" name="submit" value="submit" class="btn btn-primary my-2">Submit</button>
            <button type="submit" name="show" value="show" class="btn btn-primary my-2" >show</button>
        </form>


    </div>
</body>

</html>
<?php
$conn = mysqli_connect("localhost", "root","", "placement");
if(array_key_exists('show', $_POST)) {
    show();
}

function show() {
    $conn = mysqli_connect("localhost", "root","", "placement");
    echo "This is Button1 that is selected";
    if (!$conn){
        die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    else{ 
        $sql = "SELECT userid, username, email, gender, course, sem FROM form";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num> 0)
        {
            while($row = mysqli_fetch_assoc($result)){
                echo "name: " . $row["username"]. " email " . $row["email"]." ". $row["gender"]. " ". $row["course"]. " ". $row["sem"];
                echo "<br>";
            }
        }
    }
}
  
$conn->close();
?>