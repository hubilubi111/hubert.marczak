<?php
$login = "admin";
$haslo = "test";

$odpowiedz = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $logininput = $_POST['login'];
    $hasloinput = $_POST['haslo'];

    if ($logininput === $login && $hasloinput === $haslo) {
        $odpowiedz = "Logowanie udane";
    } else {
        $odpowiedz = "Nieprawidłowy login lub hasło.";
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
</head>
<body>
    <h1>Formularz logowania</h1>
    
    <?php if (!empty($odpowiedz)): ?>
        <p <?= $odpowiedz === "Logowanie udane";?>>
            <?= htmlspecialchars($odpowiedz); ?>
        </p>
    <?php endif; ?>
    
    <form method="POST">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required>
        <br><br>

        <label for="haslo">Hasło:</label>
        <input type="haslo" id="haslo" name="haslo" required>
        <br><br>

        <button type="submit">Zaloguj</button>
    </form>
</body>
</html>