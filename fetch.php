<?php
$conn = mysqli_connect("localhost", "root","", "placement");
    if (!$conn){
        die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    else{ 
   
        $sql = "SELECT userid, username, email, gender, course, sem FROM form";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        ?>
<div class="container ">
    <table class="table t1">
        <thead class="thead-dark bg-dark text-light">
            <tr>
                <th scope="col">SNO</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Course</th>
                <th scope="col">Sem</th>
            </tr>
        </thead>
        <?php
        echo "<br>";
        if($num> 0)
        {
            while($row = mysqli_fetch_assoc($result)){
                ?>
        <tbody>
            <tr>
                <th><?php echo $row['userid']; ?></th>
                <td><?php echo $row['username']; ?> </td>
                <td><?php echo $row['email']; ?> </td>
                <td><?php echo $row['gender']; ?> </td>
                <td><?php echo $row['course']; ?> </td>
                <td><?php echo $row['sem']; ?> </td>
            </tr>
        </tbody>
        <?php
            }
        }
    }
    ?> 
    </table>
    </div><?php
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>fetch data</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
                crossorigin="anonymous">
            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
                crossorigin="anonymous">
            </script>
            <style>
            .t1 {
                border: 2px solid rgb(15, 233, 230);
                border-radius: 20px;
            }
            </style>
        </head>
        <body class="">
        </body>
        </html>
?><?php
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
    
$conn->close();
    ?>