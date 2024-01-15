document.addEventListener('DOMContentLoaded', function () {

  if (my_ajax_object.is_set_details) {
    const buttonLoadMore = document.getElementById('load-more-cards');
    const setsListCards = document.querySelector('.cards-container');

    let currentPage = 1;
    const urlParams = new URLSearchParams(window.location.search);
    const setId = urlParams.get('id');

    // Initial request to load the first page
    loadMoreSets(currentPage, setId);

    buttonLoadMore.addEventListener('click', function () {
      // Increment the page number before making the AJAX request
      currentPage++;
      loadMoreSets(currentPage, setId);
    });

    function loadMoreSets(currentPage, setId) {
      jQuery.ajax({
        type: 'POST',
        url: `${window.location.origin}/wp-admin/admin-ajax.php`,
        data: {
          action: 'fetch_paginated_cards',
          page: currentPage,
          set_id: setId,
        },
        success: function (response) {
          // Handle the success response, update your page with the new cards
          let filteredCards = response.data;

          filteredCards.forEach(card => {
            const listItem = document.createElement('li');
            const cardTitle = document.createElement('h2');
            const cardImage = document.createElement('img');
        
            listItem.classList.add('pokemon-card-list-item');
            cardTitle.classList.add('pokemon-card-title');
            cardImage.classList.add('pokemon-card-list-image');
            
            cardTitle.textContent = card.name;
            cardImage.src = card.images.small;

            listItem.appendChild(cardTitle); // Append the title to the list item
            listItem.appendChild(cardImage); // Append the title to the list item
            setsListCards.appendChild(listItem); // Append the list item to the cards container
        });        
        },
        error: function (error) {
          console.error('Error fetching paginated cards:', error);
        },
      });
    }
  }
});
