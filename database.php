<?php

$db_server = "mysql";
$db_user = "root";
$db_pass = getenv("MYSQL_ROOT_PASSWORD");
$db_name = "business_db";

$conn = "";

try {

    $conn = mysqli_connect(
        $db_server,
        $db_user,
        $db_pass,
        $db_name
    );

    echo "You are connected";

} catch (mysqli_sql_exception) {

    echo "Connection lost";
}
?>