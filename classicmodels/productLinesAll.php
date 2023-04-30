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
            <h1>產品線表格總覽</h1><hr>
            <?php include "connectDB.php"; ?>
            <?php
            $sql = "SELECT * FROM productlines;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table class='table'>";
                echo "<tr class='bg-primary text-white'>";
                echo "<td>產品線</td>";
                echo "<td>文字描述</td>";
                echo "<td>HTML描述</td>";
                echo "<td>圖片</td>";
                echo "</tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['productLine'] . "</td>";
                    echo "<td>" . $row['textDescription'] . "</td>";
                    echo "<td>" . $row['htmlDescription'] . "</td>";
                    echo "<td>" . $row['image'] . "</td>";
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