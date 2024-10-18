const cart = []; 
const shopContainer = document.getElementById('shop');
const cartTotal = document.getElementById('cart-total');
const cartProductsContainer = document.getElementById('cart-products-container'); 
const finishButton = document.getElementById('finish-button');
const cancelButton = document.getElementById('cancel-button');
let isFirstAddition = true; 
let orderCompleted = false; 

document.querySelector(".btn-shop").addEventListener("click", toggleMenu);

function toggleMenu() {
  document.querySelector(".shop").classList.toggle("show");
}

function updateCart() {
    cartProductsContainer.innerHTML = ''; 

    if (cart.length > 0) {
        if (isFirstAddition) {
            shopContainer.classList.add('show');
            isFirstAddition = false;
        }

        const total = cart.reduce((sum, item) => sum + item.price, 0);

        cartTotal.innerText = 'Total: $' + total;

        const productsHTML = cart.map(item => `
            <div class="product">
                <p>${item.name}</p>
                <p>$${item.price}</p>
            </div>
        `).join('');

        cartProductsContainer.innerHTML = productsHTML; 
    } else {
        shopContainer.classList.remove('show');
        cartTotal.innerText = 'Total: $0'; 
    }
}

document.querySelectorAll('.add-cart').forEach(button => {
    button.addEventListener('click', function() {
        if (!orderCompleted) { 
            const pizzaName = this.parentElement.querySelector('h3').innerText;
            const pizzaPrice = parseInt(this.getAttribute('data-price'));

            if (!isNaN(pizzaPrice) && pizzaPrice > 0) { 
                cart.push({ name: pizzaName, price: pizzaPrice });
                updateCart();
            } else {
                console.error("Error: El precio de la pizza no es válido.");
            }
        }
    });
});

cancelButton.addEventListener('click', function() {
    cart.length = 0;
    updateCart(); 
    document.querySelectorAll('.add-cart').forEach(button => button.disabled = false);
    finishButton.disabled = false; 
});


finishButton.addEventListener('click', function() {
    if (cart.length > 0) {
        finishButton.innerText = 'Pedido realizado';
        orderCompleted = true; 
        updateCart(); 
        document.querySelectorAll('.add-cart').forEach(button => button.disabled = true);
        finishButton.disabled = true;
    }
});



