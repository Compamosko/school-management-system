<html>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Name: <input type="text" name="name" required><br>
    Reg: <input type="text" name="reg" required><br>
    Gender: <input type="text" name="gender" required><br>
    Date of Birth: <input type="date" name="dob" required><br>
    <input type="submit" name="add_record" value="Add Record">
</form> 
 <?php
 // Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bscs";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
// iii. Add record to student table
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_record'])) {
    $name = sanitize_input($_POST['name']);
    $reg = sanitize_input($_POST['reg']);
    $gender = sanitize_input($_POST['gender']);
    $dob = sanitize_input($_POST['dob']);

    $sql = "INSERT INTO students (name, reg, gender, dob) VALUES ('$name', '$reg', '$gender', '$dob')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<a href="edit.php">EDIT A RECORD</a><br>
<a href="delete.php">DELETE A RECORD</a>

</html>