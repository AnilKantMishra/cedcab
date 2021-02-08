<?php include_once 'db_con.php' ?>
<?php
class admin
{
    public $cat_name;

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
}
// $obj1= new admin();
// echo $obj1->addquestion(3,"?","1111","fjsdhfjidhfu","sdfds","fhdgfhdgf","hdhgfhdghd");
?>





