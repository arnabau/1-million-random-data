<?php
//set headers
header('Content-Encoding', 'chunked');
header('Transfer-Encoding', 'chunked');
// header('Content-Type', 'text/html');
header('Connection', 'keep-alive');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// send ouput buffer
ob_flush();
// flush the buffer
flush();

require_once '../../config.php';

// Check for GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

    $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    // PDO instance
    try {
        $dbh = new PDO($dsn, DB_USER, DB_PASS, $options);
        $dbh->exec('set names utf8');
    } catch (PDOException $e) {
        $error = $e->getMessage();
        echo json_encode(array('error' => $error));
    }

    $sql = ("SELECT * FROM source");
    $sth = $dbh->prepare($sql);
    $sth->execute();

    $items_arr['records'] = array();

    if ($sth->rowCount() > 0) {
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $items=array(
                "a" => $a,
                "b" => $b,
                "c" => $c
            );

            array_push($items_arr["records"], $items);

            // $data [] = $row;
        }

        // send ouput buffer
        ob_flush();
        // flush the buffer
        flush();

        echo json_encode($items_arr);
    } else {
        echo json_encode(array('error' => 'No records found'));
    }
} else {
    echo json_encode(array('error' => 'Invalid request'));
}