<?php
/**
 * Created by PhpStorm.
 * User: XTreme.ws
 * Date: 01.02.2016
 * Time: 19:41
 */
require 'Config.php';

/*$write= fopen($db,'a+');
if ((isset($_POST ['login']) && isset($_POST ['password']))){
    if (!empty($_POST ['login']) && (!empty($_POST ['password']))) {
        $mass= array($_POST ['login'].','.$_POST ['password']);
        foreach ($mass as $kluch) {
            $temp=$kluch."\n";
// далее команда на запись в место к которому обратились (врайт) и то что мы записываем (темп)
            fwrite($write, $temp);
        }
    }
    else {echo 'Введите имя и пароль!';
    }
}
fclose($write);*/



if ((isset($_GET['login'])&&(isset($_GET['password'])))) {
    if (!empty ($_GET['login']) && (!empty ($_GET['password']))) {
        //{
        $h = fopen($db, 'a+');
        //}
        for ($i = 0; $p = fgetcsv($h, 1024, ','); $i++) {
            if (in_array($_GET['login'], $p)) {
                echo "Вы уже зарегистрированы";
                break;
            }
        }
        $mass = array($_GET['login'] . ',' . $_GET['password']);
        foreach ($mass as $line) {
            $l = $line . "\n";
            fwrite($h, $l);
        }
        fclose($h);
    }
    // else{
    //    echo "Вы уже зарегистрированы";
    // }
}
else{
    echo 'Введите регистрационные данные';
}