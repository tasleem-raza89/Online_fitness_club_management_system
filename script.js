document.addEventListener("DOMContentLoaded", () => {
    const navbar = document.querySelector(".navbar");
    const hamburger = document.querySelector(".hamburger");
    const navLinks = document.querySelector(".nav-links");
    
    window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
            navbar.classList.add("sticky");
        } else {
            navbar.classList.remove("sticky");
        }
    });
    
    hamburger.addEventListener("click", () => {
        navLinks.classList.toggle("open");
        hamburger.classList.toggle("active");
    });
});

let cart = [];

        function addToCart(product, price) {
            let existingItem = cart.find(item => item.product === product);
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push({ product, price, quantity: 1 });
            }
            updateCart();
        }

        function updateCart() {
            let cartItems = document.getElementById('cart-items');
            let cartCount = document.getElementById('cart-count');
            let cartTotal = document.getElementById('cart-total');
            
            cartItems.innerHTML = "";
            let total = 0;
            let itemCount = 0;

            cart.forEach((item, index) => {
                total += item.price * item.quantity;
                itemCount += item.quantity;
                cartItems.innerHTML += `
                    <div class="cart-item">
                        <span>${item.product}</span>
                        <button onclick="changeQuantity(${index}, -1)">➖</button>
                        <span>${item.quantity}</span>
                        <button onclick="changeQuantity(${index}, 1)">➕</button>
                        <button onclick="removeFromCart(${index})">❌</button>
                    </div>
                `;
            });

            cartCount.innerText = itemCount;
            cartTotal.innerText = total.toFixed(2);
        }

        function changeQuantity(index, amount) {
            cart[index].quantity += amount;
            if (cart[index].quantity <= 0) {
                cart.splice(index, 1);
            }
            updateCart();
        }

        function removeFromCart(index) {
            cart.splice(index, 1);
            updateCart();
        }

        function toggleCart() {
            let cartBox = document.getElementById('cart');
            cartBox.style.display = cartBox.style.display === 'block' ? 'none' : 'block';
        }

        


function openModal() {
    document.getElementById('loginModal').style.display = "block";
    document.getElementById('overlay').style.display = "block";
}

function closeModal() {
    document.getElementById('loginModal').style.display = "none";
    document.getElementById('signupModal').style.display = "none";
    document.getElementById('overlay').style.display = "none";
}

function switchModal() {
    let login = document.getElementById('loginModal');
    let signup = document.getElementById('signupModal');

    if (login.style.display === "block") {
        login.style.display = "none";
        signup.style.display = "block";
    } else {
        signup.style.display = "none";
        login.style.display = "block";
    }
}



let paymentType = "";

function requestOTP(type) {
    paymentType = type;
    const mobileNumber = document.getElementById(`${type}-mobile`).value;

    if (!mobileNumber) {
        alert("Please enter a mobile number");
        return;
    }

    fetch("generate_otp.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `mobile_number=${mobileNumber}&payment_type=${type}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("OTP sent successfully (Simulated).");
            document.getElementById("otp-modal").style.display = "block";
        } else {
            alert("Error generating OTP.");
        }
    });
}

function verifyOTP() {
    const otp = document.getElementById("otp-input").value;
    const mobileNumber = document.getElementById(`${paymentType}-mobile`).value;

    fetch("verify_otp.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `mobile_number=${mobileNumber}&otp=${otp}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Payment Successful!");
            document.getElementById("otp-modal").style.display = "none";
        } else {
            alert("Invalid OTP, please try again.");
        }
    });
}

function closeModal() {
    document.getElementById("otp-modal").style.display = "none";
}


        



document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".subscribe-btn");

    buttons.forEach(button => {
        button.addEventListener("click", () => {
            alert("Subscription activated! Enjoy your workout!");
        });
    });
});



// Firebase Config
const firebaseConfig = {
    apiKey: "YOUR_API_KEY",
    authDomain: "YOUR_AUTH_DOMAIN",
    databaseURL: "YOUR_DATABASE_URL",
    projectId: "YOUR_PROJECT_ID",
    storageBucket: "YOUR_STORAGE_BUCKET",
    messagingSenderId: "YOUR_SENDER_ID",
    appId: "YOUR_APP_ID"
};
firebase.initializeApp(firebaseConfig);

const db = firebase.database();

// Fetch YouTube Live Link or Zoom API Link
document.getElementById('live-stream').src = "https://www.youtube.com/embed/YOUR_LIVE_VIDEO_ID";

// Live Chat System
const chatMessages = document.getElementById("chat-messages");
const chatInput = document.getElementById("chat-input");

function sendMessage() {
    let message = chatInput.value;
    db.ref("chat").push({ message });
    chatInput.value = "";
}

// Listen for New Messages
db.ref("chat").on("child_added", (snapshot) => {
    let msg = snapshot.val().message;
    chatMessages.innerHTML += `<p>${msg}</p>`;
});

// Subscription with Stripe
function subscribe() {
    fetch('/subscribe', { method: 'POST' })
    .then(response => response.json())
    .then(data => window.location.href = data.url);
}


// Logout Function
function logoutUser() {
    fetch("logout.php")
    .then(() => {
        alert("Logout successful!"); // Logout hone ka alert
        window.location.reload(); // Page refresh karega taaki login button wapas aaye
    });
}



document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".buttons");
    const images = document.querySelectorAll(".image-container .image");

    buttons.forEach(button => {
        button.addEventListener("click", function () {
            document.querySelector(".buttons.active").classList.remove("active");
            this.classList.add("active");

            let filter = this.getAttribute("data-filter");

            images.forEach(img => {
                if (filter === "all" || img.classList.contains(filter)) {
                    img.style.display = "block";
                } else {
                    img.style.display = "none";
                }
            });
        });
    });
});



