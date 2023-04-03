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
檢查連線
    // 檢查連線
    if ($conn->connect_error) {
      die("<p>連線失敗</p>" . $conn->connect_error);
    }
    echo "<p>連線成功</p>";
    ?>
```

### 【範例】建立MySQL資料庫
* 參考w3schools範例[PHP Create a MySQL Database 建立MySQL資料庫](https://www.w3schools.com/php/php_mysql_create.asp)
```
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    // 建立連線
    $conn = new mysqli($servername, $username, $password);
    // 檢查連線
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
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
```
```

### 【範例】以PHP新增記錄
* 參考w3schools範例[PHP MySQL Insert Data 以PHP新增記錄](https://www.w3schools.com/php/php_mysql_insert.asp) 
```
```

### 【範例】以PHP新增多筆記錄
* 參考w3schools範例[PHP MySQL Insert Multiple Records 新增多筆記錄](https://www.w3schools.com/php/php_mysql_insert_multiple.asp) 
```
```

### 【範例】以PHP新增多筆記錄
* 參考w3schools範例[ex006.php](https://www.w3schools.com/php/php_mysql_prepared_statements.asp) 新增記錄
