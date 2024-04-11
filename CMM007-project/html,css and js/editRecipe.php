<?php
include ("config.php");
session_start();



// Redirect users who are not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Recipe</title>
    <link rel="stylesheet" href="CSS/view.css">
</head>

<body>
    <header>
        <h1>Edit Recipe</h1>
        <a href="view.php">Back to Dashboard</a>
    </header>

    <section id="edit-recipe">
        <?php

        if (isset($_GET["id"])) {
            $recipe_id = $_GET["id"];
            $sql = "SELECT * FROM recipes WHERE id = $recipe_id";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $new_recipe_name = $_POST['recipe_name'];
                    $new_chef_name = $_POST['chef_name'];
                    $new_category = $_POST['category'];
                    $new_ingredients = $_POST['ingredients'];
                    $new_directions = $_POST['directions'];

                    $update_query = "UPDATE recipes SET RecipeName = '$new_recipe_name', chefname = '$new_chef_name', category = '$new_category', Ingredients = '$new_ingredients', Directions = '$new_directions' WHERE id = $recipe_id";
                    mysqli_query($con, $update_query);
                    header("Location: view.php");
                    exit;
                }
                ?>
                <form action="editRecipe.php?id=<?php echo $recipe_id; ?>" method="POST">
                    <label for="recipe_name">Recipe Name:</label><br>
                    <input type="text" id="recipe_name" name="recipe_name" value="<?php echo $row['RecipeName']; ?>"><br>
                    <label for="chef_name">Chef Name:</label><br>
                    <input type="text" id="chef_name" name="chef_name" value="<?php echo $row['chefname']; ?>"><br>
                    <label for="category">Category:</label><br>
                    <input type="text" id="category" name="category" value="<?php echo $row['category']; ?>"><br>
                    <label for="ingredients">Ingredients:</label><br>
                    <textarea id="ingredients" name="ingredients"><?php echo $row['Ingredients']; ?></textarea><br>
                    <label for="directions">Directions:</label><br>
                    <textarea id="directions" name="directions"><?php echo $row['Directions']; ?></textarea><br><br>
                    <input type="submit" value="Update">
                </form>
                <?php
            } else {
                echo "Recipe not found";
            }
        } else {
            echo "Recipe ID not provided";
        }

        mysqli_close($con);
        ?>
    </section>
    <footer>
        <p>&copy; 2024 The Cooking Foodie</p>
    </footer>
</body>

</html>