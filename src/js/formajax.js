document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('#formulaire_principal');

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(form);
        formData.append('action', 'submit_form');

        fetch(form.action, {
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
            // Handle the response data
            console.log(data);
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation: ', error);
        });
    });
});
