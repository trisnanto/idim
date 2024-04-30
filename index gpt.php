<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            width: 300px;
            margin: 0 auto;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
	</head>
	<body>

		<form action="controller/login.php" method="post">
				<h2>Login</h2>
				<label for="username">Username:</label>
				<input type="text" id="username" name="username" required>
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" required>
				<input type="submit" value="Login">
		</form>
		<br>
		<h4><?php echo $_GET["sError"];?></h4>

	</body>
</html>
