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
            <h1>產品線手風琴總覽</h1><hr>
            <div class="accordion" id="accordionExample"><!-- 手風琴BEGIN -->
            <?php include "connectDB.php"; ?>
            <?php
            $sql = "SELECT * FROM productlines;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $i = 0;
                while($row = $result->fetch_assoc()) {
                    $i = $i + 1;
                    echo "<div class='accordion-item m-1'><!-- 手風琴項目BEGIN -->";
                    echo "<h2 class='accordion-header' id='heading" .$i. "'>";
                    echo "<button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapse" . $i . "'  aria-expanded='true' aria-controls='collapse" . $i . "'>";
                    echo "產品線：" . $row['productLine'];
                    echo "</button>";
                    echo "</h2>";
                    echo "<div id='collapse" . $i . "' class='accordion-collapse collapse' aria-labelledby='heading" . $i . "' data-bs-parent='#accordionExample'>";
                    echo "<div class='accordion-body'>";
                    echo "<table class='table table-hover'>";
                    echo "<tr>";
                    echo "<th class='bg-primary text-white'>產品線</th>";
                    echo "<th class='bg-primary text-white'>文字描述</th>";
                    echo "<th class='bg-primary text-white'>HTML描述</th>";
                    echo "<th class='bg-primary text-white'>圖片</th>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>" . $row['productLine'] . "</td>";
                    echo "<td>" . $row['textDescription'] . "</td>";
                    echo "<td>" . "NULL" . "</td>";
                    echo "<td>" . "NULL" . "</td>";
                    echo "</tr>";
                    echo "</table>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div><!-- 手風琴項目END -->";
                }
            }
            ?>

            <?php

/*
            if ($result->num_rows > 0) {
                echo "<table class='table'>";
                echo "<tr class='bg-primary text-white'>";
                echo "<td>分公司編號</td>";
                echo "<td>城市</td>";
                echo "<td>電話</td>";
                echo "<td>住址1</td>";
                echo "<td>住址2</td>";
                echo "<td>州</td>";
                echo "<td>國家</td>";
                echo "<td>郵遞區號</td>";
                echo "<td>區域</td>";
                echo "</tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['officeCode'] . "</td>";
                    echo "<td>" . $row['city'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['addressLine1'] . "</td>";
                    echo "<td>" . $row['addressLine2'] . "</td>";
                    echo "<td>" . $row['state'] . "</td>";
                    echo "<td>" . $row['country'] . "</td>";
                    echo "<td>" . $row['postalCode'] . "</td>";
                    echo "<td>" . $row['territory'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
            echo "0 results";
            }*/
            ?>
            <?php include "disconnectDB.php"; ?>
            </div><!-- 手風琴END -->
            </div><!-- 邊欄右END -->
            

        </div><!-- ROW結束 -->
    </div><!-- CONTAINER結束 -->
</body>

</html>