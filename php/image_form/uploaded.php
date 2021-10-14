<?php

if (!empty($_FILES)) {

    $file = $_FILES['image'];
    $fileType = explode('/', $file['type']);
    $fileExtensions = ['jpeg', 'gif', 'png'];
    $imagesDir = 'img';

    //Проверка на тип файла (изображение).
    if ($fileType[0] != 'image') die('The file is not an image!');

    //Создание папки, если отсутствует.
    if (!file_exists('img')) mkdir('img');

    //Проверка на расширение изображения и загрузка на сервер.
    foreach ($fileExtensions as $extension) {

        if (strpos($fileType[1], $extension) !== false) {

            $fileName = $file['name'];

            //Проверка на дублирование имен файлов
            $uploadedFiles = scandir('img');
            for ($i = 2; $i < count($uploadedFiles); $i++) {

                if ($uploadedFiles[$i] === $fileName) {
                    die('Such file already exists!');
                }
            }

            $filePath = __DIR__ . '/img/' . $fileName;

            move_uploaded_file($file['tmp_name'], $filePath);
            echo 'File uploaded successfully!';
            return;
        }
    }
    //Вывести сообщение об ошибке, если расширение изображения не зарезервировано.
    die('Wrong file extension!');
}