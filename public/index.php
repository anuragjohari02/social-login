<?php
session_start();
?>

<h1>Landing Page</h1>

<?php if (isset($_SESSION['user'])) : ?>
    <h3>Welcome, <?php echo htmlspecialchars($_SESSION['user']['name']); ?>!</h3>
    <p>Email: <?php echo htmlspecialchars($_SESSION['user']['email']); ?></p>
    <!-- logout button -->
    <form action="public/logout.php" method="post">
        <button type="submit" class="logout-btn">Logout</button>
    </form>
<?php else : ?>
    <p>You are not logged in.</p>
    <a href="public/login.php">Go to Login</a>
<?php endif; ?>