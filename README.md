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
* 這是一個重要的範例，建立 HTML 及 PHP 的橋樑，請連續學習下一支程式[【範例】從 HTML 表單和 PHP 合併成一支程式](https://github.com/s9443005/PHP_MySQL#%E7%AF%84%E4%BE%8B%E5%BE%9E-html-%E8%A1%A8%E5%96%AE%E5%92%8C-php-%E5%90%88%E4%BD%B5%E6%88%90%E4%B8%80%E6%94%AF%E7%A8%8B%E5%BC%8F)

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

### 【範例】從 HTML 表單和 PHP 合併成一支程式
* 參考w3schools範例[PHP Form Validation 表單驗證](https://www.w3schools.com/php/php_forms.asp)
* 上一支程式[【範例】從 HTML 表單傳送到 PHP](https://github.com/s9443005/PHP_MySQL#%E7%AF%84%E4%BE%8B%E5%BE%9E-html-%E8%A1%A8%E5%96%AE%E5%82%B3%E9%80%81%E5%88%B0-php)的延伸，是必須懂的2支基本程式
```
    <!DOCTYPE HTML>  
    <html>
    <head><meta charset="utf-8"></head>
    <body>  
    <?php
    // 定義及起始變數
    $name = $email = $gender = $comment = $website = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = test_input($_POST["name"]);
      $email = test_input($_POST["email"]);
      $website = test_input($_POST["website"]);
      $comment = test_input($_POST["comment"]);
      $gender = test_input($_POST["gender"]);
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    ?>

    <h2>PHP 表單驗證範例</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
      姓名: <input type="text" name="name">
      <br><br>
      E-mail: <input type="text" name="email">
      <br><br>
      網站: <input type="text" name="website">
      <br><br>
      評論: <textarea name="comment" rows="5" cols="40"></textarea>
      <br><br>
      性別:
      <input type="radio" name="gender" value="female">Female
      <input type="radio" name="gender" value="male">Male
      <input type="radio" name="gender" value="other">Other
      <br><br>
      <input type="submit" name="submit" value="Submit">  
    </form>

    <?php
    echo "<h2>您的輸入:</h2>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $website;
    echo "<br>";
    echo $comment;
    echo "<br>";
    echo $gender;
    ?>

    </body>
    </html>
```

### 【範例】以SQL指令查詢資料庫
* 參考w3schools範例[PHP MySQL Select Data 用SQL指令查詢](https://www.w3schools.com/php/php_mysql_select.asp)
* 請連續學習下一支程式[【範例】]
```
    <!DOCTYPE html>
    <html>
    <body>
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
        //$sql = "SELECT id, firstname, lastname FROM MyGuests";
        $sql = "SELECT id, firstname, lastname FROM MyGuests where firstname='John'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // 輸出每一筆資料(Record或Row)的欄位(Column或Field)
            while($row = $result->fetch_assoc()) {
                echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
            }
            echo "<p>輸出查詢" . date("Y-m-d H:i:s") . "<p>";
        } else {
            echo "0 results";
        }
        // 結束連線
        $conn->close();
        echo "<p>結束連線" . date("Y-m-d H:i:s") . "<p>";
    ?>
    </body>
    </html>
```

* 以上輸出結果，到 mysql> 命令列介面(Command Line Interface)去下指令驗證
```
C:\xampp\mysql\bin>mysql -u root -p
Enter password:
Welcome to the MariaDB monitor.  Commands end with ; or \g.
Your MariaDB connection id is 11
Server version: 10.4.27-MariaDB mariadb.org binary distribution

Copyright (c) 2000, 2018, Oracle, MariaDB Corporation Ab and others.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

MariaDB [(none)]> use myDB
Database changed
MariaDB [myDB]> select * from myguests;
+----+-----------+----------+-----------------------+---------------------+
| id | firstname | lastname | email                 | reg_date            |
+----+-----------+----------+-----------------------+---------------------+
|  1 | John      | Doe      | john@example.com      | 2023-04-04 01:00:51 |
|  2 | John      | Doe      | john@example.com      | 2023-04-04 01:00:57 |
            ...中間略
| 39 | 四        | 李       | Lee4@example.com      | 2023-04-05 19:28:02 |
| 40 | John      | Doe      | john@example.com      | 2023-04-06 16:20:11 |
+----+-----------+----------+-----------------------+---------------------+
40 rows in set (0.007 sec)

MariaDB [myDB]>
```
