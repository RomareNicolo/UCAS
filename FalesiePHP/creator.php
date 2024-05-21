<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Presentazione</title>
</head>
<body>
<header>
        <h1>Benvenuto sul sito delle Falesie Vicentine</h1>
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
<main>
    <p>Yo! Sono Nicolò, l'arrampicatore dietro a questo sito. Sei pronto per un'avventura verticale? Qui si parla solo di falesie, muri di roccia, e scalate epiche!</p>

<p>Ti aspetto con storie avvincenti su falesie spettacolari, suggerimenti sugli attrezzi migliori, e guide sulle vie più pazzesche che ho mai scalato. Che tu sia un novellino o un veterano delle falesie, c'è qualcosa qui per tutti.</p>

<p>Ho messo tutto in un unico posto, giusto per te.</p>

<p>Quindi, prendi il tuo gesso, allaccia le scarpette, e unisciti a me per un'avventura che ti farà vedere la vita da un'angolazione completamente nuova. Grazie per essere qui, e ricorda: le falesie sono fatte per essere scalate!</p>
</main>

</body>
</html>
</body>
</html>