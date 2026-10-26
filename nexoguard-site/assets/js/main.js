// Nexoguard — small enhancements (the page works without JavaScript too)
(function () {
  // Mobile menu
  var btn = document.querySelector('.menu-btn');
  var menu = document.getElementById('menu');
  if (btn && menu) {
    btn.addEventListener('click', function () {
      var open = menu.classList.toggle('open');
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
    menu.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () {
        menu.classList.remove('open');
        btn.setAttribute('aria-expanded', 'false');
      });
    });
  }

  // Keep the footer year current
  var y = document.getElementById('year');
  if (y) y.textContent = new Date().getFullYear();

  // Show the form result after contact.php redirects back
  var params = new URLSearchParams(window.location.search);
  if (params.has('sent')) {
    var ok = document.getElementById('form-ok');
    if (ok) ok.hidden = false;
  }
  if (params.has('error')) {
    var err = document.getElementById('form-err');
    if (err) err.hidden = false;
  }
})();
