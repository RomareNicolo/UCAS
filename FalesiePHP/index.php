<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Index</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_COOKIE["username"])) {

        $mysqli = require __DIR__ . "/db.php";

        // Assicurati di sanitizzare l'input per evitare SQL injection
        $id_utente = $mysqli->real_escape_string($_COOKIE["username"]);

        $sql = "SELECT * FROM user WHERE email = '$id_utente'";

        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();

        if (!$user) {
            header('Location: login.php');
        }
    }
    ?>

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
                <li><a href="creator.php" id="creatore">Creatore</a></li>
                <li><a href="add.php" id="aggiungi">Aggiungi</a></li>
                <?php
                if (!isset($_COOKIE["username"])) {
                    echo "<li><a href='login.php' id='login'>Accedi</a></li>";
                    echo "<li><a href='register.php' id='register'>Registrati</a></li>";
                } else {
                    $utente = $_COOKIE["username"];
                    echo "<li><a href='profile.php' id='login'>$utente</a></li>";
                    echo "<li><a href='login.php'  id='Esci'>Esci</a></li>";
                }
                ?>

            </ul>
        </nav>
        <h2>Le falesie della community</h2>
        <section id="falesie">
            <?php
            $mysqli = require __DIR__ . "/db.php";
            $sql = sprintf("SELECT * FROM falesie");
            $result = $mysqli->query($sql);
            
            if ($result->num_rows > 0) {
                // Inizio della lista HTML
                echo "<ul>";
            
                // Iterazione attraverso i risultati e stampa delle righe
                while($row = $result->fetch_assoc()) {
                    // Creazione di un blocco separato per ogni riga
                    echo "<li>Proprietario: " . $row["Proprietario"] . "<br>Nome falesia: " . $row["Name"] . "<br>Difficoltà: " . $row["Difficoltà"] . "<br>Descrizione: " . $row["Descrizione"] . "<br>Anno apertura: " . $row["AnnoApertura"] . "<br>" . "</li>";
                    echo "<br> <br>";
                }
            
                // Fine della lista HTML
                echo "</ul>";
            } else {
                echo "Nessun risultato trovato";
            }

            ?>
            </ul>
            </nav>

        </section>
        
    </body>
    <footer>
        <p>&copy; 2024 Falesie di Vicenza</p>
    </footer>
</html>