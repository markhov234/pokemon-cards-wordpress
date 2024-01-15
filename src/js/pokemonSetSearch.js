document.addEventListener('DOMContentLoaded', function() {

  // console.log(my_ajax_object);
  if (my_ajax_object.is_home) {
    const setsList = document.querySelector('.home-list');
    const searchInput = document.getElementById('pokemonSetSearch');

    searchInput.addEventListener('input', function() {
      fetchSets(searchInput.value);
    });

    function fetchSets(searchTerm) {
      jQuery.ajax({
        type: 'post',
        url: `${window.location.origin}/wp-admin/admin-ajax.php`,
        data: {
          action: 'my_trigger_ajax_all_sets_name',
          search_term: searchTerm,
        },
      })
      .done(function(response) {
        let filteredArray = response.data;

        setsList.innerHTML = '';

        filteredArray.forEach(set => {
          const listItem = document.createElement('li');
          const link = document.createElement('a');
          const image = document.createElement('img');
          const span = document.createElement('span');

          listItem.classList.add('home-list-item');
          link.classList.add('home-list-item-link');
          image.classList.add('home-list-item-image');
          span.classList.add('home-list-item-name');

          link.href = `${window.location.origin}/set-details/?id=${set.id}`;
          image.src = set.imageUrl;
          span.textContent = set.name;

          link.appendChild(image);
          link.appendChild(span);
          listItem.appendChild(link);
          setsList.appendChild(listItem);
        });
      })
      .fail(function(error) {
        console.error('Error fetching sets:', error);
      });
    }
  }
});
