<html>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    ID of Record to Edit: <input type="number" name="id" required><br>
    Name: <input type="text" name="name" required><br>
    Reg: <input type="text" name="reg" required><br>
    Gender: <input type="text" name="gender" required><br>
    Date of Birth: <input type="date" name="dob" required><br>
    <input type="submit" name="edit_record" value="Edit Record">
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
// iv. Edit and update record
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_record'])) {
    $id = sanitize_input($_POST['id']);
    $name = sanitize_input($_POST['name']);
    $reg = sanitize_input($_POST['reg']);
    $gender = sanitize_input($_POST['gender']);
    $dob = sanitize_input($_POST['dob']);

    $sql = "UPDATE students SET name='$name', reg='$reg', gender='$gender', dob='$dob' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
</html>