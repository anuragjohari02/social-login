<?php
session_start();

$config = require_once __DIR__ . '/../app/config/config.php';
$baseUrl = rtrim($config['APP_URL'], '/');
?>

<h1>Landing Page</h1>

<?php if (isset($_SESSION['user'])) : ?>
    <h3>Welcome, <?php echo htmlspecialchars($_SESSION['user']['name']); ?>!</h3>
    <p>Email: <?php echo htmlspecialchars($_SESSION['user']['email']); ?></p>

    <form action="<?php echo $baseUrl; ?>/logout.php" method="post">
        <button type="submit">Logout</button>
    </form>

<?php else : ?>

    <p>You are not logged in.</p>
    <a href="<?php echo $baseUrl; ?>/login.php">Go to Login</a>

<?php endif; ?>