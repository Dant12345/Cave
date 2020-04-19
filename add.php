<?php

require_once ("templates/function.php");
require_once ('templates/data.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lot = $_POST;

    $required = ['lot-name', 'category','message', 'lot-rate', 'lot-step', 'lot-date'];
    $dict = ['lot-name' => "Название", 'category' => "Категория",'message' => "Сообщение",
        'lot-rate' => "Введите начальную цену", 'lot-step' => "Введите шаг ставки",
        'lot-date' => "Введите дату завершения торгов"];
    $errors = [];

    foreach ($_POST as $key => $value) {
        if (in_array($key, $required)) {
            if (!$value) {
                $errors[$dict[$key]] = "Это поле не заполнено";
            }
        }
    }
    if ((!filter_var($lot['lot_step'], FILTER_SANITIZE_NUMBER_INT)) and !isset($errors['lot_step'])){
        $errors['lot_step'] = 'Доступны только цифры';
    }
    if ((!filter_var($lot['lot_date'], FILTER_SANITIZE_NUMBER_INT)) and !isset($errors['lot_date'])){
        $errors['lot_date'] = 'Доступны только цифры';
    }
    if ((!filter_var($lot['price'], FILTER_SANITIZE_NUMBER_INT)) and !isset($errors['price'])){
        $errors['price'] = 'Доступны только цифры';
    }

    if (isset($_FILES['lotImage']['name'])) {
        $path = $_FILES['lotImage']['name'];
        $tmpName = $_FILES['lotImage']['tmp_name'];

//        $fInfo = finfo_open(FILEINFO_MIME_TYPE);
//        $fileType = finfo_file($fInfo, $tmpName);
//        if ($fileType !== "image/gif") {
//            $errors["Файл"] = "Загрузите картинку в формета GIF";
//        } else {
            $res = move_uploaded_file($tmpName, 'img/' . $path);
            $lot['path'] = $path;

       // }
    }
    else {
        $errors["Файл"] = "Вы не загрузили файл";
    }

    if (count($errors)) {
        $pageContent = includeTemplate("templates/add.php", ['lot' => $lot, 'errors' => $errors]);
    }
    else {
        $pageContent = includeTemplate("templates/lotTemplate.php",['lot' => $lot]);
    }


}
else {
    $pageContent = includeTemplate("templates/addTemplate.php", []);
}

$layoutContent = includeTemplate("templates/layout.php" ,
    [   'content' => $pageContent,
        'title' => 'Главная',
        'categoriesLots' => $categoriesLots,
        'isAuth' => $isAuth,
        'userName' => $userName,
        'userAvatar' => $userAvatar,

    ]
);
print($layoutContent);
