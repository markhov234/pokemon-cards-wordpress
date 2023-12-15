document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("#formulaire_principal");

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    const formData = new FormData(form);
    formData.append("action", "submit_form");

    fetch(form.action, {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response error.");
        }
        return response.json();
      })
      .then((response) => {
        const submitButton = document.getElementById('submit-btn');
        const errorParagraph = document.querySelector('.formulaire_principal-btn-err');
        const inputErrorElements = document.querySelectorAll('.formulaire_principal-input-err');
        const inputZoneErrorElements = document.querySelectorAll('.formulaire_principal-input-inside');
        const submitButtonP = document.querySelector('.formulaire_principal-btn-err');
      
        if (response.success) {
          // Handle the form submission success
          submitButton.classList.remove("error");
          submitButton.disabled = true;
          submitButton.textContent = "Votre message à été envoyé!"; 
          submitButton.classList.add('success')
          errorParagraph.textContent = ''; 
          errorParagraph.classList.remove("error"); 
      
     
          inputErrorElements.forEach((element) => {
            element.classList.remove("error");
          });

          inputZoneErrorElements.forEach((element) => {
            element.classList.remove("error");
          });
        } else {
          // Handle error case
          Object.entries(response.data).forEach(([field, value]) => {
            const errorInput = document.querySelector(`#${field}`);
            const errorParagraph = document.querySelector(`#${field} + .formulaire_principal-input-err`);
      
            if (!value && errorParagraph) {
              errorInput.classList.add("error");
              errorParagraph.classList.add("error");
            } else if (errorParagraph) {
              errorInput.classList.remove("error");
              errorParagraph.classList.remove("error");
            }
          });

          submitButtonP.classList.add("error");
          submitButton.disabled = false;
        }
      })
      
      .catch((error) => {
        console.error(
          "There was a problem with the fetch operation: ",
          error
        );
      });
  });
});
