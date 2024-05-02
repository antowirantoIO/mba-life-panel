import './bootstrap';
import 'flowbite';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const inputBanner = document.getElementById('banner_upload');
const bannerPreview = document.getElementById('banner_preview');
const deleteBanner = document.getElementById('delete_banner');
const bannerContainer = document.getElementById('banner_container');

// Fungsi untuk menampilkan gambar
function displayImage(src) {
    bannerPreview.src = src;
    bannerPreview.style.display = 'block';
    bannerPreview.style.opacity = 0;
    deleteBanner.style.display = 'none';  // Sembunyikan dulu tombol hapus
    setTimeout(() => {
        bannerPreview.style.opacity = 1;
        deleteBanner.style.display = 'block'; // Tampilkan tombol hapus saat gambar muncul
        deleteBanner.style.opacity = 0;
        setTimeout(() => {
            deleteBanner.style.opacity = 1;
        }, 10);
    }, 10);
    bannerContainer.classList.add('mb-5');
}

// Memeriksa apakah ada data-src saat halaman dimuat
if (bannerPreview.dataset.src) {
    displayImage(bannerPreview.dataset.src);
}

// Listener untuk perubahan pada input file
inputBanner.addEventListener('change', function() {
    const file = this.files[0];
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(e) {
            displayImage(e.target.result);
        };
        reader.readAsDataURL(file);
    } else {
        alert('File is not an image.');
    }
});

// Event listener untuk tombol delete
deleteBanner.addEventListener('click', function() {
    bannerPreview.src = '';
    bannerPreview.style.display = 'none';
    deleteBanner.style.display = 'none';
    inputBanner.value = '';  // Reset input file
});

