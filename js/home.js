const navbarNav = document.querySelector('.navbar-nav');
document.querySelector('#hamburger-menu').onclick = () => {
    navbarNav.classList.toggle('active');
}

let userBtn = document.getElementById('user-btn');
let accountBox = document.querySelector('.account-box');

userBtn.onclick = () => {
    accountBox.classList.toggle('active');
}

window.onclick = function(e){
    if(!userBtn.contains(e.target) && !accountBox.contains(e.target)){
        accountBox.classList.remove('active');
    }
}

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        }
    });
}, { threshold: 0.1 }); // 0.1 artinya elemen akan muncul jika 10% bagiannya terlihat

const hiddenElements = document.querySelectorAll('.categories, .services, .message, .location');
hiddenElements.forEach((el) => observer.observe(el));


    // document.addEventListener('DOMContentLoaded', () => {
    //     const searchInput = document.getElementById('search-input');
    //     const searchBtn = document.getElementById('search-btn');
        
    //     // Fungsi utama untuk memfilter produk
    //     const filterProducts = () => {
    //         const searchTerm = searchInput.value.toLowerCase().trim();
    //         const products = document.querySelectorAll('.box-product'); // Mengambil semua kartu produk

    //         products.forEach(product => {
    //             // Mengambil teks nama produk di dalam class .name
    //             const productName = product.querySelector('.name').innerText.toLowerCase();
                
    //             if (productName.includes(searchTerm)) {
    //                 // Jika cocok, tampilkan produk dengan animasi halus
    //                 product.style.display = ""; 
    //                 product.style.opacity = "1";
    //                 product.style.transform = "scale(1)";
    //             } else {
    //                 // Jika tidak cocok, sembunyikan produk
    //                 product.style.display = "none";
    //                 product.style.opacity = "0";
    //                 product.style.transform = "scale(0.8)";
    //             }
    //         });
    //     };

    //     // 1. Jalankan fungsi saat user mengetik (Real-time)
    //     searchInput.addEventListener('input', filterProducts);

    //     // 2. Jalankan fungsi saat tombol icon search diklik
    //     searchBtn.addEventListener('click', (e) => {
    //         e.preventDefault(); // Mencegah form reload jika di dalam tag <form>
    //         filterProducts();
    //     });

    //     // 3. Opsional: Jalankan fungsi saat menekan tombol 'Enter'
    //     searchInput.addEventListener('keypress', (e) => {
    //         if (e.key === 'Enter') {
    //             filterProducts();
    //         }
    //     });
    // });
