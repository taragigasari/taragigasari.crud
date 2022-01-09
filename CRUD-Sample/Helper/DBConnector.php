<?php

namespace CRUD\Helper;

use mysqli;

class DBConnector
{
    /**
     * @var false|mysqli|null
     */
    private $db;

    /**
     */
    public function connect(): void
    {

        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "myDB";

        $this->db = mysqli_connect($servername, $username, $password, $dbname);


        if (!$this->db) {
            die(" failed: " . mysqli_connect_error());
        }
        echo "successful";
    }

    /**
     * @param string $query
     * @return bool
     */
    public function execQuery(string $query): bool
    {
        if ($this->db->query($query) === TRUE) {
            echo "successful";

            return true;
        } else {
            echo "Error: " . $query . "<br>" . $this->db->error;
            $this->db->close();

            return false;
        }
    }


    /**
     * @param string $message
     * @return void
     * @throws \Exception
     */
    private function exceptionHandler(string $message): void
    {
        echo "Error" . $message;
    }
}