// Example JavaScript to handle actions on buttons (e.g., Edit/Delete products, Orders, etc.)

// Example: Handling product deletion
document.querySelectorAll('button.delete-product').forEach(button => {
    button.addEventListener('click', () => {
        const productId = button.dataset.productId;
        // Logic to delete product by ID
        alert(`Product ${productId} deleted!`);
    });
});

// Example: Handle logout button click
document.querySelector('.logout').addEventListener('click', () => {
    window.location.href = 'login.html';  // Redirect to login page
});


function toggleMenu() {
    document.querySelector(".nav-links ul").classList.toggle("active");
}
