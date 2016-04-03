<?php
if (isset($_POST['name']) && isset($_POST['email'])) {
    require 'Model/InformationModel.php';
    $informationModel = new InformationModel();
    $studentArray = $informationModel->insertStudent($_POST['name'], $_POST['email']);
}
 else if(isset ($_GET['id'])) {
    require 'Model/InformationModel.php';
    $informationModel = new InformationModel();
    $studentArray = $informationModel->deleteStudentById($_GET['id']);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>My Database</title>
        <style>
            table, th, td{
                border: 1px solid;
            }
            th, td {
                padding: 10px;
            }
        </style>
    </head>

    <body>
        
            <form action="#" method="post">
                <fieldset>
                    <legend>Add Student</legend>
                    <p>
                        <label for="name">Name : </label>
                        <input type="text" name="name" placeholder="Name"><br>
                    </p>
                    <p>
                        <label for="email">Email : </label>
                        <input type="text" name="email" placeholder="Email">
                    </p>
                    <input type="submit" name="Submit">
                </fieldset>
            </form>
        

    </body>

    <?php include_once 'table_view.php'; ?>
</html>