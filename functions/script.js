document.addEventListener("DOMContentLoaded", function() {
    const fetchDataBtn = document.getElementById("fetch-data-btn");
    const productIdSelect = document.getElementById("product-id");
    const dataContainer = document.getElementById("data-container");

    fetchDataBtn.addEventListener("click", function() {
        const selectedProductId = productIdSelect.value;
        if (selectedProductId === 'all') {
            // Fetch all items
            fetchItems();
        } else {
            // Fetch details for the selected product
            fetchItemDetails(selectedProductId);
        }
    });

    function fetchItems() {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", "../backend/api.php", true);

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Request was successful
                const responseData = JSON.parse(xhr.responseText);
                displayItems(responseData);
            } else {
                // Request failed
                console.error('Request failed with status:', xhr.status);
            }
        };

        xhr.onerror = function() {
            // Request failed
            console.error('Request failed');
        };

        xhr.send();
    }

    function fetchItemDetails(productId) {
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `../backend/api.php?id=${productId}`, true);

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Request was successful
                const responseData = JSON.parse(xhr.responseText);
                displayItemDetails(responseData);
            } else {
                // Request failed
                console.error('Request failed with status:', xhr.status);
            }
        };

        xhr.onerror = function() {
            // Request failed
            console.error('Request failed');
        };

        xhr.send();
    }

    function displayItems(items) {
        let html = '<ul>';
        items.forEach(item => {
            html += `<li>${item.name}: $${item.price}</li>`;
        });
        html += '</ul>';
        dataContainer.innerHTML = html;
    }

    function displayItemDetails(item) {
        dataContainer.innerHTML = `<h2>${item.name}</h2><p>Price: $${item.price}</p>`;
    }
});
