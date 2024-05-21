<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Login</title>
</head>

<body>
    <?php
    session_start();
    $is_invalid = true;
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $mysqli = require __DIR__ . "/db.php";

        // query e insieme c'è la funzione per verificare che i dati in input siano sicuri 
        $sql = sprintf("SELECT * FROM user WHERE email = '%s'", $mysqli->real_escape_string($_POST["email"]));

        //eseguire la query sql
        $result = $mysqli->query($sql);

        //estrarre i dati in un array associativo in base alla query
        $user = $result->fetch_assoc();


        //verifica se l'utente è corretto
        if ($user) {
            if (password_verify($_POST["password"], $user["password_hash"])) {
                setcookie("username", $user["email"], time() + 3600, "/");
                $is_invalid = true;
                header('Location: index.php');
            } else{
                $is_invalid = false;
            }
        } else {
            $is_invalid = false;
        }
    }
    ?>
    <h1>Login</h1>
    

    <form method="post">
        <label style="color: #000000;" for="email">Email: </label>
        <input type="email" name="email" id="email" required>

        <label style="color: #000000;" for="password">Password: </label>
        <input type="password" name="password" id="password" required>
        <?php if (!$is_invalid) : ?>
        <p style="color: #ff0000;">Invalid login</p>
    <?php endif; ?>
        <div class="buttoncont">
            <button>Login</button>
            <button><a style="color: #ffffff;" href="Subscribe.php">Register</a></button>
        </div>
    </form>
</body>

</html>