```php
<?php

include("database.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <h2>Welcome to this Form</h2>

        Username:
        <br>
        <input type="text" name="username" id="">
        <br>

        Password:
        <input type="password" name="password" id="">
        <br>

        <input type="submit" name="submit" value="Register">

    </form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = filter_input(
        INPUT_POST,
        "username",
        FILTER_SANITIZE_SPECIAL_CHARS
    );

    $password = filter_input(
        INPUT_POST,
        "password",
        FILTER_SANITIZE_SPECIAL_CHARS
    );

    if (empty($username)) {

        echo "Enter a username";

    } elseif (empty($password)) {

        echo "Enter a password";

    } else {

        $hash = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        $sql = "INSERT INTO users (username, password)
                VALUES ('$username', '$hash')";

        try {

            mysqli_query($conn, $sql);

            echo "User is registered";

        } catch (mysqli_sql_exception) {

            echo "There is an error";
        }
    }
}

mysqli_close($conn);

?>

</body>

</html>
```
