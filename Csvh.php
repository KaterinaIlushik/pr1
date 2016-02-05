<?php
/**
 * Created by PhpStorm.
 * User: XTreme.ws
 * Date: 29.01.2016
 * Time: 0:40
 */
session_start();
require 'Config.php';

if (isset($_GET['login'])&&($_GET['password'])) {
    $h = fopen($db, 'a+');
    for ($i = 0; $p = fgetcsv($h, 1024, ','); $i++) {
        if ($_GET['login'] == $p[0] && $_GET['password'] == $p[1]) {

            /*
             * $p[0]- здесь нужна переменная, функция которой в многомерном массиве $p обращается каждому первому элементу
             * (с ключом 0) его массивов и выдаст true в случае совпадения.
             * 1) Построчно перебрать первые элементы всех массивов в массиве $p.
             * 2) Если есть Тrue перейти к след шагу, если нет -echo 'Wrong login or password'.

             * $p[1] -здесь нужна переменная, которая обратится ко второму элементу массива (с ключом 1), где в предыдущем случае было true, который входит в массив $p.
             * 1) определить строку, где было true в предыдущем шаге.
             * 2) выдать к сравнению значение ее второго элемента (с ключом 1)
             *
             */
            if ($_GET['login'] == 'vitya'){
                $_SESSION['auth']=2;
            }
            else {
                $_SESSION['auth']=1;
            }
            break;
        }
    }
    if ($_SESSION['auth']==1 || $_SESSION['auth']==2)
    {
        header('Location: index.php'); //переадресация на index.php

    }
    else {
        echo 'Wrong login or password';
    }
    fclose($h);
}

else {
        echo 'Error';
    }

?>





