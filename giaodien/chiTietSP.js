// Lấy tất cả các nút input có class 'box_color'
const colorButtons = document.querySelectorAll('.box_color input[type="button"]');

// Thêm sự kiện click cho từng nút
colorButtons.forEach(button => {
    button.addEventListener('click', () => {
        // Lấy giá trị 'id' của nút được chọn
        const selectedColor = button.id;
        console.log('Màu sắc được chọn:', selectedColor);

        // Thay đổi thuộc tính border của nút được chọn
        button.style.border = '2px solid #000'; // Thay đổi border thành 2px solid black

        // Xóa border của các nút khác
        colorButtons.forEach(btn => {
            if (btn !== button) {
                btn.style.border = 'none';
            }
        });
    });
});

const redButton = document.getElementById('red');
redButton.style.border = '2px solid #000';


const sizeButtons = document.querySelectorAll('.box_size input[type="button"]');


sizeButtons.forEach(button => {
    button.addEventListener('click', () => {

        const selectedSize = button.id;
        console.log('Màu sắc được chọn:', selectedSize);


        button.style.border = '2px solid #000';


        sizeButtons.forEach(btn => {
            if (btn !== button) {
                btn.style.border = 'none';
            }
        });
    });
});

const sz16Button = document.getElementById('sz16');
sz16Button.style.border = '2px solid #000';

// -----------jquery for angle-down icon beside sub menu---------
$(document).ready(function () {
    // Tìm <li> có sub
    $('.sub_menu').parent('li').addClass('has_child');
})