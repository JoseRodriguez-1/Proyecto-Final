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
        

        function addToCart(productName) {
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
        