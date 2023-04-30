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
            <h1>前教學--顧客文字總覽</h1><hr>
            <?php include "connectDB.php"; ?>
            <?php
            $sql = "SELECT * FROM customers;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                    echo "<p>";
                    echo $row['customerNumber'];
                    echo $row['customerName'] ;
                    echo $row['contactLastName'];
                    echo $row['contactFirstName'];
                    echo $row['phone'];
                    echo "</p>";
                    //echo "<td>" . $row['addressLine1'] . "</td>";
                    //echo "<td>" . $row['addressLine2'] . "</td>";
                    //echo "<td>" . $row['city'] . "</td>";                    
                    //echo "<td>" . $row['state'] . "</td>";
                    //echo "<td>" . $row['postalCode'] . "</td>";
                    //echo "<td>" . $row['country'] . "</td>";
                    //echo "<td>" . $row['salesRepEmployeeNumber'] . "</td>";
                    //echo "<td>" . $row['creditLimit'] . "</td>";
                }
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