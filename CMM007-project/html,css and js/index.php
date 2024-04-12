<?php
session_start();

include ("config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
}

$userEmail = $_SESSION['valid'];
$query = "SELECT * FROM users WHERE Email = '$userEmail'";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['Role'] = $row['Role'];
} else {
    echo "Error fetching user data";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMM007 Project</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/darkmode.css">
    <link rel="stylesheet" href="CSS/responsive.css">
    <link rel="stylesheet" href="CSS/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php

    if (isset($_SESSION['Role'])) {
        if ($_SESSION['Role'] == 'cook_chef') {
        }

    }

    ?>

    <header>
        <div class="topnav flex">
            <div class="container flex">
                <div class="navicons flex">
                    <a href="https://www.youtube.com/redirect?event=channel_description&redir_token=QUFFLUhqbUZhVGdjQ3ZlN2ZnM2xXbXdSTGlwZXJGanZLQXxBQ3Jtc0trdDFVdU5BeVFKSFlCdTREdWpqTXl1NnZzZzNmMl9YNGpkb2FNODVRd3VIRUZzamNnUUdSY0xHYXVra0kxTkNpUFZ2RFpIUGIyWGxOdy15ZkxMc3VTdENjanJVeEowVjR4Y3dzTGFnVXQ1YmN3SC1Odw&q=https%3A%2F%2Fwww.facebook.com%2Fthecookingfoodie%2F"
                        target="_blank" title="facebook" rel="noopener noreferrer"><i
                            class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://twitter.com/DavidTheFoodie" target="_blank" title="twitter"
                        rel="noopener noreferrer"><i class="fa-brands fa-twitter"></i></a>
                    <a href="http://linkedin.com/" target="_blank" title="linkedin" rel="noopener noreferrer"><i
                            class="fa-brands fa-linkedin"></i></a>
                    <a href="http://www.youtube.com/@TheCookingFoodie" target="_blank" title="youtube"
                        rel="noopener noreferrer"><i class="fa-brands fa-youtube"></i></a>
                </div>
                <?php
                if (isset($_SESSION['Role']) && $_SESSION['Role'] == 'cook_chef') {
                    echo '<a href="AddRecipes.php" class="srbtn">Add a Recipe<i class="fa-solid fa-plus"></i></a>';
                }
                ?>
            </div>
        </div>
        <nav class="mainnav">
            <div class="container flex">
                <div class="logo flex">
                    <img src="img/logo.png" alt="">
                    <h1>COOKING FOODIE</h1>
                </div>
                <ul class="navlist flex">
                    <?php if (isset($_SESSION['username'])): ?>
                        <li><a href="logout.php">Logout</a></li>
                    <? else: ?>
                        <li><a href="home.php">Profile</a></li>
                    <?php endif; ?>
                    <li><a href="#section1">Categories</a></li>
                    <li><a href="#section2">Recipes</a></li>
                    <li><a href="view.php">Chef's Dashboard</a></li>
                    <li><a href="/">Contact Us</a></li>
                </ul>
                <div class="searchbar flex">
                    <input type="checkbox" name="check-toggle" id="checkbox" hidden="">
                    <label for="checkbox" class="toggle">
                        <div class="toggle__circle"></div>
                    </label>
                    <i class="fa-solid fa-magnifying-glass" id="searchopen"></i>
                    <div class="navonoff">
                        <input type="checkbox" id="checkbox2">
                        <label for="checkbox2" class="toggle2">
                            <div class="bar bar--top"></div>
                            <div class="bar bar--middle"></div>
                            <div class="bar bar--bottom"></div>
                        </label>
                    </div>
                </div>

                <div class="searchinput">
                    <input type="text" placeholder="Search Here...">
                    <i class="fa-solid fa-xmark" id="removesearch"></i>
                </div>

            </div>
        </nav>
    </header>


    <main>
        <section class="headerimg">
            <div class="container">
                <div class="headerinfo flex">
                    <h1 class="headertitle">Browny Cookies</h1>
                    <p class="headerpera"></p>
                    <a href="" class="headerbtn">VIEW RECIPE<i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </section>
        <section class="headerslider container">
            <div class="slidertitle flex">
                <h4>My Latest Recipes</h4>
                <div class="sliderlfbtn">
                    <button id="sleft"><i class="fa-solid fa-arrow-left"></i></button>
                    <button id="sright"><i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
            <div class="headercards flex">
                <!-- <div class="headercard flex">
                    <img src="img/cookies-7.jpg" alt="">
                    <div class="hcardinfo">
                        <span>Advanced</span>
                        <h3>Browny Cookies</h3>
                    </div>
                </div>
                <div class="headercard flex">
                    <img src="img/cookies-7.jpg" alt="">
                    <div class="hcardinfo">
                        <span>Advanced</span>
                        <h3>Browny Cookies</h3>
                    </div>
                </div>
                 <div class="headercard flex">
                    <img src="img/cookies-7.jpg" alt="">
                    <div class="hcardinfo">
                        <span>Advanced</span>
                        <h3>Browny Cookies</h3>
                    </div>
                </div> -->
            </div>
        </section>
        <section class="threecards container flex">
            <div class="tcard">
                <div class="tcardimg">
                    <img src="img/fruit salad.jpg" alt="">
                    <span class="fa fa-star"></span>
                </div>
                <div class="tcardinfo flex">
                    <label class="tlabel">Salad</label>
                    <h2>Sunday Best Fruit Salad With Best Recipes</h2>
                    <div class="star-rating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                    </div>
                    <p>This is a wonderful and easy fruit salad that is also pretty for special occasions or Holidays
                    </p>
                    <ul class="flex">
                        <li><i class="fa-solid fa-user"></i>by</li>
                        <li><i class="fa-regular fa-clock"></i>10 Mins</li>
                        <li><i class="fa-regular fa-heart"></i>25 Like</li>
                    </ul>
                    <a href="https://www.punchfork.com/recipe/Sunday-Best-Fruit-Salad-Allrecipes" class="tcardbtn">Read
                        More</a>
                </div>
            </div>
            <div class="tcard">
                <div class="tcardimg">
                    <img src="img/post2.jpg" alt="">
                    <span class="fa fa-star"></span>
                </div>
                <div class="tcardinfo flex">
                    <label class="tlabel">Dinner</label>
                    <h2>lemon dijon vina igrette kale quinoa and Avocado</h2>
                    <div class="star-rating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <p>The doner is a Turkish creation of meat, often lamb, but not necessarily so, that is seasoned,
                        stacked in a cone shape.</p>
                    <ul class="flex">
                        <li><i class="fa-solid fa-user"></i>by</li>
                        <li><i class="fa-regular fa-clock"></i>30 Mins</li>
                        <li><i class="fa-regular fa-heart"></i>5 Like</li>
                    </ul>
                    <a href="https://wuffweb.de/recipe/lemon-dijon-vina-igrette-kale-quinoa-and-avocado-salad-with-copy/"
                        class="tcardbtn">Read More</a>
                </div>
            </div>
            <div class="tcard">
                <div class="tcardimg">
                    <img src="img/delish-spaghetti-meatballs.jpg" alt="">
                    <span class="fa fa-star"></span>
                </div>
                <div class="tcardinfo flex">
                    <label class="tlabel">Meggi</label>
                    <h2>Spaghetti and MeatBalls</h2>
                    <div class="star-rating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <p>When it comes to comforting weeknight dinners, it doesn’t get more classic than spaghetti and
                        meatballs.</p>
                    <ul class="flex">
                        <li><i class="fa-solid fa-user"></i>by</li>
                        <li><i class="fa-regular fa-clock"></i>55 Mins</li>
                        <li><i class="fa-regular fa-heart"></i>10 Like</li>
                    </ul>
                    <a href="https://www.delish.com/cooking/recipe-ideas/a55764/best-spaghetti-and-meatballs-recipe/"
                        class="tcardbtn">Read More</a>
                </div>
            </div>
        </section>
        <section class="categoriescards container flex" id="section1">
            <a href="https://pinchofyum.com/#search/q=Bread&c=eyJ2IjoiNC4wIiwidGl0bGUiOiIiLCJncm91cFR5cGUiOiJ0b3AtcmVzdWx0cyIsImFycmFuZ2VtZW50IjoiY29udGV4dC13aXRob3V0LXNlYXJjaCIsIm9taXRTZWFyY2hDb250ZXh0Ijp0cnVlfQ%3D%3D"
                class="catecard">
                <div class="cateimg">
                    <img src="img/bread.jpg" alt="">
                </div>
                <div class="catecardinfo flex">
                    <span>8 Recipe</span>
                    <h3>Bread</h3>
                    <p>A great recipe for an electric breadmaker - or do it the Traditional way</p>
                </div>
            </a>
            <a href="https://pinchofyum.com/recipes/instant-pot" class="catecard">
                <div class="cateimg">
                    <img src="img/Chicken-Tinga-Tacos-6-768x1152.webp" alt="">
                </div>
                <div class="catecardinfo flex">
                    <span>4 Recipes</span>
                    <h3>Instant Pot</h3>
                    <p>Here are a Bunch of our faves using our most beloved little kitchen helper: the instant
                        Pot.Soups,tacos,main dishes and more!</p>
                </div>
            </a>
            <a href="https://pinchofyum.com/recipes/soup" class="catecard">
                <div class="cateimg">
                    <img src="img/sweet-potato-peanut-stew-768x1152.webp" alt="">
                </div>
                <div class="catecardinfo flex">
                    <span>6 Recipe</span>
                    <h3>Soups</h3>
                    <p>Soup is the beeeeest! To be Honest, it's one of our favorite food groups
                        There is nothing quite like steaming cozy bowl of soup.</p>
                </div>
            </a>
            <a href="https://pinchofyum.com/recipes/healthy-choices" class="catecard">
                <div class="cateimg">
                    <img src="img/steak-vietnamese-noodle-salad-8238dcHealthy.webp" alt="">
                </div>
                <div class="catecardinfo flex">
                    <span>15 Recipe</span>
                    <h3>Dessert</h3>
                    <p>Yall'up with some eating habits.maybe you're coming off a week off all Cookies all the
                        time,whatever the reason,
                        here's the place to search all the Healthy things!.</p>
                </div>
            </a>
            <a href="https://pinchofyum.com/recipes/dinner" class="catecard">
                <div class="cateimg">
                    <img src="img/download.jpeg" alt="">
                </div>
                <div class="catecardinfo flex">
                    <span>10 Recipe</span>
                    <h3>Dinner</h3>
                    <p>"What's for the dinner?" Gah! That question!Whether it's coming from your own brain or family,
                        let's help you get that question answered! .</p>
                </div>
            </a>
            <a href="https://pinchofyum.com/recipes/quick-and-easy" class="catecard">
                <div class="cateimg">
                    <img src="img/pasta.jpg" alt="">
                </div>
                <div class="catecardinfo flex">
                    <span>10 Recipe</span>
                    <h3>Quick AND Easy</h3>
                    <p>Time is Running But is there ever? If you're feeling
                        like you need something super quick and super easy,
                        then you came to the right place.
                    </p>
                </div>
            </a>
            <a href="https://pinchofyum.com/recipes/vegan" class="catecard">
                <div class="cateimg">
                    <img src="img/tofu-salad-pineapple-quinoa-vegan-meal-1296x728-header-800x728.avif" alt="">
                </div>
                <div class="catecardinfo flex">
                    <span>8 Recipe</span>
                    <h3>Vegan</h3>
                    <p>This is the place to go for all the plant-based! goodness.These recipes are keeping it
                        vegan but still super satisfying and super delicious.</p>
                </div>
            </a>
            <a href="https://pinchofyum.com/recipes/salad" class="catecard">
                <div class="cateimg">
                    <img src="img/salad.jpg" alt="">
                </div>
                <div class="catecardinfo flex">
                    <span>5 Recipe</span>
                    <h3>Salad</h3>
                    <p>Traditional lettuce-Chomping salads but also noodley salads,mayo-based salads,
                        grain salads...So many to salad!</p>
                </div>
            </a>
        </section>
        <section class="categoriefilter container flex" id="section2">
            <div class="filter flex">
                <div class="filtername">
                    <div class="flex active">
                        <i class="fa-solid fa-burger"></i>
                        <h3>Quick Food</h3>
                    </div>
                </div>
                <div class="filtername">
                    <div class="flex">
                        <i class="fa-solid fa-fire-flame-curved"></i>
                        <h3>Grill</h3>
                    </div>
                </div>
                <div class="filtername">
                    <div class="flex">
                        <i class="fa-solid fa-cookie"></i>
                        <h3>Cookies</h3>
                    </div>
                </div>
                <div class="filtername">
                    <div class="flex">
                        <i class="fa-solid fa-bread-slice"></i>
                        <h3>Breakfast</h3>
                    </div>
                </div>
            </div>
            <div class="filtercards flex">
                <div class="tcard">
                    <div class="tcardimg">
                        <img src="img/Marry-Me-Chicken-6.jpg" alt="">
                        <span class="fa fa-star"></span>
                    </div>
                    <div class="tcardinfo flex">
                        <label class="tlabel">Chicken</label>
                        <h2>Marry Me Chicken</h2>
                        <div class="star-rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                        <p>Golden color,juicy chicken coated in a simple creamy sauce with tomatoes,garlic,and thyme.
                            Served with mashed poatoes! this is just so good</p>
                        <ul class="flex">
                            <li><i class="fa-solid fa-user"></i>by</li>
                            <li><i class="fa-regular fa-clock"></i>10 Mins</li>
                            <li><i class="fa-regular fa-heart"></i>25 Like</li>
                        </ul>
                        <a href="https://pinchofyum.com/marry-me-chicken/print/95594" class="catecarbtn">Read More <i
                                class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="tcard">
                    <div class="tcardimg">
                        <img src="img/Fries.jpg" alt="">
                        <span class="fa fa-star"></span>
                    </div>
                    <div class="tcardinfo flex">
                        <label class="tlabel">Chips</label>
                        <h2>Specialty Fries</h2>
                        <div class="star-rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <p>Special Loaded fries are decadent indulgence. They are sinfully delicious blend of salty,
                            savory, and over-the-top ingredients.</p>
                        <ul class="flex">
                            <li><i class="fa-solid fa-user"></i>by</li>
                            <li><i class="fa-regular fa-clock"></i>30 Mins</li>
                            <li><i class="fa-regular fa-heart"></i>5 Like</li>
                        </ul>
                        <a href="https://www.foodlovinfamily.com/wprm_print/39039" class="catecarbtn">Read More <i
                                class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="tcard">
                    <div class="tcardimg">
                        <img src="img/Alfredo.jpg" alt="">
                        <span class="fa fa-star"></span>
                    </div>
                    <div class="tcardinfo flex">
                        <label class="tlabel">Meggi</label>
                        <h2>Fettuccine Alfredo</h2>
                        <div class="star-rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <p>The perfect homemade fettuccine alfredo using heavy cream,butter,
                            parmesan cheese,and a touch of garlic.
                        </p>
                        <ul class="flex">
                            <li><i class="fa-solid fa-user"></i>by</li>
                            <li><i class="fa-regular fa-clock"></i>55 Mins</li>
                            <li><i class="fa-regular fa-heart"></i>10 Like</li>
                        </ul>
                        <a href="https://www.modernhoney.com/wprm_print/11972" class="catecarbtn">Read More <i
                                class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="featuredrecipe container flex">
            <div class="featuredtitles flex">
                <div class="titleicon">
                    <img src="img/chef.png" alt="">
                </div>
                <h1>Featured Recipes</h1>
                <p>Whether you are looking for plant-Based recipes, easy weeknight dinner recpies,
                    or fast and fresh recipes, here is a delicious selection!
                </p>
            </div>
            <div class="featuredcards flex">
                <div class="fcard">
                    <div class="fcardimg">
                        <img src="img/Dijon-salmon-5.jpg" alt="">
                        <div class="fauthorname flex">
                            <img src="img/chef1.webp" alt="">
                            <div class="fauth">
                                <h5>Hi, I'm Sylvia!</h5>
                                <p>33 Recipes</p>
                            </div>
                        </div>
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <div class="fcardinfo flex">
                        <div class="star-rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <label>Beginner</label>
                        <h2>Baked Dijon Salmon</h2>
                        <p>This delicious Baked Salmon recipe is fast,easy, and healthy. With only 10 minutes
                            of hands on time before baking in the oven, you'll have perfectly cooked, tender salmon.
                            perfect for busy weeknights!
                        </p>
                        <a href="https://www.feastingathome.com/simple-mustard-crusted-salmon/print/29204/?scale=1&unit=usc"
                            class="fcardbtn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="fcard">
                    <div class="fcardimg">
                        <img src="img/roasted-asparagus-5-1024x1536.jpg" alt="">
                        <div class="fauthorname flex">
                            <img src="img/christian_eilers_zety_us.jpg" alt="">
                            <div class="fauth">
                                <h5>Hi,I'm Christian Eilers!</h5>
                                <p>15 Recipes</p>
                            </div>
                        </div>
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <div class="fcardinfo flex">
                        <div class="star-rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <label>Advanced</label>
                        <h2>Tender-Crisp Roasted Asparagus</h2>
                        <p>Learn the secret to perfect Roasted Asparagus that turns out deliciously tender-crisp
                            every time fresh garlic, lemon zest and red pepper flakes give a fresh,punchy, bright
                            flavour---a beautiful spring side dish!
                        </p>
                        <a href="https://www.feastingathome.com/roasted-asparagus/print/34982/" class="fcardbtn">Read
                            More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="fcard">
                    <div class="fcardimg">
                        <img src="img/Moroccan-rice-17-1024x1536.jpg" alt="">
                        <div class="fauthorname flex">
                            <img src="img/chef3.jpg" alt="">
                            <div class="fauth">
                                <h5>HI,i'm Tom Aikens</h5>
                                <p>23 Recipes</p>
                            </div>
                        </div>
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <div class="fcardinfo flex">
                        <div class="star-rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <label>Intermediate</label>
                        <h2>Moroccan Rice</h2>
                        <p>This Rice is a delicious Moroccan style wholesome side dish for any occasion!
                            Made with savory moroccan spices,almonds,dried fruit, and orange zest, serve it with your
                            favorite protien and dinner is ready!
                        </p>
                        <a href="https://www.feastingathome.com/moroccan-rice/print/74011/" class="fcardbtn">Read More
                            <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="gfbg">
            <div class="container flex">
                <div class="greenworld flex">
                    <img src="img/greenworld.png" alt="">
                    <div class="gfinfo">
                        <span>Vegen</span>
                        <h1>Join Green World</h1>
                        <p>"Perceptions of veganism are changing fast"</p>
                        <a href="https://greenworld.org.uk/article/perceptions-veganism-are-changing-fast">CLICK HERE <i
                                class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="fruitworld flex">
                    <img src="img/fruity-world.png" alt="">
                    <div class="gfinfo">
                        <span>Fruit</span>
                        <h1>Fruity Mission</h1>
                        <p>"To plant more fruit for people to enjoy in local communities for free" </p>
                        <a href="https://www.freelyfruity.org/">CLICK HERE <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="breackfastsec container flex">
            <div class="leftsidesec">
                <div class="leftboxtitle">
                    <h1>Every Day Cooking</h1>
                    <p>Check out the latest recipes and stories featured in the mag, plus
                        subscribe to get your own copy!
                    </p>
                </div>
                <div class="leftposts flex">
                    <div class="tcard">
                        <div class="tcardimg">
                            <img src="img/Sausage_Pasta_1024x768.webp" alt="">
                            <span class="fa fa-star"></span>
                        </div>
                        <div class="tcardinfo flex">
                            <div class="star-rating">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </div>
                            <label class="tlabel">Pasta recipes</label>
                            <h2>Roasted Veggie Pasta</h2>
                            <p>This Roasted veggie pasta is a guaranteed to become a weekly fave!
                                Roast peppers, tomatoes and onions in a creamy red pesto sauce, totally delish and ready
                                in just 25 minutes!
                            </p>
                            <a href="pdf pages/Roasted Veggie Pasta with Feta - This Healthy Table.pdf"
                                class="catecarbtn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="tcard">
                        <div class="tcardimg">
                            <img src="img/chicken-leek-pie-v1-1153x1536.jpg" alt="">
                            <span class="fa fa-star"></span>
                        </div>
                        <div class="tcardinfo flex">
                            <div class="star-rating">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <label class="tlabel">Meals</label>
                            <h2>Chicken and Leek Pie</h2>
                            <p>This Chicken and Leek pie is a Variation on basic chicken casserole. Add leeks, bacon
                                and puff pastry for an easy for an midweek pie.
                            </p>
                            <a href="pdf pages/Chicken and Leek Pie - Everyday Cooks.pdf" class="catecarbtn">Read More
                                <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="tcard">
                        <div class="tcardimg">
                            <img src="img/steak-food.jpg" alt="">
                            <span class="fa fa-star"></span>
                        </div>
                        <div class="tcardinfo flex">
                            <div class="star-rating">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <label class="tlabel">Healthy Steak</label>
                            <h2>Steak Enchilada Skillet</h2>
                            <p>This one-skillet dinner is a breeze to pull together, making it perfect for busy
                                weeknights—plus
                                it's easy to build and adjust to taste for picky eaters.</p>
                            <a href="pdf pages/eatingwell.com_recipe_8063889_steak-enchilada-skillet__print.pdf"
                                class="catecarbtn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="tcard">
                        <div class="tcardimg">
                            <img src="img/138602409.jpg" alt="">
                            <span class="fa fa-star"></span>
                        </div>
                        <div class="tcardinfo flex">
                            <div class="star-rating">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <label class="tlabel">Fish</label>
                            <h2>Sesame Seared Salmon</h2>
                            <p>Salmon is one of the most convenient proteins to cook up on a busy weeknight.
                                Not only is it incredibly delicious and loaded with healthy fats, but it cooks up in
                                absolutelt no-time.
                            </p>
                            <a href="pdf pages/Sesame Seared Salmon.pdf" class="catecarbtn">Read More <i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="youradvertise">
                    <h1>Place Your Advertisemenst Here</h1>
                </div>
            </div>
            <div class="rightsidesec">
                <div class="aboutsec">
                    <h3 class="tdesign">About Me</h3>
                    <div class="aboutbox">
                        <img src="img/IMG_0211.JPG" alt="">
                        <p>Hi! My Name is..-->Tharun<--..I'm a MSc Information Technology Student At Robert Gordon
                                University i'm a passionate individual, Knowledge seeker and with Friendly attitude to
                                Everyone ;) </p>
                    </div>
                </div>
                <div class="toprecipe">
                    <h3 class="tdesign">Our Chef's Top Recipes</h3>
                    <div class="topreciposts flex">
                        <a href="pdf pages/Coffee and walnut loaf cake recipe _ Sainsbury`s Magazine.pdf"
                            class="trpost">
                            <img src="img/14726-Coffee-Cake.jpg" alt="">
                            <div class="trpostinfo">
                                <h4>Coffee and walnut loaf cake</h4>
                                <p>By <span>Becky Excell</span></p>
                            </div>
                        </a>
                        <a href="pdf pages/Lattice-topped fish pie _ Sainsbury`s Magazine.pdf" class="trpost">
                            <img src="img/3789-Lattice-topped-fish-pie.jpg" alt="">
                            <div class="trpostinfo">
                                <h4>Lattice-topped fish pie</h4>
                                <p>By <span>Tom Kerridge</span></p>
                            </div>
                        </a>
                        <a href="pdf pages/Veg and tofu spicy noodles recipe _ Sainsbury`s Magazine.pdf" class="trpost">
                            <img src="img/13340-SoVegan_Portraits.jpg" alt="">
                            <div class="trpostinfo">
                                <h4>Veg and tofu spicy noodles</h4>
                                <p>By <span>Roxy and Ben</span></p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="followme">
                    <h3 class="tdesign">Follow Me</h3>
                    <div class="followcards flex">
                        <a href="https://www.facebook.com/itssmetharunda/" class="socicard">
                            <i class="fa-brands fa-facebook-f"></i>
                            <h5>FACEBOOK</h5>
                            <i class="fa-solid fa-plus"></i>
                            <p>FOLLOW</p>
                        </a>
                        <a href="https://twitter.com/" class="socicard">
                            <i class="fa-brands fa-twitter"></i>
                            <h5>TWITTER</h5>
                            <i class="fa-solid fa-plus"></i>
                            <p>FOLLOW</p>
                        </a>
                        <a href="https://www.linkedin.com/in/tharun-kumar-46815b294/" class="socicard">
                            <i class="fa-brands fa-linkedin"></i>
                            <h5>LINKEDIN</h5>
                            <i class="fa-solid fa-plus"></i>
                            <p>FOLLOW</p>
                        </a>
                        <a href="https://www.youtube.com/" class="socicard">
                            <i class="fa-brands fa-youtube"></i>
                            <h5>YOUTUBE</h5>
                            <i class="fa-solid fa-plus"></i>
                            <p>FOLLOW</p>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="subscribeme">
            <div class="subscibeinfo">
                <h1>Subscribe To The CookingFoodie</h1>
                <p>Get all The Latest Recipes By Joining our Youtube Channal</p>
                <form action="https://www.youtube.com/@TheCookingFoodie" method="get" target="_blank">
                    <input type="hidden" name="sub_confirmation" value="1">
                    <label for="name">@TheCookingFoodie</label>
                    <button type="submit">Subscribe</button>
                </form>
            </div>

        </section>
    </main>

    <footer>
        <div class="container flex">
            <div class="footer flex">
                <div class="footerlogo">
                    <h1>Cooking Foodie</h1>
                    <p>I provide new recipes with a twist on daily basis. I also posts Blog about fun ideas to do
                        in
                        the kitchen</p>
                    <div class="fsocial">
                        <a href="http://facebook.com/" target="_blank" title="facebook" rel="noopener noreferrer"><i
                                class="fa-brands fa-facebook-f"></i></a>
                        <a href="http://twitter.com/" target="_blank" title="twitter" rel="noopener noreferrer"><i
                                class="fa-brands fa-twitter"></i></a>
                        <a href="http://linkedin.com/" target="_blank" title="linkedin" rel="noopener noreferrer"><i
                                class="fa-brands fa-linkedin"></i></a>
                        <a href="http://youtube.com/" target="_blank" title="youtube" rel="noopener noreferrer"><i
                                class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footernav">
                    <h3>Recipes</h3>
                    <ul class="flex">
                        <li><a
                                href="https://www.foodandwine.com/breakfast-brunch/quick-healthy-breakfasts">Breakfast</a>
                        </li>
                        <li><a href="https://pinchofyum.com/recipes/healthy-choices">Desserts</a></li>
                        <li><a href="https://pinchofyum.com/recipes/dinner">Dinner</a></li>
                        <li><a href="https://www.dairyuk.org/">Dairy</a></li>
                    </ul>
                </div>
                <div class="footernav">
                    <h3>Legal</h3>
                    <ul class="flex">
                        <li><a href="/">Privacy Policy</a></li>
                        <li><a href="/">Refund Policy</a></li>
                        <li><a href="/">Cookie Policy</a></li>
                        <li><a href="/">Terms and Conditions</a></li>
                    </ul>
                </div>
            </div>
            <div class="flex">
                <h5>&copy; 2024 Cooking Foodie All Rights Reserverd</h5>
            </div>
        </div>
    </footer>


    <script src="JS/script.js"></script>
</body>

</html>
