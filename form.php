<?php

require_once('./connect.php');

session_save_path('./tmp');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['name']) && !empty($_POST['tel']) && !empty($_POST['email'])) {

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $tel = mysqli_real_escape_string($conn, $_POST['tel']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $sql = "INSERT INTO `applications` (`id`, `timestamp`, `name`, `phone`, `email`) VALUES (NULL, NULL, '$name', '$tel', '$email')";

        if (mysqli_query($conn, $sql)) {
            $alert = '<div class="p-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                <span class="font-medium">Действие выполнено успешно!</span>
            </div>';

            $_SESSION['form_message'] = $alert;

            header('Location: index.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
