# PHP_MySQL教學

## 開始之前

### 你必須環境 *XAMPP* 安裝完成
* APACHE + MySQL Server + PHP

### 你必須要 *DBMS資料庫管理系統* 的使用經驗
* MySQL操作、SQL基本語法

### 你必須要有 HTML 編輯的基礎
* HTML + CSS

## 學習範例

### 【範例】連接MySQL伺服器
* 參考w3schools範例[PHP Connect to MySQL 連接MySQL伺服器](https://www.w3schools.com/php/php_mysql_connect.asp)
```
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    // 建立連線
    $conn = new mysqli($servername, $username, $password);
    
    // 檢查連線
    if ($conn->connect_error) {
      die("<p>連線失敗</p>" . $conn->connect_error);
    }
    echo "<p>連線成功</p>";
    ?>
```

### 【範例】建立MySQL資料庫
* 參考w3schools範例[PHP Create a MySQL Database 建立MySQL資料庫](https://www.w3schools.com/php/php_mysql_create.asp)
* 這個程式無法被重復執行，會發生 **資料庫名字重覆** 的錯誤；想要重覆行執要先刪除myDB。
* 如果你在做專題，通常建立你專題的資料庫，應該在 phpAdmin 裡操作完成，不會寫一支程式的。
```
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    // 建立連線
    $conn = new mysqli($servername, $username, $password);
    // 檢查連線
    if ($conn->connect_error) {
      die("<p>連線失敗</p>" . $conn->connect_error);
    }

    // 建立資料庫
    $sql = "CREATE DATABASE myDB";
    if ($conn->query($sql) === TRUE) {
      echo "<p>成功建立資料庫</p>";
    } else {
      echo "<p>失敗建立資料庫</p>" . $conn->error;
    }

    // 結束連線
    $conn->close();
    echo "<p>結束連線</p>";
    ?>
```

### 【範例】以PHP新增表格
* 參考w3schools範例[PHP MySQL Create Table 以PHP新增表格](https://www.w3schools.com/php/php_mysql_create_table.asp)
* 這個程式無法被重復執行，會發生 **表格名稱重覆** 的錯誤；想要重覆行執要先刪除原table。
* 如果你在做專題，通常建立你專題的資料庫表格，應該在 phpAdmin 裡操作完成，不會寫一支程式的。
* 如果你在做專題，建立表格後一定要將SQL語法存起來備用。
```
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myDB";

    // 建立連線
    $conn = new mysqli($servername, $username, $password, $dbname);
    // 檢查連線
    if ($conn->connect_error) {
      die("<p>連線失敗" . date("Y-m-d H:i:s") . "</p>" . $conn->connect_error);
    }

    // 以SQL新增表格
    $sql = "CREATE TABLE MyGuests (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
      echo "<p>表格MyGuests新增成功" . date("Y-m-d H:i:s") . "</p>";
    } else {
      echo "<p>表格MyGuests新增失敗" . date("Y-m-d H:i:s") . "</p>" . $conn->error;
    }
    // 結束連線
    $conn->close();
    echo "<p>結束連線" . date("Y-m-d H:i:s") . "<p>";
    ?>
```

### 【範例】以PHP新增記錄
* 參考w3schools範例[PHP MySQL Insert Data 以PHP新增記錄](https://www.w3schools.com/php/php_mysql_insert.asp) 
```
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myDB";

    // 建立連線
    $conn = new mysqli($servername, $username, $password, $dbname);
    // 檢查連線
    if ($conn->connect_error) {
        die("<p>連線失敗" . date("Y-m-d H:i:s") . "</p>" . $conn->connect_error);
    }

    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com')";

    if ($conn->query($sql) === TRUE) {
      echo "<p>新記錄新增成功" . date("Y-m-d H:i:s") . "</p>";
    } else {
      echo "<p>錯誤： " . $sql . date("Y-m-d H:i:s") .  "</p>" . $conn->error ;
    }
    // 結束連線
    $conn->close();
    echo "<p>結束連線" . date("Y-m-d H:i:s") . "<p>";
    ?>
```

### 【範例】以PHP新增多筆記錄
* 參考w3schools範例[PHP MySQL Insert Multiple Records 新增多筆記錄](https://www.w3schools.com/php/php_mysql_insert_multiple.asp) 
```
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myDB";

    // 建立連線
    $conn = new mysqli($servername, $username, $password, $dbname);
    // 檢查連線
    if ($conn->connect_error) {
        die("<p>連線失敗" . date("Y-m-d H:i:s") . "</p>" . $conn->connect_error);
    }

    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('John', 'Smith', 'johnsmith@example.com');";
    $sql .= "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('Jane', 'Doe', 'janedoe@example.com');";
    $sql .= "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('三', '張', 'chang3@example.com');";
    $sql .= "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('四', '李', 'Lee4@example.com')";

    if ($conn->multi_query($sql) === TRUE) {
        echo "<p>多筆新記錄新增成功" . date("Y-m-d H:i:s") . "</p>";
    } else {
        echo "<p>錯誤： " . $sql . date("Y-m-d H:i:s") .  "</p>" . $conn->error ;
    }
    // 結束連線
    $conn->close();
    echo "<p>結束連線" . date("Y-m-d H:i:s") . "<p>";
    ?>
```

### 【範例】從 HTML 表單傳送到 PHP。
* 參考w3schools範例[PHP - A Simple HTML Form 最基礎HTML表單](https://www.w3schools.com/php/php_forms.asp)
* 這個範例在 .html 裡建立一個 Form，將姓名及EMAIL傳給 welcome.php，瀏覽器顯示姓名及email
* 這是一個重要的範例，建立 HTML 及 PHP 的橋樑

HTML檔如下，可以任意命名：

```
    <! .html檔>
    <html>
        <head><meta charset="utf-8"></head>
        <body>
            <form action="welcome.php" method="post">
            姓名：<input type="text" name="name"><br>
            電子郵件：<input type="text" name="email"><br>
            <input type="submit">
            </form>
        </body>
    </html>
```

welcome.php內容如下：

```
    <! welcom.php檔>
    <html>
        <head><meta charset="utf-8"></head>
        <body>
            <p>您好！歡迎<?php echo $_POST["name"]; ?></p>
            <p>您的電子郵件為：<?php echo $_POST["email"]; ?></p>
            <p>本範例從 HTML 的 FORM 接收2個變數。</p>
        </body>
    </html>
```
