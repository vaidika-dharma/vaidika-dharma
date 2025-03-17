document.addEventListener('DOMContentLoaded', function() {
  const forms = document.querySelectorAll('.php-email-form');

  forms.forEach(function(form) {
    form.addEventListener('submit', async function(event) {
      event.preventDefault();

      const formData = new FormData(form);

      const response = await fetch(form.action, {
        method: 'POST',
        body: formData
      });

      const result = await response.text();

      if (result.trim() === 'OK') {
        form.querySelector('.sent-message').classList.add('d-block');
        form.querySelector('.error-message').classList.remove('d-block');
        form.reset(); // Clear the form
      } else {
        form.querySelector('.error-message').innerHTML = result;
        form.querySelector('.error-message').classList.add('d-block');
      }
    });
  });
});
