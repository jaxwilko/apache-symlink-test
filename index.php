<?php

$path = __DIR__ . '/real/MyClass.php';

include_once $path;

$obj = new MyClass();
$ref = new \ReflectionClass($obj);

$isLink = is_link(__DIR__ . '/real');
$objGet = $obj->get();
$file = $ref->getFileName();
$isCorrect = $isLink ? strpos($file, 'fake') !== false : strpos($file, 'fake') === false;

?>
<!DOCTYPE html>
<html>
    <head>
        <title>WTF Apache</title>
        <style>
            th, td {
                border-bottom: 1px solid #cecece;
                padding: 4px;
            }
            th {
                text-align: left;
            }
        </style>
    </head>
    <body>
        <table>
            <tbody>
                <tr>
                    <th>Object self identification</th>
                    <td><?= $objGet ?></td>
                </tr>
                <tr>
                    <th>Object loaded path</th>
                    <td><?= $path ?></td>
                </tr>
                <tr>
                    <th>Object actual path</th>
                    <td><?= $file ?></td>
                </tr>
                <tr>
                    <th>Is symlinked</th>
                    <td><?= $isLink ? 'true' : 'false' ?></td>
                </tr>
                <tr>
                    <th>Is actual path correct</th>
                    <td style="color: <?= $isCorrect ? 'green' : 'red' ?>"><?= $isCorrect ? 'true' : 'false' ?></td>
                </tr> 
            </tbody>
        </table>
    </body>
</html>
