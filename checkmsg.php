<?php
session_start();
if (isset($_SESSION['mobilenumber'])) {
    //check connection to db that it is not the first time.
    define("number", $_SESSION['mobilenumber']);


    if (isset($_POST['user'])) {
        $a = $_POST['user'];
        include("../config/db_connect.php");
        $query5 = "SELECT * FROM mango_helpdesk WHERE username='$a' OR contact='$a' ORDER BY id ASC LIMIT 100";

        //Execute the query
        $result5 = mysqli_query($connect, $query5);
        if (mysqli_num_rows($result5) > 0) {
            while ($row5 = mysqli_fetch_array($result5)) {
?>
<div style="width:300px; min-height:40px; border-bottom:1px #bbb solid; color:#000; font-size:12px">
    <div style="padding:10px">
        <b><?php if ($number == $row5['username']) {
                                echo 'You';
                            } else {
                                echo 'Helpdesk';
                            } ?></b><br />
        <?php echo $row5['message']; ?>
    </div>
</div>
<?php
            }
        }
    }
}
?>