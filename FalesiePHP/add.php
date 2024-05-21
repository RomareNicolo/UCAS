<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add</title>
    <?php
    if (!isset($_COOKIE['username'])) {
        header("location: login.php");
        exit;
    }
    ?>
</head>

<body>
    <header>
        <h1>Falesie di
            <?php
            $mysqli = require __DIR__ . "/db.php";
            $id_utente = $mysqli->real_escape_string($_COOKIE["username"]);
            $sql = "SELECT * FROM user WHERE email = '$id_utente'";
            $result = $mysqli->query($sql);
            $user = $result->fetch_assoc();
            echo $user["name"];
            ?>
        </h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php" id="home">Home</a></li>
            <?php
            if (!isset($_COOKIE["username"])) {
                echo "<li><a href='login.php' id='login'>Accedi</a></li>";
                echo "<li><a href='subscribe.php' id='register'>Registrati</a></li>";
            } else {
                $utente = $_COOKIE["username"];
                echo "<li><a href='profile.php' id='login'>$utente</a></li>";
                echo "<li><a href='login.php' id='register'>Esci</a></li>";
            }
            ?>
        </ul>
    </nav>

    <section id="falesie-form-section">
        <h2 style="text-align: center;">Aggiungi una nuova falesia</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="falesia-name">Nome falesia:</label>
            <input type="text" name="falesia-name" required><br><br>

            <label for="difficolta">Difficoltà (1-5):</label>
            <input type="number" min="1" max="5" name="difficolta" required></textarea><br><br>

            <label for="falesia-description">Descrizione:</label>
            <input type="text" name="falesia-description" required></textarea><br><br>

            <label for="annoApertura">Anno apertura:</label>
            <input type="number" min="1950" max="2024" name="annoApertura" required></textarea><br><br>

            <input type="submit" value="Aggiungi Falesia">
        </form>
    </section>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $is_valid = true;
        $proprietario = $user["name"];
        $name = $_POST["falesia-name"];
        $difficolta = $_POST["difficolta"];
        $annoapertura = $_POST["annoApertura"];
        $descrizione = $_POST["falesia-description"];
        $mysqli = require __DIR__ . "/db.php";

        // Preparazione e esecuzione della query
        $sql = "INSERT INTO falesie (Proprietario, Name, Difficoltà, Descrizione, AnnoApertura) VALUES ('$proprietario', '$name', '$difficolta', '$descrizione', '$annoapertura')";

        $stmt = $mysqli->stmt_init();
        if (!$stmt->prepare($sql)) {
            die("SQL error: " . $mysqli->error);
        }

        if ($mysqli->query($sql) === TRUE) {
            echo "Falesia aggiunta con successo!";
        } else {
            echo "Errore nell'aggiunta della falesia: " . $mysqli->error;
        }
        header('Location: profile.php');
        // Chiudi la connessione
        $mysqli->close();
    }
    ?>
</body>

</html>