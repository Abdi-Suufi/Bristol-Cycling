<?php

use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    public function testDatabaseConnection()
    {
        $conn = mysqli_connect("localhost", "root", "", "cycle_shop");
        $this->assertNotFalse($conn, "Failed to connect to the database.");
        mysqli_close($conn);
    }
}
