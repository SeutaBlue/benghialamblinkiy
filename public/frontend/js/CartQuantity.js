// window.onload = function() 

function countProductsInCart_Customer() 
{
    var customer=document.getElementById('this-customer').value;
    console.log(customer);
    var cart=document.getElementById('number_of_cart').value;
    console.log(cart);
    if(parseInt(cart)<99)
    {
        document.querySelector('#cart-shopping-quantity').innerHTML=cart;
    } 
    else
    {
        document.querySelector('#cart-shopping-quantity').innerHTML='99+';
    }
};

function countProductsInCart() 
{
    let cart = JSON.parse(sessionStorage.getItem('cart')) || [];

    totalItems=cart.length;
    console.log(totalItems);

    if(totalItems<99)
    {
        document.querySelector('#cart-shopping-quantity').innerHTML=totalItems;
    }
    else
    {
        document.querySelector('#cart-shopping-quantity').innerHTML='99+';
    }

}
