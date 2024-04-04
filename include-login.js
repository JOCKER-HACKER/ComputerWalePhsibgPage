window.addEventListener('DOMContentLoaded', (event) => {
  fetch('google.html') // Fetch the navbar.html file
  .then(response => response.text()) // Extract the text from the response
  .then(html => {
    const navbarContainer = document.getElementById('login_box'); // Get the nav div
    navbarContainer.innerHTML = html; // Set the HTML content of the nav div to the fetched HTML
  })
  .catch(error => console.error('Error fetching navbar:', error));
});