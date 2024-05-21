<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Profile</title>
</head>

<body>
<header>
            <h1>Le falesie Vicentine</h1>
        </header>

        <div class="search-container">
            <form action="search.php" method="GET">
                <input type="text" name="query" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </div>
        <nav>

            <ul>

                <li><a href="index.php" id="home">Home</a></li>
                <li><a href="add.php" id="aggiungi">Aggiungi</a></li>
                <?php
                if (!isset($_COOKIE["username"])) {
                    echo "<li><a href='login.php' id='login'>Accedi</a></li>";
                    echo "<li><a href='register.php' id='register'>Registrati</a></li>";
                } else {
                    $utente = $_COOKIE["username"];
                    echo "<li><a href='profile.php' id='login'>$utente</a></li>";
                    echo "<li><a href='login.php' id='register'>Esci</a></li>";
                }
                ?>

            </ul>
        </nav>
            <?php
            session_start();
            if (isset($_COOKIE["username"])) {

                $mysqli = require __DIR__ . "/db.php";

                $id_utente = $mysqli->real_escape_string($_COOKIE["username"]);

                $sql = "SELECT * FROM user WHERE email = '$id_utente'";

                $result = $mysqli->query($sql);
                $user = $result->fetch_assoc();

                if (!$user) {
                    header('Location: login.php');
                }
            }
            $sql = sprintf("SELECT * FROM falesie WHERE Proprietario='$user[name]'");
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0) {
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li>Proprietario: " . $row["Proprietario"] . "<br>Nome falesia: " . $row["Name"] . "<br>Difficoltà: " . $row["Difficoltà"] . "<br>Descrizione: " . $row["Descrizione"] . "<br>Anno apertura: " . $row["AnnoApertura"] . "<br>";
                    echo "<form method='post' action='edit.php'>";
                    echo "<input type='hidden' name='Name' value='" . $row["Name"] . "'>";
                    echo "<button type='submit' style='color: #ffffff;'>Modifica</button>";
                    echo "</form>";
                    
                    echo "<form method='post' action='delete.php'>";
                    echo "<input type='hidden' name='Name' value='" . $row["Name"] . "'>";
                    echo "<button type='submit' style='color: #ffffff;'>Elimina</button>";
                    echo "</form>";
                    echo "</li><br><br>";
                }

                echo "</ul>";
            } else {
                echo "Nessun risultato trovato";
            }

            ?>
</body>

</html>