<?php
include_once './dbconnect.php';


// fetch records
$sql = "SELECT * FROM tbl_language order by id";
$result = mysqli_query($con, $sql);

// delete record
if (isset($_GET['langid'])) {
    $sql = "DELETE FROM tbl_language WHERE id=" . $_GET['langid'];
    @mysqli_query($con, $sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <title>Simple CRUD</title>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
</head>
<body>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading"><h3>Simple CRUD</h3></div>

            <div class="panel-body text-right">
            <a href="insert_language.php" class="btn btn-default">Add Language</a>
            </div>
  
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Language Name</th>
                        <th>ISO Code</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $cnt = 1;
                while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $cnt++; ?></td>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['lcode']; ?></td>
                    <td><a href="update_language.php?langid=<?php echo $row['id']; ?>"><img src="images/edit.png" alt="Edit" /></a></td>
                    <td><a href="javascript: delete_lang(<?php echo $row['id']; ?>)"><img src="images/delete.png" alt="Delete" /></a></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            <div class="panel-footer"><?php echo mysqli_num_rows($result) . " records found"; ?></div>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
function delete_lang(id)
{
    if (confirm('Confirm Delete?'))
    {
        window.location.href = 'index.php?langid=' + id;
    }
}
</script>
</body>
</html>