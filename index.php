<?php include_once 'connection/connect.php' ?>
<!DOCTYPE html>
<html>

<head>
    <title>Native PHP CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
<?php
if (isset($_SESSION['message'])):?>

    <div class="alert alert-<?=$_SESSION['msg_type']; ?>">

        <?php
        print $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif; ?>


<div class="container">



    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    ADD
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Information Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="justify-content-center">
                    <form method="POST">
                        <div class="form-group">
                            <label for="name">Name: </label>
                            <input type="text" name="name" class="form-control"
                                   required="required">
                        </div>
                        <div class="form-group">
                            <label for="age">Age: </label>
                            <input type="text" name="age" class="form-control"
                                   required="required">
                        </div>
                        <div class="form-group">
                            <label for="age">Address: </label>
                            <input type="text" name="address" class="form-control"
                                   required="required">
                        </div>
                        <div class="form-group">
                                <input type="submit" name="add" class="btn btn-primary" value="ADD">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
    <?php
        $sql = "SELECT * FROM info;";
        $result = mysqli_query($conn, $sql);
    ?>


<div class="justify-content-center">
    <table class="table">
        <thead class="table thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
                <th></th>
            </tr>
        </thead>
        <?php
            while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['ID']; ?></td>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['Age']; ?></td>
                    <td><?php echo $row['Address']; ?></td>
                    <td><a href="index.php?edit=<?php echo $row['ID']; ?>" data-toggle="modal" data-target="#editModal" class="btn btn-warning">Edit</a>
                        <a href="index.php?delete=<?php echo $row['ID']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
        <?php endwhile; ?>
    </table>
</div>


    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Edit Information Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="justify-content-center">
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <div class="form-group">
                                <label for="name">Name: </label>
                                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            </div>
                            <div class="form-group">
                                <label for="age">Age: </label>
                                <input type="text" name="age" class="form-control" value="<?php echo $age; ?>">
                            </div>
                            <div class="form-group">
                                <label for="age">Address: </label>
                                <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                            </div>
                            <div class="form-group">
                                    <button type="submit" class="btn btn-info" name = "update">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<!--End of Edit Modal-->

</div>

</body>

</html>