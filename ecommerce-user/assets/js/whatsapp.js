<script>
    window.onload = function() {
        var floatWhatsApp = document.querySelector('.float-whatsapp');
        if (floatWhatsApp) {
            floatWhatsApp.addEventListener('click', function(e) {
                e.preventDefault();
                window.open('https://wa.me/6281234567890', '_blank');
            }, false);
        }
    };
</script>
