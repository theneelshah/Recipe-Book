<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>View Recipe</title>
</head>
<?php
require_once "db.php";
if(isset($_GET['del'])){
    $del = $_GET['del'];
    $get = mysqli_query($conn, "DELETE FROM all_recipe where id =" .$del);
    
}
    $get = mysqli_query($conn, "SELECT * FROM all_recipe");
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
        <h4>All recipes: </h4>
        
        <?php
            if ( mysqli_num_rows($get) > 0 ) { ?>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>View</th>
                        </tr>
                    </thead>
            <?php
                while($row = mysqli_fetch_assoc($get)) {
                    echo "<tr> <td>" . $row["title"] . "</td><td>" . $row["descp"] . "</td> <td> <a href=\"viewRecipePage.php?id=". $row["id"] ."\">View Recipe</a> </td></tr>";
                }
            } else {
                echo "You haven't added any recipes yet. Add some now!";
            }
        ?>
        </table>
    </div>

</body>
</html>
