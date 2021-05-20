$(document).ready(function () {
    // Solusi saya
    const fileName = location.pathname.split('/')[5];
    if (fileName === '' || fileName === 'index.php') {
        $('.nav-item.side').removeClass('active');
        $('.nav-item.side')[0].classList.add('active');
    } else if (fileName === 'product') {
        $('.nav-item.side').removeClass('active');
        $('.nav-item.side')[1].classList.add('active');
    }

});