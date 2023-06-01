<?php
    session_start();

    // Получаем данные из формы
    $email = $_POST['email'];
    $name = $_POST['name'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Массив ошибок
    $errors = [];

    // Проверка email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = $_SESSION['error_email'] = "Некорректный email"; 
        header('Location: index.php');
    }

    // Проверка имени
    if (strlen($name) > 20) {
        $errors[] = $_SESSION['error_name'] = "Имя должно содержать не более 20 символов"; 
        header('Location: index.php');
    }

    // Проверка оценки
    if ($rating < 0 || $rating > 10) {
        $errors[] = $_SESSION['error_rating'] = "Оценка должна быть от 0 до 10";
        header('Location: index.php');
    }

    // Проверка комментария
    if (strlen($comment) > 500) {
        $errors[] = $_SESSION['error_comment'] = "Комментарий должен содержать не более 500 символов";
    }

    // Если есть ошибки, выводим их
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        // Сохраняем данные в файл
        $data = "Email: " . $email . "\n";
        $data .= "Имя: " . $name . "\n";
        $data .= "Оценка: " . $rating . "\n";
        $data .= "Комментарий: " . $comment . "\n";
        $data .= "\n";

        $file = fopen("feedback.txt", "a"); 
        fwrite($file, $data); 
        fclose($file); 

        $_SESSION['success'] = "Данные успешно добавлены"; 
        header('Location: index.php');
    }
