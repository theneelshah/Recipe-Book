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
$get = mysqli_query($conn, "SELECT * FROM all_recipe");
// if ( mysqli_num_rows($get) > 0 ) {
//     while($row = mysqli_fetch_assoc($get)) {
//         echo $row["title"]. " " . $row["proc"] . "<br><br>";
//     }
// } else {
//     echo "0 results";
// }
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
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Title</th>
                    <th>Procedure</th>
                </tr>
            </thead>
        <?php
            if ( mysqli_num_rows($get) > 0 ) {
                while($row = mysqli_fetch_assoc($get)) {
                    echo "<tr> <td>" . $row["title"] . "</td><td>" . $row["proc"] . "</td> </tr>";
                }
            } else {
                echo "0 results";
            }
        ?>
        </table>
    </div>
</body>
</html>
