<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<?php
require_once "db.php";
    $id = $_GET['id'];
    $get = mysqli_query($conn, "SELECT * FROM all_recipe where id = " .$id );
    while($row = mysqli_fetch_assoc($get)) {
       
?>
<body>
    <nav class="navbar navbar-light navbar-expand-lg" style="background-color: #e3f2fd;">
            <div class="container">
            <img src="book.jpg" width="50" height="50" alt="" srcset="">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="addRecipe.php">Add New Recipe<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewRecipe.php">View All Recipe</a>
                </li>
                </ul>
            </div>
            </div>
    </nav>

    <div class="container just body-container">
    <h1>Title</h1>
        <?php  echo $row["title"] ?>
    <h2>Description</h2>
        <?php  echo $row["descp"] ?>
    <h2>PRocedure</h2>
        <?php  echo nl2br($row["proc"]) ?> <br><br>
        <div>
            <img src="images/<?php echo $row['image']?>" alt="" srcset="" height="300px" width="300px"> <br><br>
           <a href="viewRecipe.php?del=<?php echo $id?>"> <button type="button" class="btn btn-dark" name="del" id="del">Delete</button></a>
        </div>
    </div>
    <?php } ?>
</body>
</html>