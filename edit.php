<?php
 include("function.php");

 $objectCrudAdmin = new crudApp();

 ###Step: 09
 ##Edit Part Starts
 //We are getting data from url so we are using get method...
 //Checking if we are getting anything named status then go through the condition...
 if(isset($_GET['status'])){
  //Checking if the value of status is edit then go through the condition...
      if ($_GET['status']='edit'){
        //Global Variable $_GET recieved data sent by GET method... 
        //$_GET['id'] this id is the id of href...
        $edit_id = $_GET['id'];
        $returnData = $objectCrudAdmin->display_data_by_id($edit_id);
      }  

 }
##Edit Part Ends

###Step: 12
##Update Part Starts
//if anyone click on update_info and that is set with POST method then go through the condition..
 if(isset($_POST['update_info'])){
   //Global Variable $_POST recieved data sent by POST method 
   $msg= $objectCrudAdmin->update_data($_POST);
 }
 ##Update Part Ends
 
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Edit</title>
  </head>
  <body>
    <div class="container my-4 p-4 shadow">
        <h2><a style="text-decoration: none;" href="index.php">Demo Student Database</a></h2>
        
        <form class="form" action="" method="post" enctype="multipart/form-data">

        <!--return message-->
        <?php if(isset($msg)){echo $msg;}?>
        <!--return message-->

        <!--Step: 11-->
        <!--Edit Part Starts-->
        <!--Print Data-->
        <!--['tbl-column-name']>-->
            <input class="form-control mb-2" type="text" name="e_std_name" value="<?php echo $returnData['std_name'];?>">
            <input class="form-control mb-2" type="number" name="e_std_roll" value="<?php echo $returnData['std_roll'];?>">
            <label for="image">Upload Your Image</label>
            <input class="form-control mb-2" type="file" name="e_std_img"  value="<?php echo $returnData['std_img'];?>">
            <!--Hidden Type Input Field-->
            <input type="hidden" name="std_id"
            value="<?php echo $returnData['id'];?>">
            <input type="submit" value="Update Information" name="update_info" class="form-control bg-warning">
            <!--Edit Part Ends-->
        </form>
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