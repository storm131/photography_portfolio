// Initialize cart count and cart items array
let cartCount = 0;
let cartItems = [];

// Select all "Add to Cart" buttons
document.querySelectorAll('.add-to-cart').forEach((button, index) => {
    button.addEventListener('click', function() {
        // Increase cart count
        cartCount++;

        // Get the selected item (from the gallery)
        const itemName = document.querySelectorAll('.gallery-item img')[index].alt;
        cartItems.push(itemName);

        // Update cart count in the header
        document.querySelector('#cart-count').textContent = cartCount;

        // Display cart items in the cart section
        if (cartCount > 0) {
            document.querySelector('#cart-items').innerHTML = `
                <p>You have ${cartCount} item(s) in your cart:</p>
                <ul>${cartItems.map(item => `<li>${item}</li>`).join('')}</ul>`;
        } else {
            document.querySelector('#cart-items').innerHTML = `<p>No items in cart</p>`;
        }
    });
});
