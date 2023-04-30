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
            <h1>前教學--分公司手風琴總覽</h1><hr>
            <div class="accordion" id="accordionExample"><!-- 手風琴BEGIN -->
            <?php include "connectDB.php"; ?>
            <?php
            $sql = "SELECT * FROM offices;";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc()
            ?>
            <div class="accordion-item m-1">
                <h2 class="accordion-header" id="headingOne"> <!--headingOne需要PHP處理-->
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        <?php echo $row['officeCode'] . "號分公司" . $row['city'] . "按我更多..." ; ?>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample"> <!--headingOne需要PHP處理-->
                    <div class="accordion-body">
                        <?php
                        echo $row['officeCode'];
                        echo $row['city'];
                        echo $row['phone'];
                        echo $row['addressLine1'];
                        echo $row['addressLine2'];
                        echo $row['state'];
                        echo $row['country'];
                        echo $row['postalCode'];
                        echo $row['territory'];
                        ?>
                    </div>
                </div>
            </div>

            <?php

/* 請從 officesAll.php開始
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