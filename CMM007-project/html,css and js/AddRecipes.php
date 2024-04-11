<html>
<head>
    <title>Add Recipe</title>
    <link rel="stylesheet" href="CSS/Addrecipe.css">
</head>
<body>
    <h4>The Cooking Foodie :)</h4>
    <h3>Add a New Recipe here</h3>
    
        <form method="post" action="AddRecipe.php">
            <label>Chef Name:</label>
            <input type="text" name="chefname" /><br><br>
            <label>Category:&nbsp;&nbsp;</label>
            <input type="text" name="category" /> <br><br>
            <label>Recipe Name:&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="RecipeName" /> <br><br>
            <label>Ingredients:&nbsp;&nbsp;&nbsp;</label>
            <textarea name="Ingredients" id="Ingredients" rows="5" cols="100"> </textarea><br><br>
            <label>Directions:&nbsp;&nbsp;&nbsp;</label>
            <textarea name="Directions" id="Directions" rows="10" cols="100"> </textarea><br><br>
            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="submit" value="Submit" />
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" value="Reset"/>
        </form>
</body>
</html> 