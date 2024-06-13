function toggletext(btnNumber) {
    // Hide all content divs
    document.getElementById('buttoncontent').classList.add('d-none');
    document.getElementById('buttoncontent2').classList.add('d-none');
    document.getElementById('buttoncontent3').classList.add('d-none');
    document.getElementById('buttoncontent4').classList.add('d-none');

    // Show the selected content div based on the button clicked
    if (btnNumber === 1) {
      document.getElementById('buttoncontent').classList.remove('d-none');
    } else if (btnNumber === 2) {
      document.getElementById('buttoncontent2').classList.remove('d-none');
    } else if (btnNumber === 3) {
      document.getElementById('buttoncontent3').classList.remove('d-none');
    } else if (btnNumber === 4) {
      document.getElementById('buttoncontent4').classList.remove('d-none');
    }
  }
  var rating=0;
  function countrating(star)
  {
    var computedStyle = window.getComputedStyle(star);
    
    // Check the color of the star
    if (computedStyle.getPropertyValue('color') === 'rgb(255, 255, 0)') {
        star.style.color = "black"; // Change color to black
    } else {
        rating = rating + 1;
        star.style.color = "yellow"; // Change color to yellow
    }
  }

  function reviewform(event) {
    event.preventDefault(); 
    const prating = document.getElementById('prating');
    prating.value = rating;
    event.target.submit();
   
}
