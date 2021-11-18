<?php
###Step: 01
##DB Connection Making starts here and same in everywhere
//just class name & dbname will be changed in other projects...
class crudApp
{
    private $conn;
    public function __construct()
    {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'crudapp';

        //DB connection making function
        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if (!$this->conn) {
            die("Database connection failed!");
        }
    }
    ##DB Connection Making ends here and same in everywhere

    ###Step: 04
    ##Create Part Starts
    //By $data we will recieve $_POST's all data... 
    public function add_data($data)
    {
        //$variable = $data['input field name']
        $std_name = $data['std_name'];
        $std_roll = $data['std_roll'];
        $std_img = $_FILES['std_img']['name'];
        $tmp_name = $_FILES['std_img']['tmp_name'];

        //query to send data to DB...
        $query = "INSERT INTO students(std_name,std_roll,std_img) VALUE('$std_name',$std_roll,'$std_img')";
        
        //$this->conn, reffers the DB to connect / path to send the query...
        //send query to DB and run, all data will be sent to DB...
        //if connection & query is ok then go through the condition...
        if(mysqli_query($this->conn, $query)) {

            //move the image to upload folder...
            move_uploaded_file($tmp_name, 'upload/' . $std_img);

            //give a return message after sending data to DB...
            return "Information Added Successfully";
        }
    }
    ##create part ends

    ###Step: 05
    ##Read Part Starts
    public function display_data()
    {
        //query to select data from DB...
        $query = "SELECT * FROM students";

        //$this->conn, reffers the DB to connect / path to send the query...
        //send query to DB and run, all data will be selected from DB...
        //if connection & query is ok then go through the condition...
        if (mysqli_query($this->conn, $query)) {
            //data will be selected as a row or array...
            $returnData = mysqli_query($this->conn, $query);
            return $returnData;
        }
    }
    ##Read Part Ends

    ###Step: 10
    ##Edit Part Starts
    //We will go through specific data to edit by $id...
    public function display_data_by_id($id)
    {
        $query = "SELECT * FROM students WHERE id=$id";

        //$this->conn, reffers the DB to connect / path to send the query...
        //send query to DB and run, data will be selected from DB for specific id...
        //if connection & query is ok then go through the condition...
        if (mysqli_query($this->conn, $query)) {
            //data will be selected as a row or array...
            $returnData = mysqli_query($this->conn, $query);
            //Fetch selected data from DB and make them separated by fetch method...
            $studentData =  mysqli_fetch_assoc($returnData);
            return $studentData;
        }
    }
    #Edit Part Ends

    ###Step: 11
    #Update Part Starts
    public function update_data($data)
    {
        //$variable = $data['input field name']
        $std_name = $data['e_std_name'];
        $std_roll = $data['e_std_roll'];
        $std_id = $data['std_id'];
        $std_img = $_FILES['e_std_img']['name'];
        $tmp_name = $_FILES['e_std_img']['tmp_name'];

        $query = "UPDATE students SET std_name='$std_name', std_roll=$std_roll, std_img='$std_img' WHERE id=$std_id";

        //$this->conn, reffers the DB to connect / path to send the query...
        //send query to DB and run, all updated data will be sent to DB...
        //if connection & query is ok then go through the condition...
        if (mysqli_query($this->conn, $query)) {
            
            //move the image to upload folder...
            move_uploaded_file($tmp_name, 'upload/' . $std_img);

            //give a return message after sending updated data to DB...
            return "Information Updated Successfully!";
        }
    }
    ##Update Part Ends

    ###Step: 15
    ##Delete Part Starts
    public function delete_data_by_id($id)
    {
        //$catch_img = "SELECT * FROM students WHERE id=$id";
        //$delete_std_info = mysqli_query($this->conn, $catch_img);
        //$std_info = mysqli_fetch_assoc($delete_std_info);
        //$deleteImg_data = $std_info['std_img'];
        $query = "DELETE FROM students WHERE id=$id";
        if (mysqli_query($this->conn, $query)) {
            // unlink('upload/'.$deleteImg_data);
            return "Deleted Successfully";
        }
    }
    ##Delete Part Ends
}
