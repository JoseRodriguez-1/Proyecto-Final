        function moveSlide(carouselId, direction) {
            const slide = document.querySelector(`#${carouselId} .carousel-slide`);
            const items = slide.querySelectorAll('.carousel-item');
            const totalItems = items.length;
            let currentIndex = parseInt(slide.getAttribute('data-current-index')) || 0;

            currentIndex += direction;

            if (currentIndex < 0) {
                currentIndex = totalItems - 1;
            } else if (currentIndex >= totalItems) {
                currentIndex = 0;
            }

            slide.style.transform = `translateX(${-currentIndex * 100}%)`;
            slide.setAttribute('data-current-index', currentIndex);
        }

        document.addEventListener('DOMContentLoaded', () => {
            const carousels = document.querySelectorAll('.carousel-container');

            carousels.forEach(carousel => {
                const prevButton = carousel.querySelector('.prev');
                const nextButton = carousel.querySelector('.next');
                const carouselId = carousel.getAttribute('id');

                prevButton.addEventListener('click', () => moveSlide(carouselId, -1));
                nextButton.addEventListener('click', () => moveSlide(carouselId, 1));
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            let cartCount = 0;

            const addToCartButtons = document.querySelectorAll('.button');
            
            addToCartButtons.forEach(button => {
                button.addEventListener('click', () => {
                    cartCount++;
                    updateCartCounter();
                });
            });

            function updateCartCounter() {
                const cartCounter = document.getElementById('cart-counter');
                cartCounter.textContent = cartCount;
            }
        });

        function showNotification(message) {
            const notificationContainer = document.getElementById('notification-container');
            const notification = document.createElement('div');
            notification.className = 'notification';
            notification.textContent = message;
        
            notificationContainer.appendChild(notification);
        
            setTimeout(() => {
                notification.style.opacity = '0';
                setTimeout(() => {
                    notificationContainer.removeChild(notification);
                }, 500); // Tiempo para la animación de desaparición
            }, 3000); // Tiempo que la notificación permanece visible
        }
        

        // Añadir un producto al carrito
// Añadir un producto al carrito con imagen
function addToCart(productName, price, imageSrc) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let productIndex = cart.findIndex(product => product.name === productName);

    if (productIndex !== -1) {
        // Si el producto ya está en el carrito, incrementa la cantidad
        cart[productIndex].quantity += 1;
    } else {
        // Si no está en el carrito, agrégalo
        let product = {
            name: productName,
            price: price,
            quantity: 1,
            image: imageSrc
        };
        cart.push(product);
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCounter();
    Swal.fire({
        title: '¡Producto Añadido!',
        text: `${productName} ha sido añadido al carrito.`,
        icon: 'success',
        confirmButtonText: 'Aceptar',
        background: '#1b0031',
        color: '#ffcc00',
        confirmButtonColor: '#ff8000',
        customClass: {
            popup: 'animated tada'
        }
    });
}

// Actualizar el contador del carrito
function updateCartCounter() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let totalQuantity = cart.reduce((sum, product) => sum + product.quantity, 0);
    let cartCounterElement = document.getElementById('cart-counter');
    
    if (cartCounterElement) {
        cartCounterElement.innerText = totalQuantity;
    }
}

// Mostrar el carrito de compras
function renderCart() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let cartTableBody = document.querySelector("#cart-table tbody");
    let cartTotalElement = document.querySelector("#cart-total .total-precio");
    cartTableBody.innerHTML = ''; // Limpiar contenido actual

    let total = 0;

    cart.forEach((product, index) => {
        let productTotal = product.price * product.quantity;
        total += productTotal;

        let row = `
            <tr>
                <td>${product.name}</td>
                <td><img src="${product.image}" alt="${product.name}" class="product-image"></td>
                <td>$${product.price.toFixed(2)}</td>
                <td>${product.quantity}</td>
                <td>$${productTotal.toFixed(2)}</td>
                <td><button class="remove-button" onclick="removeFromCart(${index})">Eliminar</button></td>
            </tr>
        `;

        cartTableBody.innerHTML += row;
    });

    cartTotalElement.innerText = `$${total.toFixed(2)}`;
}

// Eliminar un producto del carrito
function removeFromCart(index) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.splice(index, 1); // Elimina el producto de la posición indicada
    localStorage.setItem('cart', JSON.stringify(cart));
    renderCart(); // Vuelve a mostrar el carrito actualizado
    updateCartCounter(); // Actualiza el contador del carrito
}

// Inicializar los eventos necesarios
document.addEventListener('DOMContentLoaded', () => {
    updateCartCounter();
    if (document.querySelector("#cart-table")) {
        renderCart();
    }
});

