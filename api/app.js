const $slideShowToggleButton = document.getElementById("slideshow-toggle-button");

document.addEventListener('DOMContentLoaded', () => {
    let currentPath = getPathName()

    if (currentPath === '/image') {
        $slideShowToggleButton.href = '/images';
        $slideShowToggleButton.textContent = 'stop slideshow';
    } else if (currentPath === '/images') {
        $slideShowToggleButton.href = '/image?id=0';
        $slideShowToggleButton.textContent = 'start slideshow';
    }

    $slideShowToggleButton.classList.remove('hidden');
})

function getPathName() {
    return window.location.pathname;
}