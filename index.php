<?php
date_default_timezone_set("Europe/Moscow");
require_once ("templates/data.php");
require_once ("templates/function.php");

$pageContent = includeTemplate("templates/index.php",['arrayDataLots' => $arrayDataLots,
    'categoriesLots' => $categoriesLots]);
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
