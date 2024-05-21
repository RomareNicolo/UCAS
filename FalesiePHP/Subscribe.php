<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Subscribe</title>
</head>
<body>
    <h1>
        Subscribe
    </h1>
    <form action="ProcessSubscribe.php" method="post">
        <div>
            <label style="color: #000000;" for="name">Name: </label>
            <input type="text" id="name" name="name" required> 
        </div>

        <div>
            <label style="color: #000000;" for="name">Email: </label>
            <input type="email" id="email" name="email" required> 
        </div>

        <div>
            <label style="color: #000000;" for="name">Password: </label>
            <input type="password" id="password" name="password" required> 
        </div>
        <div>
            <label style="color: #000000;" for="passwords_confirmation">Repeat Password: </label>
            <input type="password" id="password_confirmation" name="password_confirmation" required> 
        </div>
        <button>Submit</button>
        <button><a style="color: #ffffff;" href="login.php">Back</a></button>
    </form>
</body>
</html>