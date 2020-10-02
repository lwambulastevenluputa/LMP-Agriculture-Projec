<?php

$query2 = "SELECT * FROM mango_chats WHERE username='" . number . "' OR contact='" . number . "' ORDER BY id DESC LIMIT 100";

//Execute the query
$result2 = mysqli_query($connect, $query2);

if (mysqli_num_rows($result2) > 0) {

    while ($row2 = mysqli_fetch_array($result2)) {
        $a = $row2['ref'];
?>

<div id="msg<?php echo $a; ?>" style="display:none">
    <div class="message">
        <ul style="margin-bottom:70px; padding-bottom:70px">


            <?php

                    $query2 = "SELECT * FROM mango_conversations WHERE ref='$a' ORDER BY id ASC LIMIT 100";

                    //Execute the query
                    $result2 = mysqli_query($connect, $query2);
                    $d = 0;
                    $inc = 1;
                    if (mysqli_num_rows($result2) > 0) {
                        while ($row2 = mysqli_fetch_array($result2)) {
                            $m = $row2['message'];
                            $d1 = $row2['date'];
                            $replyid = $row2['replyid'];

                            $t = $row2['time'];
                            $type = $row2['type'];


                            $f = $row2['username'];


                            if ($row2['username'] == number) {
                                $c = $row2['contact'];
                                $cc = $row2['username'];
                            } else {
                                $c = $row2['username'];
                                $cc = $row2['contact'];
                            }

                            $query4 = "SELECT * FROM mango_user_credentials WHERE mobile_number='$c4' LIMIT 1";

                            //Execute the query
                            $result4 = mysqli_query($connect, $query4);

                            if ($row4 = mysqli_fetch_array($result4)) {
                                $cf = $row4['first_name'];
                                $cl = $row4['last_name'];
                            }

                    ?>


            <?php
                            if ($d !== $d1) {
                            ?>
            <li class="msg-day" style="margin-bottom:10px; margin-top:10px"><small><?php echo $d1; ?></small></li>
            <?php

                                $d = $row2['date'];
                            }
                            ?>

            <?php if ($f !== number) { ?>
            <li class="msg-left">
                <div class="msg-left-sub">

                    <?php
                                        if ($type == 'reply') {
                                            $query5 = "SELECT * FROM mango_conversations WHERE ref='$a' AND id='$replyid' ORDER BY id ASC LIMIT 1";

                                            //Execute the query
                                            $result5 = mysqli_query($connect, $query5);
                                            if (mysqli_num_rows($result5) > 0) {
                                                if ($row5 = mysqli_fetch_array($result5)) {
                                        ?>
                    <div style="padding:10px; width:50%">
                        <div class="msg-left-sub">
                            <div class="msg-desc">
                                <span style="margin-top:5px; color:#777; font-size:12px">Replying to this message at
                                    05:25 am</span>
                                <br>
                                <?php echo $row5['message']; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                                                }
                                            }
                                        } ?>

                    <img src="img/shinka.jpg" alt="Avatar" style="height:30px; width:30px; border-radius:50%"
                        class="avatar">
                    <div class="msg-desc"><?php echo $m; ?>
                    </div>
                    <small style="margin-top:5px"><?php echo $t; ?></small>
                    <small style="margin-top:5px; color:#f60">
                        <?php
                                            if ($type !== 'reply') {
                                            ?>
                        <span
                            onClick="document.getElementById('reply<?php echo $a . $inc; ?>').style.display=''">Reply</span>
                        <table id="reply<?php echo $a . $inc; ?>"
                            style="position:absolute; display:none; z-index:99999999; height:34px; width:250px; border-radius:10px; background:#fff; color:#000; margin-right:300px; box-shadow:0 0 2px 2px #999">
                            <tr align="center" style="vertical-align:middle">
                                <td style="width:80%">
                                    <form id="replyform<?php echo $a . $inc; ?>" method="post"
                                        action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                        <input type="hidden" name="replyref" value="<?php echo $a; ?>" />
                                        <input type="hidden" name="replyid" value="<?php echo $inc; ?>" />
                                        <input type="hidden" name="replycontact" value="<?php echo $c; ?>" />
                                        <input type="text" name="replymsg" placeholder="reply here..."
                                            style=" outline:none; padding-left:5px; border:2px #555 solid; width:90%; border-radius: 15px; height:30px">
                                </td>
                                <td style="width:10%">
                                    <i onclick="document.getElementById('replyform<?php echo $a . $inc; ?>').submit()"
                                        class="fa fa-send" style="height:30px; margin-top:19px; width:30px"></i>
                                    </form>
                                </td>
                                <td style="width:10%; font-size:14px; color:#f00"
                                    onClick="document.getElementById('reply<?php echo $a . $inc; ?>').style.display='none'">
                                    &times;</td>
                            </tr>
                        </table>
                        <?php
                                            }
                                            ?>
                    </small>
                    <small style="margin-top:5px; margin-right:5px; color:#06f">
                        <span onClick="document.getElementById('like<?php echo $a . $inc; ?>').style.display=''">
                            Like</span>
                        <div align="left" id="like<?php echo $a . $inc; ?>"
                            style=" float:none; position:absolute; display:none; z-index:999999999999; height:30px; width:70px; border-radius:10px; padding-top:5px; background:#fff; box-shadow:0 0 2px 2px #999; margin-left:10px">
                            <img src="../img/like.png" style="height:22px; margin-left:20px; width:22px"><span
                                style="width:20%; float:right; font-size:18px; margin-top:0px; color:#f00"
                                onClick="document.getElementById('like<?php echo $a . $inc; ?>').style.display='none'">&times;</span>
                        </div>

                        <span onClick="document.getElementById('shade<?php echo $a . $inc; ?>').style.display=''"
                            style="margin-left:5px; color:#f00">Shade</span>
                        <div align="left" id="shade<?php echo $a . $inc; ?>"
                            style=" float:none; position:absolute; display:none; z-index:999999999999; height:30px; width:70px; border-radius:10px; padding-top:5px; background:#fff; box-shadow:0 0 2px 2px #999; margin-left:10px">
                            <img src="../img/shade.png" style="height:20px; margin-left:20px; width:20px"><span
                                style="width:20%; float:right; font-size:18px; margin-top:0px; color:#f00"
                                onClick="document.getElementById('shade<?php echo $a . $inc; ?>').style.display='none'">&times;</span>
                        </div>
                    </small>
                </div>
            </li>


            <?php } else { ?>

            <li class="msg-right">
                <div class="msg-right-sub">


                    <?php
                                        if ($type == 'reply') {
                                            $query5 = "SELECT * FROM mango_conversations WHERE ref='$a' AND id='$replyid' ORDER BY id ASC LIMIT 1";
                                            //Execute the query
                                            $result5 = mysqli_query($connect, $query5);
                                            if (mysqli_num_rows($result5) > 0) {
                                                if ($row5 = mysqli_fetch_array($result5)) {
                                        ?>
                    <div style="padding:10px; width:50%">
                        <div class="msg-right-sub">
                            <div class="msg-desc">
                                <span style="margin-top:5px; color:#777; font-size:12px">Replying to this message at
                                    05:25 am</span>
                                <br>
                                <?php echo $row5['message']; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                                                }
                                            }
                                        } ?>


                    <img src="img/shinka.jpg" alt="Avatar" style="height:30px; width:30px; border-radius:50%"
                        class="avatar">
                    <div class="msg-desc"><?php echo $m; ?>
                    </div>
                    <small style="margin-top:5px"><?php echo $t; ?></small>
                    <small style="margin-top:5px; color:#f60">
                        <?php
                                            if ($type !== 'reply') {
                                            ?>

                        <span
                            onClick="document.getElementById('reply<?php echo $a . $inc; ?>').style.display=''">Reply</span>
                        <table id="reply<?php echo $a . $inc; ?>"
                            style="position:absolute; display:none; z-index:99999999; height:34px; width:250px; border-radius:10px; background:#fff; color:#000; left:70px; box-shadow:0 0 2px 2px #999">
                            <tr align="center" style="vertical-align:middle">
                                <td style="width:80%">
                                    <form id="replyform<?php echo $a . $inc; ?>" method="post"
                                        action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                        <input type="hidden" name="replyref" value="<?php echo $a; ?>" />
                                        <input type="hidden" name="replyid" value="<?php echo $inc; ?>" />
                                        <input type="hidden" name="replycontact" value="<?php echo $c; ?>" />
                                        <input type="text" name="replymsg" placeholder="reply here..."
                                            style=" outline:none; padding-left:5px; border:2px #555 solid; width:90%; border-radius: 15px; height:30px">
                                </td>
                                <td style="width:10%">
                                    <i onclick="document.getElementById('replyform<?php echo $a . $inc; ?>').submit()"
                                        class="fa fa-send" style="height:30px; margin-top:19px; width:30px"></i>
                                    </form>
                                </td>
                                <td style="width:10%; font-size:14px; color:#f00"
                                    onClick="document.getElementById('reply<?php echo $a . $inc; ?>').style.display='none'">
                                    &times;</td>
                            </tr>
                        </table>
                        <?php
                                            }
                                            ?>
                    </small>
                    <small style="margin-top:5px; float:left; margin-right:5px; color:#06f">
                        <span style="margin-left:80px"
                            onClick="document.getElementById('like<?php echo $a . $inc; ?>').style.display=''">Like</span>
                        <div align="left" id="like<?php echo $a . $inc; ?>"
                            style=" float:none; position:absolute; display:none; z-index:999999999999; height:30px; width:70px; border-radius:10px; padding-top:5px; background:#fff; box-shadow:0 0 2px 2px #999; margin-left:10px">
                            <img src="../img/like.png" style="height:20px; margin-left:20px; width:20px"><span
                                style="width:20%; float:right; font-size:18px; margin-top:0px; color:#f00"
                                onClick="document.getElementById('like<?php echo $a . $inc; ?>').style.display='none'">&times;</span>
                        </div>

                        <span onClick="document.getElementById('shade<?php echo $a . $inc; ?>').style.display=''"
                            style="margin-left:5px; color:#f00"> Shade</span>
                        <div align="left" id="shade<?php echo $a . $inc; ?>"
                            style=" float:none; position:absolute; display:none; z-index:999999999999; height:30px; width:70px; border-radius:10px; padding-top:5px; background:#fff; box-shadow:0 0 2px 2px #999; margin-left:10px">
                            <img src="../img/shade.png" style="height:20px; margin-left:20px; width:20px"><span
                                style="width:20%; float:right; font-size:18px; margin-top:0px; color:#f00"
                                onClick="document.getElementById('shade<?php echo $a . $inc; ?>').style.display='none'">&times;</span>
                        </div>
                    </small>

                </div>
            </li>

            <?php
                            }
                            ?>


            <?php

                            $inc = $inc + 1;
                        }
                    } else {
                        echo "<li>No conversations yet.</li>";
                    }

                    ?>

        </ul>
    </div>
</div>

<?php
    }
} else {
    echo "No chats yet.";
}

?>


<div id="tapachat" align="center" style="font-size:16px; margin-top:100px; color:#f60; height:40px; width:100%">
    Tap a chat to view conversations
</div>