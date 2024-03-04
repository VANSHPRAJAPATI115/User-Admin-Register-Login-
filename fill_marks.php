<!-- Inside fill_marks.php -->

<?php
@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
   header('location:login_form.php');
}

if (isset($_GET['id'])) {
   $user_id = $_GET['id'];
} else {
   header('location:view_users.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Fill Marks</title>
   <link rel="stylesheet" href="css/style.css">
</head>

<body>

   <div class="container">
      <h2>Fill Marks for User:</h2>
      <?php
      if (isset($_POST['submit'])) {
         $marks = $_POST['marks'];
         $update_sql = "UPDATE user_form SET marks = $marks WHERE id = $user_id";
         mysqli_query($conn, $update_sql);
         echo "<p>Marks updated successfully!</p>";
      }
      
      ?>


      <form action="" method="post">
         <label for="marks">Enter Marks:</label>
         <input type="text" name="marks" required>
         <input type="submit" name="submit" value="Submit Marks">
      </form>
      <a href="view_users.php" class="btn">Back to User List</a>
      <a href="admin_page.php" class="btn">Back to Admin Page</a>
   </div>

</body>

</html>
