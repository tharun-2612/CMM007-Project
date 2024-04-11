<?php
include('config.php');
session_start();

if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit;
}

$recipe_id = $_GET['id'];
$query = "SELECT * FROM recipes WHERE id = $recipe_id";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $delete_query = "DELETE FROM recipes WHERE id = $recipe_id";
    mysqli_query($con, $delete_query);
    header("Location: view.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Recipe</title>
    <link rel="stylesheet" href="CSS/view.css">
</head>
<body>
    <header>
        <h1>Delete Recipe</h1>
        <a href="view.php">Back to Dashboard</a>
    </header>

    <section id="delete-recipe">
        <!-- Confirmation message to delete recipe -->
        <p>Are you sure you want to delete the recipe "<?php echo $row['RecipeName']; ?>"?</p>
        <form method="post">
            <input type="submit" value="Yes, Delete Recipe">
        </form>
    </section>

    <footer>
        <p>&copy; 2024 The Cooking Foodie</p>
    </footer>
</body>
</html>
