// JavaScript for responsive navigation toggle
document.addEventListener("DOMContentLoaded", function () {
  const navToggle = document.getElementById('nav-toggle');
  const navMenu = document.getElementById('nav-element');

  if (navToggle && navMenu) {
      navToggle.addEventListener('click', function () {
          navMenu.classList.toggle('active');
          console.log("Menu toggled!");
      });
  } else {
      console.error('nav-toggle or nav-menu not found');
  }
});

window.addEventListener("scroll", function() {
  if (window.scrollY + window.innerHeight >= document.body.scrollHeight) {
      document.body.classList.add("scrolled");
  } else {
      document.body.classList.remove("scrolled");
  }
});



// CSS styles
const style = document.createElement('style');
style.textContent = `
  #nav-toggle {
    display: none;
    font-size: 30px;
    cursor: pointer;
    padding: 10px;
    background-color: #e9c46a;
    border: none;
  }

  @media (max-width: 760px) {
    #nav-toggle {
      display: inline-block;
    }
    #nav-element{
      display:none;
    }
    #nav-element.active{
      display:flex;
      height: 100%; /* Specify a height */
      width: 150px; /* 0 width - change this with JavaScript */
      position: fixed; /* Stay in place */
      z-index: 1; /* Stay on top */
      top: 0;
      left: 0;
      background-color: #dad7cd; /* Black*/
      overflow-x: hidden; /* Disable horizontal scroll */
      padding-top: 60px; /* Place content 60px from the top */
      transition: 0.5s; /* 0.5 second transition effect to slide in the sidepanel */
      margin-top: 85px;
    }
    nav ul{
      position:absolute;
      top: 0;
    }
    nav ul li{
      margin: 15px;
    }
  }
`;
document.head.appendChild(style);