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
            <h1>分公司手風琴總覽</h1><hr>
            <div class="accordion" id="accordionExample"><!-- 手風琴BEGIN -->
            <?php include "connectDB.php"; ?>
            <?php
            $sql = "SELECT * FROM offices;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $i = 0;
                while($row = $result->fetch_assoc()) {
                    $i = $i + 1;
                    echo "<div class='accordion-item m-1'><!-- 手風琴項目BEGIN -->";
                    echo "<h2 class='accordion-header' id='heading" .$i. "'>";
                    echo "<button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapse" . $i . "'  aria-expanded='true' aria-controls='collapse" . $i . "'>";
                    echo "第" . $row['officeCode'] . "號分公司" . $row['city'];
                    echo "</button>";
                    echo "</h2>";
                    echo "<div id='collapse" . $i . "' class='accordion-collapse collapse' aria-labelledby='heading" . $i . "' data-bs-parent='#accordionExample'>";
                    echo "<div class='accordion-body'>";
                    echo "<table class='table table-hover'>";
                    echo "<tr>";
                    echo "<th class='bg-primary text-white'>分公司編號</th>";
                    echo "<th class='bg-primary text-white'>城市</th>";
                    echo "<th class='bg-primary text-white'>電話</th>";
                    echo "<th class='bg-primary text-white'>住址一</th>";
                    echo "<th class='bg-primary text-white'>住址二</th>";
                    echo "<th class='bg-primary text-white'>州</th>";
                    echo "<th class='bg-primary text-white'>國家</th>";
                    echo "<th class='bg-primary text-white'>郵遞區號</th>";
                    echo "<th class='bg-primary text-white'>區域</th>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>".$row['officeCode']."</td>";
                    echo "<td>".$row['city']."</td>";
                    echo "<td>".$row['phone']."</td>";
                    echo "<td>".$row['addressLine1']."</td>";
                    echo "<td>".$row['addressLine2']."</td>";
                    echo "<td>".$row['state']."</td>";
                    echo "<td>".$row['country']."</td>";
                    echo "<td>".$row['postalCode']."</td>";
                    echo "<td>".$row['territory']."</td>";
                    echo "</tr>";
                    echo "</table>";

                    /* 以下新增1個connection來存取本分公司員工姓名*/
                    $conn2 = new mysqli($servername, $username, $password, $dbname);
                    if ($conn2->connect_error) {
                        die("Connection failed: " . $conn2->connect_error);
                    }
                    $sql2 = "SELECT * FROM employees where officeCode='".$row['officeCode']."';";
                    //echo $sql2;
                    $result2 = $conn2->query($sql2);
                    echo "分公司員工數：" . $result2->num_rows;
                    echo "<div class='col-md-6'><table class='table table-hover'>";
                    if ($result->num_rows > 0) {
                        echo "<tr>";
                        echo "<th class='bg-primary text-white'>員工編號</th>";
                        echo "<th class='bg-primary text-white'>員工姓名</th>";
                        echo "<tr>";
                        while($row2 = $result2->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><a href='#'>".$row2['employeeNumber']."</a></td>";
                            echo "<td>".$row2['firstName']." ".$row2['lastName']."</td>";
                            echo "</tr>";
                        }
                        echo "</table></div>";
                    }
                    $conn2->close();
                    /* 以上新增1個connection來存取本分公司員工姓名*/
                    echo "</div>";
                    echo "</div>";
                    echo "</div><!-- 手風琴項目END -->";
                }
            }
            ?>

            <?php


            ?>
            <?php include "disconnectDB.php"; ?>
            </div><!-- 手風琴END -->
            </div><!-- 邊欄右END -->
            

        </div><!-- ROW結束 -->
    </div><!-- CONTAINER結束 -->
</body>

</html>