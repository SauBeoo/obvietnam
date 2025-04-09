document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('header-search-input');
    const suggestionsBox = document.getElementById('search-suggestions');
    let timeout = null;

    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            clearTimeout(timeout);
            const minChars = parseInt(searchInput.getAttribute('data-min-chars')) || 2;

            if (this.value.length >= minChars) {
                timeout = setTimeout(() => {
                    fetchSuggestions(this.value);
                }, 300);
            } else {
                suggestionsBox.classList.add('hidden');
            }
        });

        // Xử lý khi click ra ngoài
        document.addEventListener('click', function(e) {
            if (!e.target.closest('#header-search-input') && !e.target.closest('#search-suggestions')) {
                suggestionsBox.classList.add('hidden');
            }
        });
    }

    function fetchSuggestions(searchTerm) {
        const category = document.querySelector('select[name="product_category"]')?.value || '';

        fetch(`${obvietnam_ajax.ajax_url}?action=product_search&s=${encodeURIComponent(searchTerm)}&category=${encodeURIComponent(category)}`)

        // Hiển thị loading
        suggestionsBox.innerHTML = `
        <div class="p-4 text-center text-gray-500">
            <div class="animate-spin inline-block w-6 h-6 border-2 border-current border-t-transparent rounded-full"></div>
        </div>
    `;
        suggestionsBox.classList.remove('hidden');

        fetch(`${obvietnam_ajax.ajax_url}?action=product_search&s=${encodeURIComponent(searchTerm)}&category=${category}`)
            .then(response => response.text())
            .then(html => {
                suggestionsBox.innerHTML = html;
                if(!html.trim()) {
                    suggestionsBox.classList.add('hidden');
                }
            })
            .catch(() => {
                suggestionsBox.classList.add('hidden');
            });
    }
});