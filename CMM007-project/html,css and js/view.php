<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="CSS/view.css">
</head>
<body>
    <header>
        <h1>Dashboard</h1>
        <a href="index.php">Back</a>
    </header>

    <section id="recipe-list">
        <h2>Recipes</h2>
        <?php
        include('config.php');
        session_start();
        
        $sql = "SELECT * FROM recipes";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='recipe'>";
                echo "<h3>Recipe Name: " . $row["RecipeName"]. "</h3>";
                echo "<p><strong>Chef Name:</strong> " . $row["chefname"]. "</p>";
                echo "<p><strong>Category:</strong> " . $row["category"]. "</p>";
                echo "<p><strong>Ingredients:</strong> " . $row["Ingredients"]. "</p>";
                echo "<p><strong>Directions:</strong> " . $row["Directions"]. "</p>";
                echo "<a href='editRecipe.php?id=".$row["id"]."'>Edit</a> | ";
                echo "<a href='delete.php?id=".$row["id"]."'>Delete</a>";
                echo "</div>";
            }
        } else {
            echo "<p>No recipes found</p>";
        }
        mysqli_close($con);
        ?>
    </section>
    <footer>
        <p>&copy; 2024 The Cooking Foodie</p>
    </footer>
</body>
</html>
