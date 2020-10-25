<?php

try {
    $db1 = new PDO("mysql:host=db1;dbname=test", 'test', 'test');
    $db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db2 = new PDO("mysql:host=db2;dbname=test", 'test', 'test');
    $db2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    var_dump($e->getMessage());
}

for ($i = 0; $i < 1000; $i++) {
    try {
        $db1->exec("INSERT INTO test(data) VALUES ('DB1_$i')");
        $db2->exec("INSERT INTO test(data) VALUES ('DB2_$i')");
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
    sleep(1);
}
