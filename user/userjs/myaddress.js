function toggleLoginDiv() {
    var loginDiv = document.querySelector('.login');
    loginDiv.style.display = (loginDiv.style.display === 'none') ? 'block' : 'none';
  }

  // Add event listener to the button to toggle login div visibility
  var editButton = document.querySelector('.btn.btn-outline-primary');
  editButton.addEventListener('click', toggleLoginDiv);