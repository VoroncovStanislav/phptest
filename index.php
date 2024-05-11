<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    // Проверка заполнения полей формы
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Формируем тело сообщения
        $body = "Имя: " . $name . "\n";
        $body .= "Email: " . $email . "\n";
        $body .= "Сообщение: " . $message;

        // Отправляем сообщение на указанный email
        $to = "stanislavvoroncov52@gmail.com"; // Замените на нужный email
        $subject = "Новое сообщение с сайта";
        $headers = "From: " . $email; // Отправитель - email отправителя формы

        if (mail($to, $subject, $body, $headers)) {
            echo "Сообщение успешно отправлено!";
        } else {
            echo "Ошибка при отправке сообщения.";
        }
    } else {
        echo "Пожалуйста, заполните все поля формы.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Форма обратной связи</title>
</head>
<body>
    <h2>Форма обратной связи</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Имя: <input type="text" name="name"><br>
        Email: <input type="email" name="email"><br>
        Сообщение: <textarea name="message"></textarea><br>
        <input type="submit" name="submit" value="Отправить">
    </form>
</body>
</html>