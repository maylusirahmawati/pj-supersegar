document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search-input');
    const products = document.querySelectorAll('.box-product');

    searchInput.addEventListener('input', () => {
        const filter = searchInput.value.toLowerCase().trim();

        products.forEach(product => {
            // Mengambil teks nama produk
            const productName = product.querySelector('.name').innerText.toLowerCase();

            if (productName.includes(filter)) {
                product.style.display = ""; // Tampilkan
            } else {
                product.style.display = "none"; // Sembunyikan
            }
        });
    });
});