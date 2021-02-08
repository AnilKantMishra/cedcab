<?php include_once 'db_con.php' ?>
<?php
class location
{


    public $con;


    public function __construct()
    {
        $dbcon = new db_con();
        $this->con = $dbcon->createConnection();
    }





    public function nav()
    {
        $sql = "SELECT name,distance FROM `tbl_location` where is_available='1' ";

        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function distance($name)
    {
        $sql = "SELECT distance FROM `tbl_location` where name='$name' And is_available='1'";

        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            $dist = $result->fetch_assoc();
            return $dist['distance'];
        } else {
            return false;
        }
    }
}
// $obj1 = new location();
// // echo "<pre>";

// echo ($obj1->distance('BBD'));
?>





