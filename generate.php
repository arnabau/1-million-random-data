<?php
//set headers
header('Content-Encoding', 'chunked');
header('Transfer-Encoding', 'chunked');
header('Content-Type', 'text/html');
header('Connection', 'keep-alive');

// send ouput buffer
ob_flush();
// flush the buffer
flush();

require_once 'config.php';

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

    $dbh->beginTransaction();

    $sql = 'INSERT INTO source (a, b, c) VALUES (?, ?, ?)';
    $sth = $dbh->prepare($sql);
    $arr = [];

    for ($i = 0; $i < 1000; $i++){
        $randnumber = mt_rand(1, 1000000);

        array_push ($arr, [
            'randnumber' => $randnumber,
            'por3' => filter_var(number_format($randnumber * 3/100), FILTER_SANITIZE_NUMBER_INT),
            'por5' => filter_var(number_format($randnumber * 5/100), FILTER_SANITIZE_NUMBER_INT),
            'total' => $i + 1
        ]);

        $sth->execute(array(
            $randnumber,
            filter_var(number_format($randnumber * 3/100), FILTER_SANITIZE_NUMBER_INT),
            filter_var(number_format($randnumber * 5/100), FILTER_SANITIZE_NUMBER_INT),
        ));

        // send ouput buffer
        ob_flush();
        // flush the buffer
        flush();
        // delay the execution a little bit
        // usleep(1000);
        // sleep(1);
    }
    // commit all data to database
    $dbh->commit();

    // set response code to 200: OK
    http_response_code(200);
    echo json_encode($arr);

} else {
    echo json_encode(array('error' => 'No GET request'));
}