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

    <div class="container body-container">
        <form action="#" method="post" id="addForm" enctype="multipart/form-data">
                <div class="alert " role="alert" id="alert-box">
                    <span id="upper-alert"></span>
                </div>
            <div class="form-content">
                <h4><label for="title">Title:</label></h4>
                <input class="form-control" style="width: 30%" type="text" placeholder="Enter Title!" name="title" id="title">
            </div>
            <div class="form-content">
                <h4><label for="title">Description:</label></h4>
                <input class="form-control" style="width: 30%" type="text" placeholder="Enter a description!" name="desc" id="desc">
            </div>
            <div class="form-content">
                <h4><label for="proc">Procedure:</label></h4>
                <textarea class="form-control" id="proc" rows="15" name="proc"></textarea>
            </div>
            <div class="form-content">
                <h4><label for="">Image for your recipe:</label></h4>
                <input type="file" name="file" id="file" accept="image/png, image/jpeg, image/jpg">
            </div>
                <input type="submit" value="Add to book" class="btn-info" name="submitBtn">
        </form>

    </div>
<?php
require_once "db.php";
$done = 0;
if(isset($_POST['submitBtn'])){
    $title = $_POST['title'];
    $proc = $_POST['proc'];
    $desc = $_POST['desc'];
    $name = '';
    $errors = array();
    if(isset($_FILES['file'])){
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $dest = "images/" .$file_name ;
        if(file_exists($dest)){
            $done = 2;
        }else{
            move_uploaded_file($_FILES["file"]["tmp_name"], $dest);
        }
        $name = $file_name;
    }
}
if( !isset($title) || trim($proc) == '' || trim($desc) == '' ){
    // echo '<script> invalidInp(); </script>';
} else{
    $sql = "INSERT INTO all_recipe (`title`, `proc`, `descp`,`image`) VALUES ('" . $title . "', '" . $proc . "', '". $desc . "','". $name . "')";
    if (mysqli_query($conn, $sql)) {
        $done = 1;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>  
<script type="text/javascript" src="js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.4.0.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $('#addForm').submit(function(){
            var title = $('#title').val();
            var proc = $('#proc').val();

            if (title == '') {
                $('#title').after('<span class="error">This field is required</span>');
            }   
        })
        if(<?php echo $done?> == 0){
            $("#upper-alert").text('Enter all fields correctly');
            $("#alert-box").removeClass('alert-info').addClass('alert-danger')
        } else if(<?php echo $done?> === 2){
            $("#upper-alert").text('File name already exists in database. Please select another file name.');
            $("#alert-box").removeClass('alert-info').addClass('alert-danger');
        }
        else{
            $("#upper-alert").text('New recipe added');
            $("#alert-box").removeClass('alert-danger').addClass('alert-info')
        }
    })
</script>
</body>
</html>

