<?php

require_once ("templates/data.php");
require_once ("templates/function.php");

$lot = null;

if (isset($_GET["id"])) {
    $lotId = $_GET["id"];

    foreach ($arrayDataLots as $item) {
        if ($item["id"] == $lotId) {
            $lot = $item;

            break;
        }
    }
}

if (!$lot) {
    http_response_code(404);
}

$pageContent = includeTemplate("templates/lotTemplate.php",['lot' => $lot]);
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
