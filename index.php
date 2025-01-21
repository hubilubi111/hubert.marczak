<?php
$conn = new mysqli("localhost", "root", "", "praktyki_login");


if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}

$response = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $input_login = isset($_POST['login']) ? $_POST['login'] : '';
    $input_password = isset($_POST['haslo']) ? $_POST['haslo'] : '';


    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $input_login, $input_password);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        $response = "Logowanie udane";
    } else {
        $response = "Nieprawidłowy login lub hasło.";
    }

    $stmt->close();
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
    
    <?php if (!empty($response)): ?>
        <p <?= $response === "Logowanie udane"  ?>;>
            <?= htmlspecialchars($response); ?>
        </p>
    <?php endif; ?>
    
    <form method="POST">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required>
        <br><br>

        <label for="haslo">Hasło:</label>
        <input type="password" id="haslo" name="haslo" required>
        <br><br>

        <button type="submit">Zaloguj</button>
    </form>
</body>
</html>
