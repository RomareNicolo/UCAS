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
            session_start();
            $mysqli = require __DIR__ . "/db.php";
            $id_utente = $mysqli->real_escape_string($_COOKIE["username"]);
            $sql = "SELECT * FROM user WHERE email = '$id_utente'";
            $result = $mysqli->query($sql);
            $user = $result->fetch_assoc();
            echo $user["name"];


            $mysqli = require __DIR__ . "/db.php";
            $nomeFalesia = $_POST['Name'];
            $sql = "SELECT * FROM falesie WHERE Name = '$nomeFalesia'";
            $result = $mysqli->query($sql);
            $falesia = $result->fetch_assoc();
            if (!isset($_SESSION['is_valid']))
                $_SESSION['is_valid'] = 0;
            if (!isset($_SESSION['nomeFalesia']))
                $_SESSION['nomeFalesia'] = $falesia["Name"];

            ?>
        </h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php" id="home">Home</a></li>
            <li><a href="add.php" id="aggiungi">Aggiungi</a></li>
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
        <h2 style="text-align: center;">Modifica la falesia</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <label for="difficoltà">Difficoltà (1-5):</label>
            <input type="number" min="1" max="5" value="<?php echo $falesia['Difficoltà']; ?>" name="difficolta" required></textarea><br><br>

            <label for="falesia-description">Descrizione:</label>
            <input type="text" value="<?php echo $falesia['Descrizione']; ?>" name="falesia-description" required></textarea><br><br>

            <label for="annoApertura">Anno apertura (1950-2024):</label>
            <input type="number" min="1950" max="2024" value="<?php echo $falesia['AnnoApertura']; ?>" name="annoApertura" required></textarea><br><br>

            <input type="submit" value="Salva Falesia">
        </form>
    </section>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if ($_SESSION['is_valid'] > 0) {
        $proprietario = $user["name"];
        $Name = $_SESSION['nomeFalesia'];
        $difficolta = $_POST["difficolta"];
        $annoapertura = $_POST["annoApertura"];
        $descrizione = $_POST["falesia-description"];
        
            $mysqli = require __DIR__ . "/db.php";
            // Preparazione e esecuzione della query
            $sql = "UPDATE falesie SET Proprietario = '$proprietario', Name = '$Name', Difficoltà = '$difficolta', Descrizione = '$descrizione', AnnoApertura = '$annoapertura' WHERE name = '$Name'";

            $stmt = $mysqli->stmt_init();
            if (!$stmt->prepare($sql)) {
                die("SQL error: " . $mysqli->error);
            }

            if ($mysqli->query($sql) === TRUE) {
                echo "Falesia aggiunta con successo!";
                header('Location: profile.php');
                unset($_SESSION['is_valid']);
                unset($_SESSION['nomeFalesia']);
            } else {
                echo "Errore nell'aggiunta della falesia: " . $mysqli->error;
            }
            // Chiudi la connessione
            $mysqli->close();
            exit();
        } else {
            $_SESSION['is_valid']++;
        }
    }
    ?>
</body>

</html>