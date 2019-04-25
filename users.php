<?php
include_once 'inc/dbconnect.php';
$db = new DbConnect();

/*
 * GET request for fetching all or specific User's Data *
 */
if ($_SERVER['REQUEST_METHOD'] == "GET")
{

    /*
     * @param UserID - user's serial number
     * @param fetch - true to fetch data of User of @UserID
     * @param del - true to delete information of @UserID
     *
     * Empty Parameters will return all user's info
     *
     */
    if (isset($_GET['id']) && isset($_GET['fetch']))
    {
        $srno = $_GET['id'];
        $sql = "select * from tbl_user where user_id=$srno";
        $quer = mysqli_query($db->getDb(), $sql);
        $res = mysqli_fetch_row($quer);

        echo json_encode(['Srno' => $res[0],
            'Name' => $res[1],
            'Email' => $res[2],
            'Password' => $res[3]]);
    } else if (isset($_GET['id']) && isset($_GET['del']))
    {
        $srno = $_GET['id'];
        $sql = "delete from tbl_user where user_id=$srno";
        $quer = mysqli_query($db->getDb(), $sql);

        if ($quer)
            echo json_encode(["result" => "Deletion Success"]);
        else
            echo json_encode(["result" => "Deletion Failed"]);
    } else
    {
        $sql = "select * from tbl_user";
        $quer = mysqli_query($db->getDb(), $sql);
        $json = array();

        while ($row = mysqli_fetch_row($quer))
        {
            $res['Srno'] = $row[0];
            $res['Name'] = $row[1];
            $res['Email'] = $row[2];
            $res['Password'] = $row[3];
            array_push($json, $res);
        }

        echo json_encode($json);
    }
    mysqli_close($db->getDb());
}

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    /*
     * @param New - Adding new User to Database
     * @param update - Update information of Existing user
     * @name - Name of User
     * @Email - Email id
     * @Pass - Password
     *
     * @Srno - If Update flag is set, Srno is used for Updating user information
     */

    if (isset($_POST['New']))
    {
        $name = $_POST['Name'];
        $email = $_POST['Email'];
        $pass = $_POST['Pass'];

        $sql = "Insert into tbl_user(user_name,user_email,user_password) VALUES ('$name','$email','$pass')";
        $quer = mysqli_query($db->getDb(), $sql);

        if ($quer)
            return json_encode(["result" => "Success"]);
        else
            return json_encode(["result" => "Failed"]);

    }
    else if(isset($_POST['update']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $srno = $_POST['srno'];


        $sql = "update tbl_user set user_name='$name', user_email='$email',user_password='$pass' where user_id='$srno'";
        $quer = mysqli_query($db->getDb(),$sql);

        echo $sql;

        if ($quer)
            echo json_encode(["result" => "Update Success"]);
        else
            echo json_encode(["result" => "Update Failed"]);
    }
}


?>