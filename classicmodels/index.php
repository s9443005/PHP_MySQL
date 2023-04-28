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
            <?php include "connectDB.php"; ?>
            <!-- 邊欄右BEGIN -->
            <div class="col py-3">
                <h1>儀表板</h1>
                <hr>

                <div class="row">
                    <div class="card m-3 p-3 shadow round-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fs-2 bi-people px-3 text-info"></i>顧客</h5>
                            <?php
                            $sql = "SELECT count(*) as totalCustomers FROM customers";
                            $result = $conn->query($sql);
                            $row    = $result->fetch_assoc();
                            echo "<p class='card-text'>J站顧客數：" . $row['totalCustomers'] . "</p>";
                            ?>
                            <a href="#" class="btn btn-primary">更多...</a>
                        </div>
                    </div>
                    <div class="card m-3 p-3 shadow round-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fs-2 bi-boxes px-3 text-info"></i></i>產品線</h5>
                            <?php
                            $sql = "SELECT count(*) as totalproductlines FROM productlines";
                            $result = $conn->query($sql);
                            $row    = $result->fetch_assoc();
                            echo "<p class='card-text'>J站產品線：" . $row['totalproductlines'] . "</p>";
                            ?>
                            <a href="#" class="btn btn-primary">更多...</a>
                        </div>
                    </div>
                    <div class="card m-3 p-3 shadow round-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fs-2 bi-box-seam px-3 text-info"></i></i>產品</h5>
                            <?php
                            $sql = "SELECT count(*) as totalproducts FROM products";
                            $result = $conn->query($sql);
                            $row    = $result->fetch_assoc();
                            echo "<p class='card-text'>J站產品數：" . $row['totalproducts'] . "</p>";
                            ?>
                            <a href="#" class="btn btn-primary">更多...</a>
                        </div>
                    </div>
                    <div class="card m-3 p-3 shadow round-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fs-2 bi-calendar3 px-3 text-info"></i></i>訂單</h5>
                            <?php
                            $sql = "SELECT count(*) as totalorders FROM orders";
                            $result = $conn->query($sql);
                            $row    = $result->fetch_assoc();
                            echo "<p class='card-text'>J站訂單數：" . $row['totalorders'] . "</p>";
                            ?>
                            <a href="#" class="btn btn-primary">更多...</a>
                        </div>
                    </div>
                    <div class="card m-3 p-3 shadow round-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fs-2 bi-coin px-3 text-info"></i>支付記錄</h5>
                            <?php
                            $sql = "SELECT count(*) as totalpayments FROM payments";
                            $result = $conn->query($sql);
                            $row    = $result->fetch_assoc();
                            echo "<p class='card-text'>J站支付記錄：" . $row['totalpayments'] . "</p>";
                            ?>
                            <a href="#" class="btn btn-primary">更多...</a>
                        </div>
                    </div>
                    <div class="card m-3 p-3 shadow round-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fs-2 bi-house-door-fill px-3 text-info"></i>分公司管理</h5>
                            <?php
                            $sql = "SELECT count(*) as totaloffices FROM offices";
                            $result = $conn->query($sql);
                            $row    = $result->fetch_assoc();
                            echo "<p class='card-text'>J站分公司數：" . $row['totaloffices'] . "</p>";
                            ?>
                            <a href="#" class="btn btn-primary">更多...</a>
                        </div>
                    </div>
                    <div class="card m-3 p-3 shadow round-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fs-2 bi-person-vcard px-3 text-info"></i>內部員工</h5>
                            <?php
                            $sql = "SELECT count(*) as totalemployees FROM employees";
                            $result = $conn->query($sql);
                            $row    = $result->fetch_assoc();
                            echo "<p class='card-text'>J站員工數：" . $row['totalemployees'] . "</p>";
                            ?>
                            <a href="#" class="btn btn-primary">更多...</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "disconnectDB.php"; ?>
            <!-- 邊欄右END -->

        </div>
    </div>
</body>

</html>