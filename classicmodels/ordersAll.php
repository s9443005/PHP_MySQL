<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "htmlhead.php"; ?>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">

            <!-- 邊欄左BEGIN -->
            <?php include "sidebarLEFT.php"; ?>
            <!-- 邊欄左ENG -->

            <!-- 邊欄右BEGIN -->
            <div class="col py-3">
            <h1>訂單表格總覽</h1><hr>
            <?php include "connectDB.php"; ?>
            <?php
            $sql = "SELECT * FROM orders;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='table'>";
                echo "<tr class='bg-primary text-white'>";
                echo "<td>訂單編號</td>";
                echo "<td>訂單日期</td>";
                echo "<td>下單日期</td>";
                echo "<td>出貨日期</td>";
                echo "<td>狀態</td>";
                echo "<td>附註</td>";
                echo "<td>顧客編號</td>";
                echo "</tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['orderNumber'] . "</td>";
                    echo "<td>" . $row['orderDate'] . "</td>";
                    echo "<td>" . $row['requiredDate'] . "</td>";
                    echo "<td>" . $row['shippedDate'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['comments'] . "</td>";
                    echo "<td>" . $row['customerNumber'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
            echo "0 results";
            }
            ?>
            <?php include "disconnectDB.php"; ?>
            </div>
            <!-- 邊欄右END -->

        </div>
    </div>
</body>

</html>