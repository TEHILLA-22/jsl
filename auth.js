// Initialize Firebase
firebase.initializeApp(firebaseConfig);

const auth = firebase.auth();

// Function to toggle between login & signup
function toggleForm() {
    const loginForm = document.querySelector(".auth-container");
    const signupForm = document.getElementById("signup-container");
   
    if (loginForm.style.display === "none") {
        loginForm.style.display = "block";
        signupForm.style.display = "none";
    } else {
        loginForm.style.display = "none";
        signupForm.style.display = "block";
    }
}

// Sign Up Function
function signup() {
    const email = document.getElementById("signup-email").value;
    const password = document.getElementById("signup-password").value;

    auth.createUserWithEmailAndPassword(email, password)
        .then((userCredential) => {
            alert("Admin Registered Successfully!");
            toggleForm();
        })
        .catch((error) => {
            alert(error.message);
        });
}

// Login Function
function login() {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    auth.signInWithEmailAndPassword(email, password)
        .then((userCredential) => {
            alert("Login Successful!");
            window.location.href = "dashboard.html"; // Redirect to admin panel
        })
        .catch((error) => {
            alert(error.message);
        });
}