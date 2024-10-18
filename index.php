<?php
session_start();

$error = '';

if (isset($_SESSION['username'])) {
    header('Location: home.php');
    exit;
}

if (isset($_GET['error'])) {
    $error = $_GET['error'];
}

$showRegisterForm = isset($_GET['action']) && $_GET['action'] === 'register';
?>

<?php include 'views/header.phtml'; ?>
    <main>
        <?php
        if ($showRegisterForm) {
            include 'register.phtml';
        } else {
            include 'views/login_form.phtml';
        }
        ?>
    </main>
<?php include 'views/footer.phtml'; ?>
