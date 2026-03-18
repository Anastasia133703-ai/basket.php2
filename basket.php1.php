<?php
declare(strict_types=1);

const OPERATION_EXIT = 0;
const OPERATION_ADD = 1;
const OPERATION_DELETE = 2;
const OPERATION_EDIT = 3;
const OPERATION_PRINT = 4;

$operations = [
    OPERATION_EXIT   => "0. Завершить программу.",
    OPERATION_ADD    => "1. Добавить товар.",
    OPERATION_DELETE => "2. Удалить товар.",
    OPERATION_EDIT   => "3. Изменить товар.",
    OPERATION_PRINT  => "4. Показать список.",
];

/**
 * Структура items:
 * [
 *     ['name' => 'Хлеб', 'qty' => 2],
 *     ['name' => 'Яблоки', 'qty' => 5],
 * ]
 */

$items = [];

/* ---------------------------------------------------
 *  ФУНКЦИИ
 * ---------------------------------------------------*/

function showList(array $items): void
{
    if (!count($items)) {
        echo "Список покупок пуст.\n";
        return;
    }

    echo "Ваш список покупок:\n";
    foreach ($items as $index => $item) {
        echo ($index + 1) . ". {$item['name']} ({$item['qty']} шт)\n";
    }
}

function requestOperation(array $operations, array $items): int
{
    system('clear');

    showList($items);

    echo "\nВыберите операцию:\n";
    echo implode(PHP_EOL, $operations) . PHP_EOL . "> ";

    $op = trim(fgets(STDIN));

    if (!array_key_exists($op, $operations)) {
        echo "Неизвестная операция\n";
        fgets(STDIN);