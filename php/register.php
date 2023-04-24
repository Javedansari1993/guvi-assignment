<?php
// Start the session
session_start();

// Connect to MySQL database
require_once "dataBase.php";

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Check if the username or email is already in use
    $stmt = $conn->prepare("SELECT * FROM login WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "Username or email already in use.";
    } else {
        // Insert the user data into the database
        $stmt = $conn->prepare("INSERT INTO login (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);
        $stmt->execute();
        
        // Redirect to login page
        header("Location: ../login.html");
        exit();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Signup</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <h1>Signup</h1>
      <form id="signupForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" name="username" class="form-control" id="username" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" name="password"  class="form-control" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Signup</button>
      </form>
      <p>Already have an account? <a href="../login.html">Login here</a>.</p>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./js/register.js"></script>
  </body>
</html>
