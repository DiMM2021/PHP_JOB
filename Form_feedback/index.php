<?php
session_start();

$errorEmail = $errors[] = $_SESSION['error_email'] ?? null;
unset($_SESSION['error_email']);

$errorName = $errors[] = $_SESSION['error_name'] ?? null;
unset($_SESSION['error_name']);

$errorRating = $errors[] = $_SESSION['error_rating'] ?? null;
unset($_SESSION['error_rating']);

$errorСomment = $errors[] = $_SESSION['error_comment'] ?? null;
unset($_SESSION['error_comment']);

$success = $_SESSION['success'] ?? null;
unset($_SESSION['success']);

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Форма обратной связи</title>
</head>

<body>
    <form class="form" method="POST" action="feedback.php">
        <h2 class="profile">Форма обратной связи</h2>
        <label>Email:</label>
        <input class="input" type="email" name="email" required><br>

        <label>Имя:</label>
        <input class="input" type="text" name="name" maxlength="20" required><br>

        <label>Оценка страницы (от 0 до 10):</label>
        <input class="input" type="number" name="rating" min="0" max="10" required><br>

        <label>Комментарий:</label>
        <textarea class="input" name="comment" maxlength="500" required></textarea><br>

        <input class="button" type="submit" value="Отправить">

        <?php
        if ($errorEmail) {
            echo '<p class="msg_error"> ' . $errorEmail . ' </p>';
        }

        if ($errorName) {
            echo '<p class="msg_error"> ' . $errorName . ' </p>';
        }

        if ($errorRating) {
            echo '<p class="msg_error"> ' . $errorRating . ' </p>';
        }

        if ($errorСomment) {
            echo '<p class="msg_error"> ' . $errorСomment . ' </p>';
        }

        if ($success) {
            echo '<p class="msg_success"> ' . $success . ' </p>';
        }
        ?>
    </form>
</body>

</html>