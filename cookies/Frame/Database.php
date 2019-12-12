<?php
/**
 * Created by PhpStorm.
 * User: tadaspetruskevicius
 * Date: 2019-11-11
 * Time: 09:34
 */

namespace database;

use PDO;
use PDOException;

class Database
{
    public function __construct()
    {
        try {
            $this->connection = new PDO('mysql:host=localhost:8889;dbname=geliu_uzsakymas', 'root', 'root');
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            print "DB Connection Failed: " . $e->getMessage();
        }
    }

    // Insert_update_remove
    public function insert_update_remove($sql, $param)
    {
        return $this->connection->prepare($sql)->execute($param);
    }

    // Select
    public function select($sql)
    {
        return $this->connection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function __destruct()
    {
        $this->connection = null;
    }
}