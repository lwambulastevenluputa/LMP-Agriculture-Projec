<?php


$conn = mysqli_connect('localhost', 'u182743893_epsy', 'tyghvb', 'u182743893_epsyos');
$sql_query2 = "SELECT * FROM products WHERE name!='deleted'";
$result2 = mysqli_query($conn, $sql_query2);
$num = mysqli_num_rows($result2);

$conn = mysqli_connect('localhost', 'u182743893_epsy', 'tyghvb', 'u182743893_epsyos');
$sql_query1 = "SELECT * FROM products WHERE name!='deleted' LIMIT 22";
$a = 1;
$b = 0;
$result1 = mysqli_query($conn, $sql_query1);
if (mysqli_num_rows($result1) > 0) {
?>
<div style="width:100%; overflow-x:auto; white-space:nowrap">
    <table style="width:100%; width:1120px; table-layout:fixed; height:100%">
        <?php
            while ($row1 = mysqli_fetch_array($result1)) {
                $name = $row1['name'];
                $price = $row1['price'];
                $desc = $row1['description'];

                if ($a == 1) {
                    echo '<tr align="center" style="vertical-align:middle">';
                }
            ?>

        <td align="center" style="width:50%; padding:10px">

            <a href="store_review.php?i=<?php echo $a; ?>">
                <div class="store">
                    <table style="width:100%; min-height:90px">
                        <tr align="center" style="vertical-align:middle">
                            <td style="width:30%">
                                <img src="img/Mango.jpg"
                                    style="width:90px; background:none; height:90px; margin-bottom:5px; margin-top:5px; border-radius:5px" />
                            </td>
                            <td style="width:70%; vertical-align:top; padding:5px" align="left">

                                <div style=" height:30px">
                                    <b style="font-size:12px; text-transform:capitalize"><?php if (strlen($name) < 50) {
                                                                                                        echo $name;
                                                                                                    } else {
                                                                                                        echo substr($name, 0, 50) . '...';
                                                                                                    } ?></b>
                                </div>
                                <div style="height:40px">
                                    <small style="font-size:12px; text-transform:capitalize"><?php if (strlen($desc) < 100) {
                                                                                                            echo $desc;
                                                                                                        } else {
                                                                                                            echo substr($desc, 0, 100) . '...';
                                                                                                        } ?></small>
                                </div>
                                <div align="right" style="height:20px">
                                    <b
                                        style="font-size:14px; font-weight:600; color:#f40; text-transform:capitalize"><?php if (strlen($price) < 10) {
                                                                                                                                    echo $price;
                                                                                                                                } else {
                                                                                                                                    echo substr($price, 0, 10) . '...';
                                                                                                                                } ?></b>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </a>

        </td>

        <?php
                if ($a % 4 == 0) {
                    echo '</tr>';
                }

                $a = $a + 1;
            }

            ?>
    </table>
</div>

<div align="center" style="width:100%; border-bottom:1px #ddd solid; padding-top:5px; height:38px">
    <span style="color:#f60; font-size:12px; float:left; margin-top:10px; margin-left:10px"><?php echo $num; ?>
        More</span>
    <a href="store.php"><input type="submit"
            style="width:140px; height:30px; color:#070; background:#fff; border-radius:5px; border:1px #999 solid"
            value="View More In Store" /></a>
</div>

<?php

} else {
    echo 'No products available.';
}

?>