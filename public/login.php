<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
	<style>
		body {
			background: #f5f6fa;
			font-family: 'Roboto', sans-serif;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			margin: 0;
		}
		.login-container {
			background: #fff;
			padding: 32px 28px;
			border-radius: 12px;
			box-shadow: 0 4px 16px rgba(0,0,0,0.08);
			width: 350px;
		}
		.login-container h2 {
			margin-bottom: 24px;
			font-weight: 700;
			color: #222;
			text-align: center;
		}
		.form-group {
			margin-bottom: 18px;
		}
		.form-group label {
			display: block;
			margin-bottom: 6px;
			color: #555;
		}
		.form-group input {
			width: 100%;
			padding: 10px;
			border: 1px solid #ddd;
			border-radius: 6px;
			font-size: 16px;
		}
		.login-btn {
			width: 100%;
			padding: 12px;
			background: #4e73df;
			color: #fff;
			border: none;
			border-radius: 6px;
			font-size: 16px;
			font-weight: 700;
			cursor: pointer;
			margin-top: 8px;
			transition: background 0.2s;
		}
		.login-btn:hover {
			background: #375ab7;
		}
		.divider {
			text-align: center;
			margin: 18px 0;
			color: #aaa;
			position: relative;
		}
		.divider:before, .divider:after {
			content: '';
			display: inline-block;
			width: 40px;
			height: 1px;
			background: #ddd;
			vertical-align: middle;
			margin: 0 8px;
		}
		.google-btn {
			display: flex;
			align-items: center;
			justify-content: center;
			width: 100%;
			padding: 12px;
			background: #fff;
			border: 1px solid #ddd;
			border-radius: 6px;
			font-size: 16px;
			font-weight: 500;
			cursor: pointer;
			transition: background 0.2s;
			text-decoration: none;
			color: #444;
		}
		.google-btn:hover {
			background: #f1f1f1;
		}
		.google-logo {
			width: 22px;
			height: 22px;
			margin-right: 10px;
		}
	</style>
</head>
<body>
	<div class="login-container">
		<h2>Login</h2>
		<form method="post" action="login_handler.php">
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" id="email" name="email" required>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" id="password" name="password" required>
			</div>
			<button type="submit" class="login-btn">Login</button>
		</form>
		<div class="divider">or</div>
		<a href="callback.php?provider=Google" class="google-btn">
			<img src="https://upload.wikimedia.org/wikipedia/commons/4/4a/Logo_2013_Google.png" alt="Google Logo" class="google-logo">
			Login with Google
		</a>
	</div>
</body>
</html>
