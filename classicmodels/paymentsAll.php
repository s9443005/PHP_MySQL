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
            <h1>支付表格總覽</h1><hr>
            <?php include "connectDB.php"; ?>
            <?php
            $sql = "SELECT * FROM payments;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='table'>";
                echo "<tr class='bg-primary text-white'>";
                echo "<td>顧客編號</td>";
                echo "<td>支票號碼</td>";
                echo "<td>支付日期</td>";
                echo "<td>金額</td>";
                echo "</tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['customerNumber'] . "</td>";
                    echo "<td>" . $row['checkNumber'] . "</td>";
                    echo "<td>" . $row['paymentDate'] . "</td>";
                    echo "<td>" . $row['amount'] . "</td>";
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