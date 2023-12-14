document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('#formulaire_principal');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission behavior

        const formData = new FormData(form);
        formData.append('action', 'submit_form');

        fetch(unik_mah_js.ajax_url, {
            method: 'POST',
            body: formData,
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response error.');
                }
                return response.json();
            })
            .then(data => {
                // Log the response to the console
                console.log(data);
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation: ', error);
            });
    });
});
