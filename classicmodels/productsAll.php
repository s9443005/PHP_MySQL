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
            <h1>產品表格總覽</h1><hr>
            <?php include "connectDB.php"; ?>
            <?php
            $sql = "SELECT * FROM products;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='table'>";
                echo "<tr class='bg-primary text-white'>";
                echo "<td>產品編號</td>";
                echo "<td>產品名稱</td>";
                echo "<td>產品線</td>";
                echo "<td>產品規模</td>";
                echo "<td>產品供應商</td>";
                echo "<td>產品描述</td>";
                echo "<td>庫存數量</td>";
                echo "<td>售出價格</td>";
                echo "<td>建議售價</td>";
                echo "</tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['productCode'] . "</td>";
                    echo "<td>" . $row['productName'] . "</td>";
                    echo "<td>" . $row['productLine'] . "</td>";
                    echo "<td>" . $row['productScale'] . "</td>";
                    echo "<td>" . $row['productVendor'] . "</td>";
                    echo "<td>" . $row['productDescription'] . "</td>";
                    echo "<td>" . $row['quantityInStock'] . "</td>";
                    echo "<td>" . $row['buyPrice'] . "</td>";                    
                    echo "<td>" . $row['MSRP'] . "</td>";
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