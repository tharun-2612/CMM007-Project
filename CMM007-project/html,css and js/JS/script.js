// Nav Sticky

const mainnav = document.querySelector('.mainnav');

window.addEventListener('scroll', () => {
    if (document.documentElement.scrollTop > 2) {
        mainnav.classList.add('sticky');
    } else {
        mainnav.classList.remove('sticky');
    }
});

// slider header

const posts = [
    {
        title: "Brownie Cookies",
        description: "The 1-minute Brownie Cookie is a perfect Treat when you suddenly crave something sweet.it is called a 1-minute cookie because it takes less than a minute to cook in the microwave.This Brownie Cookie(Brookie) is super fudgy!",
        link: "https://www.fitfoodieselma.com/wprm_print/4508",
        backgroundImage: "img/cookies-7.jpg",
        label: "cookies"
    },
    {
        title: "Caramel Cookies",
        description: "These Salted Caramel Cookies are a match in caramel + Flaky sea salt + white chocolate chip Heaven. Not only do they taste amazing,but the recipe is incredibly easy!",
        link: "https://www.modernhoney.com/wprm_print/17382/",
        backgroundImage: "img/cookies-6.jpg",
        label: "cookies"
    },
    {
        title: "Classic CheesePizza",
        description: "Sometimes all you want at the end of the day is a simple cheese pizza this recipe turns simple into sublime with the addition of an execptional pizzadough, low-moisture mozzarella cheese, and an easy to make tomato sauce that Hits",
        link: "https://www.foodandwine.com/recipes/classic-cheese-pizza?print/",
        backgroundImage: "img/cheesepizza.jpg",
        label: "Pizzas"
    },
    {
        title: "Breakfast recipes",
        description: "Big breakfast ideas for weekend feasting and indulgent weekday mornings, from the full English breakfast to to fluffy pancakes and overnight oat!",
        link: "https://www.foodandwine.com/breakfast-brunch/quick-healthy-breakfasts/",
        backgroundImage: "img/break-fast.jpg",
        label: "pizza"
    },
    {
        title: "Grilled-Chicken",
        description: "Sometimes in cooking the simplest dish are the hardest to get right , and grilled chicken is a perfect example,This recipe girantees juicy, falvourful chicken every time!",
        link: "https://www.wellplated.com/wprm_print/68118/",
        backgroundImage: "img/grill.jpg",
        label: "cookies"
    }
];

let currentSlide = 0;


function showSlide(slideIndex) {
    const slide = posts[slideIndex];
    document.querySelector('.headertitle').textContent = slide.title;
    document.querySelector('.headerpera').textContent = slide.description;
    document.querySelector('.headerbtn').href = slide.link;
    document.querySelector('.headerimg').style.backgroundImage = `url(${slide.backgroundImage})`;
}

// Initial slide
showSlide(currentSlide);


// header posts change slider
const headerPosts = document.querySelector('.headercards');


const headerPostsCards = () => {

    const updateSlider = () => {
        headerPosts.innerHTML = ''; // Clear existing content   
        for (let i = currentSlide; i < currentSlide + 6; i++) {
            const post = posts[i % posts.length];
            const postElement = document.createElement('a');
            postElement.classList.add('headercard');
            postElement.classList.add('flex');
            postElement.href = `${post.link}`;
            postElement.innerHTML = `
               <img src="${post.backgroundImage}" alt="">
               <div class="hcardinfo">
                   <span>${post.label}</span>
                   <h3>${post.title}</h3>
               </div>
           `;
            headerPosts.appendChild(postElement);
        }
    };

    // left right scroll
    const leftBtn = document.getElementById('sleft');
    const rightBtn = document.getElementById('sright');

    leftBtn.addEventListener('click', function () {
        currentSlide = (currentSlide - 6 + posts.length) % posts.length;
        updateSlider();
        showSlide(currentSlide);
    });

    rightBtn.addEventListener('click', function () {
        currentSlide = (currentSlide + 6) % posts.length;
        updateSlider();
        showSlide(currentSlide);
    });

    // Initialize the slider
    updateSlider();
};

headerPostsCards();


function nextSlide() {
    currentSlide = (currentSlide + 1) % posts.length;
    showSlide(currentSlide);
    headerPostsCards(currentSlide);
}

// Change slide every 3 seconds
setInterval(nextSlide, 4000);





// searchinput js
const searchon = document.querySelector('#searchopen');
const searchoff = document.querySelector('#removesearch');
const searchinput = document.querySelector('.searchinput');

searchinput.style.display = "none";

searchon.addEventListener('click', () => {
    if (searchinput.style.display === 'none') {
        searchinput.style.display = 'flex'
    } else {
        searchinput.style.display = 'none'
    }
})

searchoff.addEventListener('click', () => {
    if (searchinput.style.display === 'flex') {
        searchinput.style.display = 'none'
    } else {
        searchinput.style.display = 'flex'
    }
});


// dark mode javaScript


const darkmode = document.querySelector('#checkbox');
let body = document.body;
const logoImage = document.querySelector('.logo img');
const logoImage2 = document.querySelector('.titleicon img');

// Check if there is a stored dark mode preference in localStorage
const isDarkMode = localStorage.getItem('darkMode') === 'true';

// Set the initial state based on the stored preference
if (isDarkMode) {
    body.classList.add('dark');
    darkmode.checked = true;
    logoImage.src = 'img/favicon.png';
    logoImage2.src = 'img/favicon.png';
} else {
    logoImage.src = 'img/logo.png';
    logoImage2.src = 'img/logo.png';
}

darkmode.addEventListener('change', () => {
    if (darkmode.checked) {
        body.classList.add('dark');
        localStorage.setItem('darkMode', 'true');
        logoImage.src = 'img/favicon.png';
        logoImage2.src = 'img/favicon.png';
    } else {
        body.classList.remove('dark');
        localStorage.setItem('darkMode', 'false');
        logoImage.src = 'img/logo.png';
        logoImage2.src = 'img/logo.png';
    }
});



// navonoff js

const navdiv = document.querySelector('.navonoff');
const navtoggle = document.querySelector('#checkbox2');
const navlist = document.querySelector('.navlist');

navtoggle.addEventListener('change', ()=>{
    if (navtoggle.checked) {
        navlist.style.right = '-150px'
    } else {
        navlist.style.right = '-400px'
    }
})