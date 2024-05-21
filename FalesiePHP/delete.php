<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Delete</title>
</head>

<body>
    <?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['Name'])) {
        $nomeFalesia = $_POST['Name'];
        $mysqli = require __DIR__ . "/db.php";
        echo $nomeFalesia;
        $sql = "DELETE FROM falesie WHERE Name = '$nomeFalesia'";
        $result = $mysqli->query($sql);
        header('Location: profile.php');
    }
    ?>
</body>

</html>