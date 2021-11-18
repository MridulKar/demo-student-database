<?php
include("function.php");

$objectCrudAdmin = new crudApp();

###Step: 03
##Create Part Starts
//if anyone click on add_info and that is set with POST method then go through the condition...
if (isset($_POST['add_info'])) {
    //Global Variable $_POST recieved data sent by POST method 
    $return_msg = $objectCrudAdmin->add_data($_POST);
}
##Create Part Ends

###Step: 06
##Read Part Starts
$students = $objectCrudAdmin->display_data();
##Read Part Ends

###Step: 14
##Delete Part Starts
//We are getting data from url so we are using get method...
//Checking if we are getting anything named status then go through the condition...
 if (isset($_GET['status'])) {

    //Checking if the value of status is delete then go through the condition...
    if ($_GET['status'] = 'delete') {

        //Global Variable $_GET recieved data sent by GET method... 
        //$_GET['id'] this id is the id of href...
        $delete_id = $_GET['id'];
        $deleteMsg = $objectCrudAdmin->delete_data_by_id($delete_id);
    }
}
##Delete Part Ends

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Home</title>
</head>

<body>
    <div class="container my-4 p-4 shadow">
        <h2><a style="text-decoration: none;" href="index.php">Demo Student Database</a></h2>
        <!--delete message starts-->
        <?php if (isset($deleteMsg)) {
            echo $deleteMsg;
        } ?>
        <!--delete message ends-->

        <form class="form" action="" method="post" enctype="multipart/form-data">
            <!--Step: 04-->
            <!--Create Part Starts-->
            <!--return message starts-->
            <?php if (isset($return_msg)) {
                echo $return_msg;
            } ?>
            <!--return message ends-->
            <!--create part ends-->


            <!--Step: 02-->
            <!--Naming the Input Fields Starts-->
            <input class="form-control mb-2" type="text" name="std_name" placeholder="Enter Your Name">
            <input class="form-control mb-2" type="number" name="std_roll" placeholder="Enter Your Roll">
            <label for="image">Upload Your Image</label>
            <input class="form-control mb-2" type="file" name="std_img">
            <input type="submit" value="Add Information" name="add_info" class="form-control bg-warning">
            <!--Naming the Input Fields Ends-->
        </form>
    </div>
    <div class="container my-4 p-4 shadow">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!--Step: 07-->
                <!--Read Part Starts-->
                <!--Fetch selected data from DB and make them separated by fetch method-->
                <?php while ($student = mysqli_fetch_assoc($students)) { ?>
                    <tr>
                        <!--Print Data-->
                        <!--['DB-TBL-Column-Name']-->
                        <td> <?php echo $student['id']; ?> </td>
                        <td> <?php echo $student['std_name']; ?> </td>
                        <td> <?php echo $student['std_roll']; ?> </td>
                        <td> <img style="height:100px;" src="upload/<?php echo $student['std_img']; ?>" alt=""> </td>
                        <!--Read Part Ends-->

                        <td>
                            <!--Step: 08-->
                            <!--Edit Part Starts-->
                            <!--Lines in href attribute redirect us to specific id's detail to edit information-->
                            <a class="btn btn-success" href="edit.php?status=edit&&id=<?php echo $student['id']; ?>">Edit</a>
                            <!--Edit Part Ends-->

                            <!--Step: 13-->
                            <!--Delete Part Starts-->
                            <!--Lines in href attribute redirect us to specific id's detail to edit information-->
                            <a name="delete" class="btn btn-warning" href="?status=delete&&id=<?php echo $student['id']; ?>">Delete</a>
                            <!--Delete Part Ends-->

                        </td>
                    </tr>
                <?php } ?>
                <!--fetch $student to display data with while loop ends-->
                
            </tbody>
        </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>