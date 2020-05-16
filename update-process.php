<?php
    include_once 'database.php';
    $phone_number  = mysqli_query($conn, "SELECT DISTINCT phone_number FROM employees");
    $update = '';
    if(count($_POST)>0)
    {
        mysqli_query($conn,"UPDATE employees set first_name='" . $_POST['first_name'] . "', last_name='" . $_POST['last_name'] . "', phone_number='" . $_POST['phone_number'] . "' ,email='" . $_POST['email'] . "',adress='" . $_POST['adress'] . "' WHERE id='" . $_GET['id'] . "'");
        $update = "Update has been successfully.!";
    }
        $edite = mysqli_query($conn,"SELECT * FROM employees WHERE id='" . $_GET['id'] . "'");
        $row= mysqli_fetch_array($edite);
?>

<html>
<head>
<title>Insert Delede and Update Data Form</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
</head>

<body>

<style>
.form-control, .btn,.container {
    border-radius: 1px;
}   
</style>

<br>
<br>
<br>
    <div class="container"> 
        <div class="shadow p-3 mb-5 bg-white rounded">
            <h3 class="mt33">PHP INSERT</h3>
            <a href="retrieve.php">Back to list</a>
            <br>
            <br>
            <h5 class="text-center text-success" id="update"><?= $update ;?></h5>
            <form class="mt33" action="" method = "post"><!--form -->
                
                <div class="form-group row">
                    <label for="description" class="control-label col-sm-3">First name *</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?=$row['first_name']; ?>" required>
                    </div>
                </div>

                  
                  <div class="form-group row">
                    <label for="description" class="control-label col-sm-3">Last name *</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $row['last_name']; ?>" required>
                    </div>
                </div>

               
                <div class="form-group row">
                    <label for="description" class="control-label col-sm-3">phone  *</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= $row['phone_number']; ?>" required>
                    </div>
                </div>

                  
                  <div class="form-group row">
                    <label for="description" class="control-label col-sm-3">Email *</label>
                    <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" name="email" value="<?= $row['email']; ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="control-label col-sm-3">Adress *</label>
                    <div class="col-sm-9">
                    <input type="adress" class="form-control" id="adress" name="adress" value="<?= $row['adress']; ?>" required>
                    </div>
                </div>

               
               
                <div class="text-success text-center d-none" id="msg_div">
                    <h4 id="res_message">Insert has been successfully.</h4>
                </div>

               
                <div class="form-group row">
                    <div class="offset-sm-3 col-sm-9 pull-right">
                        <button type="submit"id="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>

   
    <script>
        $(document).ready(function()
        {
            setTimeout(function()
            {
                $('#update').hide();
            },3000);
        });

    // function data table
    $(document).ready(function ()
    {
        $('#tableHorizontalWrapper').DataTable(
        {
        "scrollX": true
        });

        $('.dataTables_length').addClass('bs-select');
    });
    </script>
</body>
</html>