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
            <h1>顧客表格總覽</h1><hr>
            <?php include "connectDB.php"; ?>
            <?php
            $sql = "SELECT * FROM customers;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='table'>";
                echo "<tr class='bg-primary text-white'>";
                echo "<td>顧客編號</td>";
                echo "<td>顧客名稱</td>";
                echo "<td>聯絡人姓</td>";
                echo "<td>聯絡人名</td>";
                echo "<td>電話</td>";
                echo "<td>住址1</td>";
                echo "<td>住址2</td>";
                echo "<td>城市</td>";
                echo "<td>州</td>";
                echo "<td>郵遞區號</td>";
                echo "<td>國家</td>";
                echo "<td>員工</td>";
                echo "<td>額度</td>";
                echo "</tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['customerNumber'] . "</td>";
                    echo "<td>" . $row['customerName'] . "</td>";
                    echo "<td>" . $row['contactLastName'] . "</td>";
                    echo "<td>" . $row['contactFirstName'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['addressLine1'] . "</td>";
                    echo "<td>" . $row['addressLine2'] . "</td>";
                    echo "<td>" . $row['city'] . "</td>";                    
                    echo "<td>" . $row['state'] . "</td>";
                    echo "<td>" . $row['postalCode'] . "</td>";
                    echo "<td>" . $row['country'] . "</td>";
                    echo "<td>" . $row['salesRepEmployeeNumber'] . "</td>";
                    echo "<td>" . $row['creditLimit'] . "</td>";
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