<?php

function redirect($url)
{
    header("location: " . $url);
    exit();
}


function readFromFile(string $filename): array
{
    $users = json_decode(file_get_contents($filename), true); //Retourne un tableau associatif

    return $users;
}

function writeToFile(string $filename, array $data): void
{
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);

    file_put_contents($filename, $jsonData);
}


function addTask(string $filename, array $newTask): void
{

}

function updateTask(string $filename, int $index, array $updatedTask): void
{

}

function deleteTask(string $filename, int $index): void
{
    $tasks = readFromFile($filename);

    if (isset($tasks[$index])) {
        unset($tasks[$index]);
    }

    $tasks = array_values($tasks);

    writeToFile($filename, $tasks);


}

function renderOptions(string $file, string $itemSelected = ""): string
{

}

function testerStatut($var)
{

}
