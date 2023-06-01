<?php
$array = array(
    'key1' => 'value1',
    'key2' => 'value2',
    'key3' => 'value3',
);

// Создаем пустой массив
$reversedArray = array(); 

// Обходим исходный массив
foreach ($array as $key => $value) {
    // Вставляем каждый элемент в начало нового массива
    $reversedArray = array($key => $value) + $reversedArray;
}

// Выводим новый массив
foreach ($reversedArray as $key => $value) {
    echo $key . ': ' . $value . "\n";
}
