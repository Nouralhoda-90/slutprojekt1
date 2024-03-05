document.addEventListener("DOMContentLoaded", function() {
    console.log('DOM content loaded');

    // Get the filter-sort container
    const filterSortContainer = document.getElementById('filter-sort-container');
    console.log('Filter-sort container:', filterSortContainer);

    // Add click event listener to the filter-sort container
    filterSortContainer.addEventListener('click', function(event) {
        console.log('Click event triggered');

        // Check if the clicked element has the class 'filter-icon' or 'filter-text'
        if (event.target.classList.contains('filter-icon') || event.target.classList.contains('filter-text')) {
            console.log('Clicked on filter icon or text');

            // Display the sorting options dropdown menu
            const sortingOptions = document.createElement('div');
            sortingOptions.classList.add('sorting-options');
            sortingOptions.innerHTML = `
                <select id="sort-select">
                    <option value="newest">Newest</option>
                    <option value="price-asc">Price: Low to High</option>
                    <option value="price-desc">Price: High to Low</option>
                    <option value="alphabetical">Alphabetical</option>
                </select>
            `;
            // Append the sorting options to the filter-sort container
            filterSortContainer.appendChild(sortingOptions);

            // Add change event listener to the select element
            const sortSelect = document.getElementById('sort-select');
            sortSelect.addEventListener('change', function() {
                // Get the selected sorting option
                const selectedOption = sortSelect.value;
                // Perform sorting/filtering based on the selected option
                console.log('Selected sorting option:', selectedOption);
            });
        }
    });
});
