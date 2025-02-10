document.addEventListener("DOMContentLoaded", function () {
    let priceInput = document.getElementById("formatted_price");

    // Format angka ke Rupiah
    let formattedPrice = new Intl.NumberFormat("id-ID", {
        // style: "currency",
        currency: "IDR",
        minimumFractionDigits: 2
    }).format(priceInput.value);

    priceInput.value = formattedPrice;
});

document.addEventListener("DOMContentLoaded", function () {
    const priceInput = document.getElementById('formatted_price_car');
    const hiddenInput = document.getElementById('price');

    // Format awal jika ada nilai
    if (hiddenInput.value) {
        priceInput.value = formatRupiah(hiddenInput.value);
    }

    priceInput.addEventListener('input', function (e) {
        // Bersihkan karakter non-digit
        let value = this.value.replace(/[^\d]/g, '');

        // Update nilai hidden
        hiddenInput.value = value ? parseInt(value) : 0;

        // Format tampilan
        this.value = formatRupiah(value);
    });

    function formatRupiah(value) {
        if (!value) return '';

        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            maximumFractionDigits: 0
        }).format(value).replace(/Rp/g, '').trim();
    }
});
