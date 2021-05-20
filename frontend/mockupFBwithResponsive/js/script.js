const showLeftbar = document.querySelector('.show-leftbar');
const sidebarLeft = document.querySelector('.sidebar-left');
showLeftbar.addEventListener('click', () => {
    if (showLeftbar.innerHTML === 'Show leftbar') {
        showLeftbar.textContent = 'Close leftbar';
        sidebarLeft.style.display = 'block';
    } else {
        showLeftbar.textContent = 'Show leftbar';
        sidebarLeft.style.display = 'none';
    }
});

