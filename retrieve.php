<?php
    include_once 'database.php';
    $update = '';
    $delete = '';
    $result = mysqli_query($conn, "SELECT * FROM employees");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrive</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


</head>
<body>
<br>
<br>
    <div class="container">
    <div class="shadow p-3 mb-5 bg-white rounded">
            <h3 class="mt33">PHP Retrieve</h3>
            <a href="insert.php">Back to Signup Page</a>
            <br>
            <br>
        <div class="container-fluid">
        <h5 class="text-center text-success" id="update"><?= $update ;?></h5>
        <h5 class="text-center text-success" id="delete"><?= $delete ;?></h5>
            <table id="tableHorizontalWrapper" class="table table-striped table-bordered table-sm text-center" cellspacing="0"width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone </th>
                        <th>Email</th>
                        <th>Adress</th>
                        <th>Image</th>
                        <th colspan="2">Action</th>
                       
                    </tr>
                </thead>
                <tbody>
                <?php
                while($row = mysqli_fetch_array($result))
                {
                    ?>
                    <tr>
                    <td><?= $row['id'];?></td>
                    <td><?= $row['first_name'];?></td>
                    <td><?= $row['last_name'];?></td>
                    <td><?= $row['phone_number'];?></td>
                    <td><?= $row['email'];?></td>
                    <td><?= $row['adress'];?></td>
                    <td><?php 
                            $image = $row['images'];
                            $image_src = "images/".$image; 
                            ?>
                  

                        <a href="<?php echo $image_src; ?>" target="_blank">
                        <img src='<?php echo $image_src; ?>' height="50" width="50" >
                        </a>
                        
                    </td>
                    <td><a href="update-process.php?id=<?php echo $row["id"]; ?>">Edite</a></td>
                    <td><a href="delete-process.php?id=<?php echo $row["id"]; ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>
                    </tr>
                <?php
                }
                
                mysqli_close($conn);
                ?>
                </tbody>
            </table>
        </div>
    </div>


    <script>
        $(document).ready(function()
        {
            setTimeout(function()
            {
                $('#update').hide();
            },3000);
        });

        $(document).ready(function()
        {
            setTimeout(function()
            {
                $('#delete').hide();
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