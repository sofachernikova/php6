<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Черникова Софья Кирилловна, 201-321</title>
</head>

<body>
    <?php
    $result = '';
    if (isset($_POST['A'])) {
        calculate($_POST['method']);
    }
    if ($result != '') {
        $out_text = 'Ваше ФИО:' . $_POST['fullname'] . '<br>';
        $out_text .= 'номер группы:' . $_POST['number'] . '<br>';
        if ($_POST['about'] = '')
            $out_text .= 'немного о себе:' . $_POST['about'] . '<br>';
        $out_text .= 'Выходные параметры (A,B,C):' . $_POST['A'] . ' ' . $_POST['B'] . ' ' . $_POST['C'] . '<br>';
        $out_text .= 'Метод вычисления:' . $_POST['method'] . '<br>';
        $out_text .= 'Ваш ответ:' . $_POST['answer'] . '<br>';
        $out_text .= 'Ответ вычисленный машиной:' . $result . '<br>';
        if ($_POST['answer'] == $result)
            $out_text .= '<b>Ответ верный!</b>' . '<br>';
        else
            $out_text .= '<b>Ответ не верный!</b>' . '<br>';
        if ($_POST['view'] == 'print')
            echo '<div class="wrapper">' . $out_text . sendemail($out_text) . '</div>';
        else
            echo '<header><img src = "Mospolytech_logo.jpg"></header><body>
                <div class="wrapper">' . $out_text . sendemail($out_text) . '<a href="?fullname=' . $_POST['fullname'] . '&number=' . $_POST['number'] . '">Пройти снова</a></div>
            </body><footer></footer';
    } else include('home.html');


    function sendemail($text)
    {
        if ($_POST['email'] != '') {
            mail($_POST['email'], 'Проверка математических знаний', str_replace('<br>', '\r\n', $text));
            return 'Результат тестирования отправлен на email: ' . $_POST['email'] . '<br>';
        }
        if (isset($_POST['checkemail']) && $_POST['email'] == '') return 'email не введён.<br>';
    }


    function calculate($method)
    {
        global $result;
        $A = $_POST['A'];
        $B = $_POST['B'];
        $C = $_POST['C'];
        switch ($method) {
            case 'Найти минимум':
                $result = $A;
                if ($A > $B) $result = $B;
                if ($B > $C) $result = $C;
                break;
            case 'Найти максимум':
                $result = $A;
                if ($A < $B) $result = $B;
                if ($B < $C) $result = $C;
                break;
            case 'Площадь треугольника':
                $p = ($A + $B + $C) / 2;
                $result = round(sqrt($p * ($p - $A) * ($p - $B) * ($p - $C)), 1);
                break;
            case 'Периметр треугольника':
                $result = $A + $B + $C;
                break;
            case 'Среднее арифметическое':
                $result = ($A + $B + $C) / 3;
                break;
            case 'Произведение чисел':
                $result = $A * $B * $C;
                break;
        }
        return $result;
    }
    ?>
</body>