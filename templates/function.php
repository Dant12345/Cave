<?php

/**
 * @param int $number
 * @return string
 */
function getPrice(int $number): string
{
    $number = ceil($number);

    if ($number > 1000) {
        $number = number_format($number , 0, "." , " ");
    }

    $number .= ' <b class="rub">р</b>';
    return $number;
}

/**
 * @param string $path
 * @param array $array
 * @return false|string
 */
function includeTemplate(string $path, array $array)
{
    if (file_exists($path)) {
        ect($array);
        extract($array);
        ob_start();
        require_once($path);
        $html = ob_get_clean();

    }
    else {
        $html = '';
    }
    return $html;

}

/**
 * @param $value
 * @return string
 */
function ect($value)
{
    if (is_array($value)) {
        foreach ($value as $item) {
            ect($item);
        }
    }
    else {
        $value = htmlspecialchars($value);
        return $value;

    }

}


function getLotLifetime ()
{

    $current_date = new DateTime('now');
    $limit_date = new DateTime('tomorrow');
    $interval = $limit_date->diff($current_date);
    return $interval->format("%H:%i");
}

function change($string , $class) {
    $className = isset($errors[$string]) ? $class : " ";
    return $className;
}
