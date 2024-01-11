document.addEventListener('DOMContentLoaded', function() {
  const setsList = document.querySelector('.home-list'); // Get the sets list container

  const buttonTriggerAjax = document.getElementById('trigger-ajax');
  buttonTriggerAjax.addEventListener('click', function() {
    console.log("Button clicked");
    jQuery.ajax({
      type: 'post',
      url: `${window.location.origin}/wp-admin/admin-ajax.php`,
      data: {
        action: 'my_trigger_ajax_all_sets_name',
      },
      complete: function(response) {
        let filteredArray = [];
        response.responseJSON.data.forEach(element => {
          if (element.series === "Base") {
            filteredArray.push(element);
          }
        });

        // Clear the current sets list
        setsList.innerHTML = '';

        // Render the filtered list in your HTML
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
      }
    });
  });
});
