document.addEventListener('DOMContentLoaded', () => {
    const cart = [];
    const cartItems = document.getElementById('cart-items');
    const totalPriceEl = document.getElementById('total-price');

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', () => {
            const productName = button.getAttribute('data-name');
            const productPrice = parseFloat(button.getAttribute('data-price'));

            const product = { name: productName, price: productPrice };
            cart.push(product);
            updateCart();
        });
    });

    function updateCart() {
        cartItems.innerHTML = '';
        let total = 0;
        
        cart.forEach((product, index) => {
            const li = document.createElement('li');
            li.textContent = `${product.name} - R$${product.price.toFixed(2)}`;
            cartItems.appendChild(li);
            total += product.price;
        });

        totalPriceEl.textContent = `R$${total.toFixed(2)}`;
    }
});

