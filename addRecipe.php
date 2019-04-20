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
                <a class="nav-link" href="addRecipe.php">Add New Recipe<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="viewRecipe.php">View All Recipe</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>

    <div class="container form-rec">
        <form action="#" method="post">
            <div class="form-content">
                <h4><label for="title">Title:</label></h4>
                <input class="form-control" style="width: 30%" type="text" placeholder="Enter Title!" name="title" id="title">
            </div>
            <div class="form-content">
                <h4><label for="proc">Procedure:</label></h4>
                <textarea class="form-control" id="proc" rows="15" name="proc"></textarea>
            </div>
                <input type="submit" value="Add to book" class="btn-info">
        </form>
    </div>

<script type="text/javascript" src="js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.4.0.min.js" type="text/javascript"></script>

</body>
</html>

<?php
require_once "db.php";
$title = $_POST['title'];
$proc = $_POST['proc'];
if( !isset($title) || trim($proc) == '' ){
    echo '<script> invalidInp(); </script>';
} else{
    $sql = "INSERT INTO all_recipe (`title`, `proc`) VALUES ('" . $title . "', '" . $proc . "')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>