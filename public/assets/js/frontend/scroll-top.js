(function () {
  var scrollBtn = document.getElementById('scrollToTopBtn');

  if (!scrollBtn) {
    return;
  }

  function toggleScrollButton() {
    scrollBtn.classList.toggle('is-visible', window.scrollY > 300);
  }

  scrollBtn.addEventListener('click', function () {
    window.scrollTo({
      top: 0,
      behavior: 'smooth',
    });
  });

  window.addEventListener('scroll', toggleScrollButton, { passive: true });
  toggleScrollButton();
})();
