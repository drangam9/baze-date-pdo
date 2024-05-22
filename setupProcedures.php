<?php
require_once ("dbConnection.php");

mysqli_query($mysqli, "DROP PROCEDURE IF EXISTS InsertUser");
$insertProcedure = "
CREATE PROCEDURE InsertUser(IN firstName VARCHAR(100), IN lastName VARCHAR(100), IN email VARCHAR(100), IN password VARCHAR(100))
BEGIN
    INSERT INTO users (first_name, last_name, email, password) VALUES (firstName, lastName, email, password);
END;
";
mysqli_query($mysqli, $insertProcedure);

mysqli_query($mysqli, "DROP PROCEDURE IF EXISTS UpdateUser");

$updateProcedure = "

CREATE PROCEDURE UpdateUser(IN id INT, IN firstName VARCHAR(100), IN lastName VARCHAR(100), IN email VARCHAR(100))
BEGIN
    UPDATE users SET first_name = firstName, last_name = lastName, email = email WHERE id = id;
END;
";
mysqli_query($mysqli, $updateProcedure);

mysqli_query($mysqli, "DROP PROCEDURE IF EXISTS DeleteUser");
$deleteProcedure = "
CREATE PROCEDURE DeleteUser(IN user_id INT)
BEGIN
    DELETE FROM users WHERE id = user_id;
END;
";
mysqli_query($mysqli, $deleteProcedure);

