<?php
require_once 'Model/InformationModel.php';
$informationModel = new InformationModel();
$studentArray = $informationModel->getStudentInformation();
?>

<center><h3>My Database</h3></center>
<table style="width:100%">
    <thead>
    <td>id</td>
    <td>Name</td>
    <td>Email</td>
    <td>Delete</td>
</thead>

<?php foreach ($studentArray as $value) { ?>
    <tr>
        <td><?php echo $value->id; ?></td>
        <td><?php echo $value->name; ?></td> 
        <td><?php echo $value->email; ?></td>
        <td><a href="?id=<?php echo $value->id; ?>" 
               onclick="return confirm('Are you sure you wish to delete this Record?');">
                <span c lass="delete" title="Delete"> Delete </span></a></td>
    </tr>

<?php } ?>
</table>