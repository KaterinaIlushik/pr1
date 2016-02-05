<?php
/**
 * Created by PhpStorm.
 * User: XTreme.ws
 * Date: 29.01.2016
 * Time: 18:20
 */
session_start(); //начало сессии
require 'Config.php';
if (empty($_SESSION['auth'])){
        $_SESSION['auth'] = 0; // создаём в массиве новую переменную по ключу ['auth']
}

if ($_SESSION['auth']==0){//если пользовател не аутентифицирован
    $form=join("", file($templatesdir."Csvhome.html")); //join - сливает строки в одну.
    echo $form;
}
elseif ($_SESSION['auth']==2){
    $form2=join("", file($templatesdir."Wadmin.html"));
    echo $form2;
}
else {
    $form1=join("", file($templatesdir."welcome.html")); //join - сливает строки в одну.
    echo $form1;

}