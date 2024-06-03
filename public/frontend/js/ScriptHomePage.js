var l1=document.getElementsByClassName('top-bar');
console.log(l1.width);

const listimage=document.querySelector('.list-slider');
const images=document.getElementsByClassName('slider');
// const images=document.getElementsByTagName('img');
let length=images.length;
let current=0;
setInterval(()=> {

    if(current==length-1)
    {
        let width= images[0].offsetWidth;
        listimage.style.transform=`translateX(0px)`;
        current=0;
    }
    else
    {
    current++;
    let width= images[0].offsetWidth;
    listimage.style.transform=`translateX(${width*(-1)*current}px)`;
    }
}, 4000)


document.addEventListener('DOMContentLoaded', function() {
    var productNames = document.querySelectorAll('.product_card');

    productNames.forEach(function(productName) {
        // var maxWidth = parseInt(window.getComputedStyle(productName).maxWidth);

        // // Nếu chiều rộng của tiêu đề lớn hơn chiều rộng tối đa
        // if (productName.scrollWidth > maxWidth) {
            // Thêm thuộc tính title để hiển thị tiêu đề đầy đủ khi di chuột qua
            productName.setAttribute('title', productName.innerText);
        // }
    });
});