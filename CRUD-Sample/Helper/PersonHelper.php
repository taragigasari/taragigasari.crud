<?php

namespace CRUD\Helper;

class PersonHelper
{
    public function insert()
    {
        $db = new DBConnector("localhost", "username", "", "myDB");
        $db->connect();


        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $username = $_POST['username'];

        $sql = "INSERT INTO person (firstName, lastName, username)
         VALUES ('$firstName','$lastName', '$username')";
        $this->db->execQuery($sql);

    }

    public function fetch(int $id)
    {

        $sql = "SELECT id, firstName, lastName, username 
        FROM person
        WHERE id ='$id'";


        $result = $this->db->execQuery($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . " " . $row["username"] . "<br>";
            }
        } else {
            echo "0 results";
        }
    }

    public function fetchAll()
    {
        $sql = "SELECT * FROM person";


        $result = $this->db->execQuery($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . " " . $row["username"] . "<br>";
            }
        } else {
            echo "0 results";
        }

    }

    public function update()
    {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $username = $_POST['username'];

        $sql = "UPDATE person SET firstName ='$firstName', lastName ='$lastName' WHERE username ='$username'";
        $this->db->execQuery($sql);

    }

    public function delete()
    {
        $id = $_POST['id'];
        $sql = "DELETE person WHERE id ='$id'";
        $this->db->execQuery($sql);
    }

}