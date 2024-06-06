// // 

// function updateAllTotal() {
//     const orderItems = document.querySelectorAll('.order_item');
//     let total = 0;
//     orderItems.forEach(item => {
//         // alert("sa");
//         const price = parseInt(item.querySelector('.order_price').textContent.replace(/\D/g, ''));
//         total += price;
//     });
//     document.querySelector('.all_total').textContent = total.toLocaleString() + 'đ';
// }

// function createOrderItemNode(product) {
//     const orderItem = document.createElement('div');
//     orderItem.className = 'order_item';
//     const productName = product.querySelector('.product-name').textContent;
//     const productDescription = product.querySelector('.product-decribe').textContent;
//     const productQuantity = product.querySelector('.quantity_values').value;
//     const productPrice = product.querySelector('.price').value;
//     const productId = product.querySelector('.product-id').value;
//     const productSize = product.querySelector('.size').value;

//     orderItem.innerHTML = `
//       <div class="order_name">${productName}</div>
//       <input type="hidden" class="order_id" value="${productId}"\>
//       <input type="hidden" class="order_size" value="${productSize}"\>
//       <div class="order_description">${productDescription}</div>
//       <div class="order_quantity">SL: ${productQuantity}</div>
//       <div class="order_price">Thành tiền: ${(productPrice * productQuantity).toLocaleString()}đ</div>
//   `;
//         // Get selected items from session storage
//         let selectedItems = JSON.parse(sessionStorage.getItem('selectedItems')) || [];
//         // Add current product to selected items
//         selectedItems.push({
//             productName: productName,
//             productDescription: productDescription,
//             productQuantity: productQuantity,
//             productPrice: productPrice,
//             productId: productId,
//             productSize: productSize
//         });
//         // Save updated selected items back to session storage
//         sessionStorage.setItem('selectedItems', JSON.stringify(selectedItems));
  
//     return orderItem;
// }

// function updateOrderItemNode(product) {
//     const productName = product.querySelector('.product-name').textContent;
//     const productQuantity = product.querySelector('.quantity_values').value;
//     const productPrice = product.querySelector('.price').value;
//     const productid = product.querySelector('.product-id').value;
//     const productsize = product.querySelector('.size').value;

//     const orderItems = document.querySelectorAll('.order_item');
//     orderItems.forEach(item => {

//         if ((item.querySelector('.order_id').value == productid) && (item.querySelector('.order_size').value == productsize)) 
//         {
            
//             item.querySelector('.order_quantity').textContent = 'SL: ' + productQuantity;
//             item.querySelector('.order_price').textContent = 'Đơn giá: ' + (productPrice * productQuantity).toLocaleString() + 'đ';
//         }

//     });
// }

// document.querySelectorAll('.checkbox').forEach(checkbox => {
//     checkbox.addEventListener('change', function () {
//         const product = this.closest('.item');
//         const orderContainer = document.querySelector('.order_items');
//         if (this.checked) {
//             const orderItem = createOrderItemNode(product);
//             orderContainer.appendChild(orderItem);
//         } else {
//             const productid = product.querySelector('.product-id').value;
//             const productsize = product.querySelector('.size').value;
//             const orderItems = document.querySelectorAll('.order_item');
//             orderItems.forEach(item => {
//                 if ((item.querySelector('.order_id').value == productid) && (item.querySelector('.order_size').value == productsize)) {
//                     orderContainer.removeChild(item);
//                 }
//             });
//             removeSelectedItemFromSession(productId, productSize);
//         }
//         updateAllTotal();
//     });
// });

// // Function to update the session item
// function updateSessionItem(product, quantity) {
//     const productId = product.querySelector('.product-id').value;
//     const productSize = product.querySelector('.size').value;
//     let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
//     let existingProduct = cart.find(item => (item.product_id === productId && item.product_size === productSize));
//     if (existingProduct) existingProduct.product_quantity = quantity;
//     sessionStorage.setItem('cart', JSON.stringify(cart));
// }

// // Function to remove selectedItem from session storage
// function removeSelectedItemFromSession(productId, productSize) {
//     let selectedItems = JSON.parse(sessionStorage.getItem('selectedItems')) || [];
//     selectedItems = selectedItems.filter(item => !(item.productId === productId && item.productSize === productSize));
//     sessionStorage.setItem('selectedItems', JSON.stringify(selectedItems));
// }

// // Add event listener to window beforeunload event

// window.onload=function(){
//     // Remove selectedItem from session storage if it exists
   
//     let selectedItem = JSON.parse(sessionStorage.getItem('selectedItems'))||[];
//     if (selectedItem) {
//         sessionStorage.removeItem('selectedItems');
//     }
// }

// // Rest of your code...

// document.querySelectorAll('.quantity_values').forEach(input => {
//     input.addEventListener('input', function () {
//         const product = this.closest('.item');
//         const thisInventory = parseInt(product.querySelector('.inventory').value);
//         let quantity = parseInt(this.value);
//         quantity = (isNaN(quantity) || quantity == 0) ? 1 : quantity;
//         quantity = (quantity > thisInventory) ? thisInventory : quantity;
//         this.value = quantity;
//         const pricePerItem = parseInt(product.querySelector('.price').value);
//         const totalElement = product.querySelector('.total');
//         totalElement.textContent = (pricePerItem * quantity).toLocaleString() + 'đ';
//         const productId = product.querySelector('.product-id').value;
//         const productSize = product.querySelector('.size').value;
//         if (product.querySelector('.checkbox').checked) {
//             updateOrderItemNode(product);
//             updateAllTotal();
//         }
//         let login = document.getElementById('customer-id').value;
//         if (!login) {
//             let cart = JSON.parse(sessionStorage.getItem('cart'));
//             if (cart) updateSessionItem(product, quantity);
//             // Update selected item quantity in session storage
           
//         }
//         updateSelectedItemQuantity(productId, productSize, quantity);
//     });
// });



// document.querySelectorAll('.decrease_button').forEach(button => {
//     button.addEventListener('click', function () {
//         const quantityInput = this.nextElementSibling;
//         let quantity = parseInt(quantityInput.value);

//         if (quantity > 1) {
//             quantity--;
//             quantityInput.value = quantity;
//             quantityInput.dispatchEvent(new Event('input'));

//             // let cart = JSON.parse(sessionStorage.getItem('cart'));
//             // if(cart) UpdatSession(this,cart,quantity);
//             let login=document.getElementById('customer-id').value;
//             if(!login)
//             {
//                 let cart = JSON.parse(sessionStorage.getItem('cart'));
//                 if(cart){ 
//                     // UpdatSession(this,cart,amount);
//                     updateSessionItem(this.closest('.item'), quantity);}

//             }
//         }

//     });
// });

// document.querySelectorAll('.increase_button').forEach(button => {
//     button.addEventListener('click', function () {
//         const quantityInput = this.previousElementSibling;
//         let quantity = parseInt(quantityInput.value);
//         const next = this.nextElementSibling;
//         let inventory = parseInt(next.value);
//         if (quantity < inventory) {
//             quantity++;
//             quantityInput.value = quantity;
//             quantityInput.dispatchEvent(new Event('input'));
//             let login=document.getElementById('customer-id').value;
//             if(!login)
//             {
//                 let cart = JSON.parse(sessionStorage.getItem('cart'));
//                 if(cart)
//                     { 
//                         // UpdatSession(this,cart,amount);
//                         updateSessionItem(this.closest('.item'), quantity);
//                     }
//             }
//         }
//     });
// });
// function UpdatSession(node , cart, quantity)
// {
//         const product = node.closest('.item');
//         const productid = product.querySelector('.product-id').value;
//         const productsize = product.querySelector('.size').value;
//         let existingProduct = cart.find(item => (item.product_id === productid && item.product_size === productsize));
//         if (existingProduct) existingProduct.product_quantity = quantity;
//         sessionStorage.setItem('cart', JSON.stringify(cart));
// }

// document.querySelectorAll('.remove').forEach(removeButton => {
//     removeButton.addEventListener('click', function () {
//         const product = this.closest('.item');
//         const productid = product.querySelector('.product-id').value;
//         const productsize = product.querySelector('.size').value;
//         // const productName = product.querySelector('.product-name').textContent;
//         const orderContainer = document.querySelector('.order_items');
//         const checkbox = product.querySelector('.checkbox');
//         if (checkbox.checked) {
//             const orderItems = document.querySelectorAll('.order_item');
//             orderItems.forEach(item => {
//                 if ((item.querySelector('.order_id').value == productid) && (item.querySelector('.order_size').value == productsize)) {

//                     orderContainer.removeChild(item);
//                 }
//             });
//         }
//         product.remove();
//         updateAllTotal();
        
//         var cart = JSON.parse(sessionStorage.getItem('cart'));
//         if(cart)
//         {
//             cart = cart.filter(item => !(item.product_id === productid && item.product_size === productsize)) ;
//             sessionStorage.setItem('cart', JSON.stringify(cart));
//         }
//         countProductsInCart();
//     });
// });

function updateAllTotal() {
    const orderItems = document.querySelectorAll('.order_item');
    let total = 0;
    orderItems.forEach(item => {
        const price = parseInt(item.querySelector('.order_price').textContent.replace(/\D/g, ''));
        total += price;
    });
    document.querySelector('.all_total').textContent = total.toLocaleString() + 'đ';
}

function createOrderItemNode(product) {
    const orderItem = document.createElement('div');
    orderItem.className = 'order_item';
    const productName = product.querySelector('.product-name').textContent;
    const productDescription = product.querySelector('.product-decribe').textContent;
    const productQuantity = product.querySelector('.quantity_values').value;
    const productPrice = product.querySelector('.price').value;
    const productId = product.querySelector('.product-id').value;
    const productSize = product.querySelector('.size').value;

    // Create the order item HTML
    orderItem.innerHTML = `
        <div class="order_name">${productName}</div>
        <input type="hidden" class="order_id" value="${productId}"\>
        <input type="hidden" class="order_size" value="${productSize}"\>
        <div class="order_description">${productDescription}</div>
        <div class="order_quantity">SL: ${productQuantity}</div>
        <div class="order_price">Đơn giá: ${(productPrice * productQuantity).toLocaleString()}đ</div>
    `;

    // Get selected items from session storage
    let selectedItems = JSON.parse(sessionStorage.getItem('selectedItems')) || [];
    // Add current product to selected items
    selectedItems.push({
        productName: productName,
        productDescription: productDescription,
        productQuantity: productQuantity,
        productPrice: productPrice,
        productId: productId,
        productSize: productSize,
     
    });
    // Save updated selected items back to session storage
    sessionStorage.setItem('selectedItems', JSON.stringify(selectedItems));

    return orderItem;
}


function updateOrderItemNode(product) {
    const productName = product.querySelector('.product-name').textContent;
    const productQuantity = product.querySelector('.quantity_values').value;
    const productPrice = product.querySelector('.price').value;
    const productId = product.querySelector('.product-id').value;
    const productSize = product.querySelector('.size').value;

    const orderItems = document.querySelectorAll('.order_item');
    orderItems.forEach(item => {
        if ((item.querySelector('.order_id').value == productId) && (item.querySelector('.order_size').value == productSize)) {
            item.querySelector('.order_quantity').textContent = 'SL: ' + productQuantity;
            item.querySelector('.order_price').textContent = 'Đơn giá: ' + (productPrice * productQuantity).toLocaleString() + 'đ';
        }
    });
}

// Function to update the session item
function updateSessionItem(product, quantity) {
    const productId = product.querySelector('.product-id').value;
    const productSize = product.querySelector('.size').value;
    let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
    let existingProduct = cart.find(item => (item.product_id === productId && item.product_size === productSize));
    if (existingProduct) existingProduct.product_quantity = quantity;
    sessionStorage.setItem('cart', JSON.stringify(cart));
}

// Function to remove selectedItem from session storage
function removeSelectedItemFromSession(productId, productSize) {
    let selectedItems = JSON.parse(sessionStorage.getItem('selectedItems')) || [];
    selectedItems = selectedItems.filter(item => !(item.productId === productId && item.productSize === productSize));
    sessionStorage.setItem('selectedItems', JSON.stringify(selectedItems));
}

// Add event listener to window beforeunload event

window.onload=function(){
    // Remove selectedItem from session storage if it exists
   
    let selectedItem = JSON.parse(sessionStorage.getItem('selectedItems'))||[];
    if (selectedItem) {
        sessionStorage.removeItem('selectedItems');
    }
}

// Rest of your code...


document.querySelectorAll('.checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        const product = this.closest('.item');
        const orderContainer = document.querySelector('.order_items');
        if (this.checked) {
            const orderItem = createOrderItemNode(product);
            orderContainer.appendChild(orderItem);
        } else {
            const productId = product.querySelector('.product-id').value;
            const productSize = product.querySelector('.size').value;
            const orderItems = document.querySelectorAll('.order_item');
            orderItems.forEach(item => {
                if ((item.querySelector('.order_id').value == productId) && (item.querySelector('.order_size').value == productSize)) {
                    orderContainer.removeChild(item);
                }
            });
            // Remove selectedItem from session storage
            removeSelectedItemFromSession(productId, productSize);
        }
        updateAllTotal();
    });
});

function updateSelectedItemQuantity(productId, productSize, quantity) {
    let selectedItems = JSON.parse(sessionStorage.getItem('selectedItems')) || [];
    selectedItems.forEach(item => {
        if (item.productId === productId && item.productSize === productSize) {
            item.productQuantity = quantity;
        }
    });
    sessionStorage.setItem('selectedItems', JSON.stringify(selectedItems));
}
document.querySelectorAll('.quantity_values').forEach(input => {
    input.addEventListener('input', function () {
        const product = this.closest('.item');
        const thisInventory = parseInt(product.querySelector('.inventory').value);
        let quantity = parseInt(this.value);
        quantity = (isNaN(quantity) || quantity == 0) ? 1 : quantity;
        quantity = (quantity > thisInventory) ? thisInventory : quantity;
        this.value = quantity;
        const pricePerItem = parseInt(product.querySelector('.price').value);
        const totalElement = product.querySelector('.total');
        totalElement.textContent = (pricePerItem * quantity).toLocaleString() + 'đ';
        const productId = product.querySelector('.product-id').value;
        const productSize = product.querySelector('.size').value;
        if (product.querySelector('.checkbox').checked) {
            updateOrderItemNode(product);
            updateAllTotal();
        }
        let login = document.getElementById('customer-id').value;
        if (!login) {
            let cart = JSON.parse(sessionStorage.getItem('cart'));
            if (cart) updateSessionItem(product, quantity);
            // Update selected item quantity in session storage
           
        }
        updateSelectedItemQuantity(productId, productSize, quantity);
    });
});
document.querySelectorAll('.decrease_button').forEach(button => {
    button.addEventListener('click', function () {
        const quantityInput = this.nextElementSibling;
        let quantity = parseInt(quantityInput.value);
        if (quantity > 1) {
            quantity--;
            quantityInput.value = quantity;
            quantityInput.dispatchEvent(new Event('input'));
            let login = document.getElementById('customer-id').value;
            if (!login) {
                let cart = JSON.parse(sessionStorage.getItem('cart'));
                if (cart) updateSessionItem(this.closest('.item'), quantity);
            }
        }
    });
});

document.querySelectorAll('.increase_button').forEach(button => {
    button.addEventListener('click', function () {
        const quantityInput = this.previousElementSibling;
        let quantity = parseInt(quantityInput.value);
        const next = this.nextElementSibling;
        let inventory = parseInt(next.value);
        if (quantity < inventory) {
            quantity++;
            quantityInput.value = quantity;
            quantityInput.dispatchEvent(new Event('input'));
            let login = document.getElementById('customer-id').value;
            if (!login) 
            {
                let cart = JSON.parse(sessionStorage.getItem('cart'));
                if (cart) updateSessionItem(this.closest('.item'), quantity);
            }
        }
    });
});

document.querySelectorAll('.remove').forEach(removeButton => {
    removeButton.addEventListener('click', function () {
        const product = this.closest('.item');
        const productId = product.querySelector('.product-id').value;
        const productSize = product.querySelector('.size').value;
        const orderContainer = document.querySelector('.order_items');
        const checkbox = product.querySelector('.checkbox');
        if (checkbox.checked) {
            const orderItems = document.querySelectorAll('.order_item');
            orderItems.forEach(item => {
                if ((item.querySelector('.order_id').value == productId) && (item.querySelector('.order_size').value == productSize)) {
                    orderContainer.removeChild(item);
                }
            });
        }
        product.remove();
        updateAllTotal();
        let cart = JSON.parse(sessionStorage.getItem('cart'));
        if (cart) {
            cart = cart.filter(item => !(item.product_id === productId && item.product_size === productSize));
            sessionStorage.setItem('cart', JSON.stringify(cart));
        }
    });
});




