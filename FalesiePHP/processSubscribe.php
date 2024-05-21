<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>
<body>
    <?php
 
    if($_POST["password"]!== $_POST["password_confirmation"]){
        die("Password must match!");
    }

    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    //query
    $sql = "INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)";
    $emaildb = "SELECT email FROM user";


    $mysqli = require __DIR__ . "/db.php";
    

    $result = $mysqli->stmt_init();
    if(!$result->prepare($emaildb)){
        die("SQL error: " . $mysqli->error);
    }
    $result = $mysqli->query($emaildb);
    
    if ($result->num_rows > 0) {
        // Ciclare attraverso i risultati della query
        while($row = $result->fetch_assoc()) {
            // Confrontare l'email inserita con l'email nel database
            if ($_POST["email"] == $row['email']) {
                die("email already taken");
                break;
            }     
        }
    }
    $result->close();


    //per controllare il codice sql inserito ed evidenziare eventuali errori
    $stmt = $mysqli->stmt_init();
    if(!$stmt->prepare($sql)){
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("sss", $_POST["name"], $_POST["email"],$password_hash);
  

    if($stmt->execute()){
        header("Location: SubscribeOk.php");
        exit;
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
    $stmt->close();
    
    ?>
    </body>
</html>