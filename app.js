const wrapper = document.querySelector(".sliderWrapper");
const menuItems = document.querySelectorAll(".menuItem");

const products = [
  {
    id: 1,
    title: "Air Force",
    desc: "Discover the perfect blend of classic design and modern comfort with our Air Force shoes collection. Renowned for their iconic silhouette and unmatched durability, Air Force shoes are a staple in streetwear fashion and a must-have for any sneaker enthusiast.",
    price: 119,
    colors: [
      {
        code: "black",
        img: "./img/air.png",
      },
      {
        code: "darkblue",
        img: "./img/air2.png",
      },
    ],
  },
  {
    id: 2,
    title: "Air Jordan",
    desc: "Step into a legacy of excellence with our Air Jordans collection. Celebrated for their revolutionary design and association with basketball legend Michael Jordan, these sneakers are a symbol of performance and style.",
    price: 149,
    colors: [
      {
        code: "lightgray",
        img: "./img/jordan.png",
      },
      {
        code: "green",
        img: "./img/jordan2.png",
      },
    ],
  },
  {
    id: 3,
    title: "Blazer",
    desc: "Step into a blend of retro charm and modern flair with our Blazer collection. Known for their sleek design and versatile style, Blazer shoes are a timeless addition to any wardrobe.",
    price: 109,
    colors: [
      {
        code: "lightgray",
        img: "./img/blazer.png",
      },
      {
        code: "green",
        img: "./img/blazer2.png",
      },
    ],
  },
  {
    id: 4,
    title: "Crater",
    desc: "Experience the future of footwear with our Craters collection. Combining cutting-edge design with sustainable materials, Craters shoes are a leap forward in style and environmental consciousness.",
    price: 129,
    colors: [
      {
        code: "black",
        img: "./img/crater.png",
      },
      {
        code: "lightgray",
        img: "./img/crater2.png",
      },
    ],
  },
  {
    id: 5,
    title: "Hippie",
    desc: "Embrace a fresh take on eco-friendly fashion with our Hippies collection. Combining sustainability with comfort and style, Hippies shoes are perfect for the environmentally conscious trendsetter.",
    price: 99,
    colors: [
      {
        code: "gray",
        img: "./img/hippie.png",
      },
      {
        code: "black",
        img: "./img/hippie2.png",
      },
    ],
  },
];

let choosenProduct = products[0];

const currentProductImg = document.querySelector(".productImg");
const currentProductTitle = document.querySelector(".productTitle");
const currentProductPrice = document.querySelector(".productPrice");
const currentProductColors = document.querySelectorAll(".color");
const currentProductSizes = document.querySelectorAll(".size");
const currentProductDesc = document.querySelector(".productDesc");

menuItems.forEach((item, index) => {
  item.addEventListener("click", () => {
    //change the current slide
    wrapper.style.transform = `translateX(${-100 * index}vw)`;

    //change the choosen product
    choosenProduct = products[index];

    //change texts of currentProduct
    currentProductTitle.textContent = choosenProduct.title;
    currentProductPrice.textContent = "$" + choosenProduct.price;
    currentProductDesc.textContent = choosenProduct.desc;
    currentProductImg.src = choosenProduct.colors[0].img;

    document.getElementById("x").value=choosenProduct.title;

    //assing new colors
    currentProductColors.forEach((color, index) => {
      color.style.backgroundColor = choosenProduct.colors[index].code;
      document.getElementById("y").value=choosenProduct.colors[index].code;
    });
  });
});

function updateProductDetails(product) {
  document.getElementById("x").value = product.title; // Update product name
  document.getElementById("y").value = product.colors[0].code; // Update product color (defaulting to the first color)
}

currentProductColors.forEach((color, index) => {
  color.addEventListener("click", () => {
      currentProductImg.src = choosenProduct.colors[index].img;
      updateProductDetails(choosenProduct);
  });
});

// Handling size selection
currentProductSizes.forEach((size) => {
  size.addEventListener("click", () => {
      // Reset background color and text color for all sizes
      currentProductSizes.forEach((s) => {
          s.style.backgroundColor = "white";
          s.style.color = "black";
      });
      // Highlight the selected size
      size.style.backgroundColor = "black";
      size.style.color = "white";
      // Update product size
      document.getElementById("z").value = size.textContent;
      updateProductDetails(choosenProduct);
  });
});


// Function to check login status
function checkLoginStatus(callback) {
  fetch('check_login_status.php')
    .then(response => response.json())
    .then(data => {
      callback(data.logged_in);
    })
    .catch(error => console.error('Error checking login status:', error));
}

function updateLoginStatus() {
  fetch('check_login_status.php')
    .then(response => response.json())
    .then(data => {
      if (data.logged_in) {
        document.querySelector('.log').textContent = 'Logout';
        document.querySelector('.log').href = 'logout.php';
      } else {
        document.querySelector('.log').textContent = 'Login';
        document.querySelector('.log').href = 'login.html';
      }
    })
    .catch(error => console.error('Error checking login status:', error));
}

// Call the function on page load
document.addEventListener('DOMContentLoaded', updateLoginStatus);


const productButton = document.querySelector(".productButton");
const payment = document.querySelector(".payment");
const close = document.querySelector(".close");


productButton.addEventListener("click", () => {
  checkLoginStatus(isLoggedIn => {
    if (isLoggedIn) {
      payment.style.display = "flex";
      close.addEventListener("click", () => {
        payment.style.display = "none";
      });
    } else {
      alert("You must be logged in to buy a product. Redirecting to login page...");
      window.location.href = "login.html";
    }
  });
});

// Handling size selection
// Function to update product details in the form

