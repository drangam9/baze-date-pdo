<?php
require_once ("dbConnection.php");

mysqli_query($mysqli, "DROP TRIGGER IF EXISTS UserInserted");
$insertTrigger = "
CREATE TRIGGER UserInserted
AFTER INSERT ON users
FOR EACH ROW
BEGIN
    INSERT INTO logs (action, user_id, timestamp) VALUES ('User inserted', NEW.id, NOW());
END;
";
mysqli_query($mysqli, $insertTrigger);

mysqli_query($mysqli, "DROP TRIGGER IF EXISTS UserUpdated");

$updateTrigger = "
CREATE TRIGGER UserUpdated
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    INSERT INTO logs (action, user_id, timestamp) VALUES ('User updated', NEW.id, NOW());
END;
";
mysqli_query($mysqli, $updateTrigger);

mysqli_query($mysqli, "DROP TRIGGER IF EXISTS UserDeleted");
$deleteTrigger = "
CREATE TRIGGER UserDeleted
AFTER DELETE ON users
FOR EACH ROW
BEGIN
    INSERT INTO logs (action, user_id, timestamp) VALUES ('User deleted', OLD.id, NOW());
END;
";
mysqli_query($mysqli, $deleteTrigger);