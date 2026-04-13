/* ── Utility: smooth scroll to section ── */
function scrollToSection(id) {
  const el = document.getElementById(id);
  if (el) el.scrollIntoView({ behavior: 'smooth' });
}

/* ══════════════════════════════════════════════════
   1. NAVBAR
══════════════════════════════════════════════════ */
(function initNavbar() {
  const navbar = document.getElementById('navbar');
  const hamburger = document.getElementById('hamburger');
  const mobileNav = document.getElementById('mobile-nav');
  const navLinks = document.querySelectorAll('[data-nav]');
  const sections = ['home', 'about', 'skills', 'experience', 'projects', 'services', 'contact'];

  /* Scroll → add .scrolled */
  window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 40);
    updateActive();
  }, { passive: true });

  /* Active link tracking */
  function updateActive() {
    let current = 'home';
    for (const id of [...sections].reverse()) {
      const el = document.getElementById(id);
      if (el && el.getBoundingClientRect().top <= 120) { current = id; break; }
    }
    navLinks.forEach(a => {
      a.classList.toggle('active', a.dataset.nav === current);
    });
  }

  /* Click nav links */
  navLinks.forEach(a => {
    a.addEventListener('click', e => {
      e.preventDefault();
      scrollToSection(a.dataset.nav);
      closeMobile();
    });
  });

  /* Hamburger */
  hamburger && hamburger.addEventListener('click', () => {
    const open = hamburger.classList.toggle('open');
    mobileNav.classList.toggle('open', open);
  });

  function closeMobile() {
    hamburger && hamburger.classList.remove('open');
    mobileNav && mobileNav.classList.remove('open');
  }

  /* Close mobile nav on outside click */
  document.addEventListener('click', e => {
    if (!navbar.contains(e.target)) closeMobile();
  });
})();

/* ══════════════════════════════════════════════════
   2. HERO TYPING ANIMATION
   Pure CSS – see @keyframes typing-1…4 in style.css
══════════════════════════════════════════════════ */
// Handled entirely by CSS animations (no JS needed)

/* ══════════════════════════════════════════════════
   3. FLOATING TAGS – staggered delay
══════════════════════════════════════════════════ */
document.querySelectorAll('.floating-tag').forEach((el, i) => {
  el.style.animationDelay = `${i * 0.5}s`;
});

/* ══════════════════════════════════════════════════
   4. SCROLL REVEAL (IntersectionObserver)
══════════════════════════════════════════════════ */
(function initReveal() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });

  document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale')
    .forEach(el => observer.observe(el));
})();

/* ══════════════════════════════════════════════════
   5. SKILL BARS (animate width on scroll)
══════════════════════════════════════════════════ */
(function initSkillBars() {
  const bars = document.querySelectorAll('.skill-bar-fill');
  if (!bars.length) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const fill = entry.target;
        fill.style.width = fill.dataset.width + '%';
        observer.unobserve(fill);
      }
    });
  }, { threshold: 0.3 });

  bars.forEach(fill => observer.observe(fill));
})();

/* ══════════════════════════════════════════════════
   6. EXP TIMELINE DOT REVEAL
══════════════════════════════════════════════════ */
(function initExpDots() {
  const dots = document.querySelectorAll('.exp-dot');
  const obs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.style.transform = 'scale(1)';
        obs.unobserve(e.target);
      }
    });
  }, { threshold: 0.5 });
  dots.forEach(d => { d.style.transform = 'scale(0)'; d.style.transition = 'transform 0.4s cubic-bezier(0.175,0.885,0.32,1.275)'; obs.observe(d); });
})();

/* ══════════════════════════════════════════════════
   7. CONTACT FORM (AJAX to mail.php)
══════════════════════════════════════════════════ */
(function initContactForm() {
  const form = document.getElementById('contact-form');
  const formWrap = document.getElementById('form-wrap');
  const successWrap = document.getElementById('form-success');
  const sendAgain = document.getElementById('send-again');
  const alertEl = document.getElementById('form-alert');
  const submitBtn = document.getElementById('submit-btn');
  if (!form) return;

  /* Validation */
  function validate() {
    let ok = true;
    const fields = { name: 'Name is required', email: 'Email is required', message: 'Message is required' };
    Object.entries(fields).forEach(([id, msg]) => {
      const el = document.getElementById('f-' + id);
      const err = document.getElementById('err-' + id);
      const val = el ? el.value.trim() : '';
      let errMsg = '';
      if (!val) { errMsg = msg; ok = false; }
      else if (id === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val)) { errMsg = 'Invalid email address'; ok = false; }
      if (el) el.classList.toggle('error', !!errMsg);
      if (err) err.textContent = errMsg;
    });
    return ok;
  }

  /* Clear errors on input */
  ['name', 'email', 'message'].forEach(id => {
    const el = document.getElementById('f-' + id);
    if (el) el.addEventListener('input', () => {
      el.classList.remove('error');
      const err = document.getElementById('err-' + id);
      if (err) err.textContent = '';
    });
  });

  /* Submit */
  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    alertEl.className = 'alert';

    if (!validate()) return;

    submitBtn.disabled = true;
    submitBtn.textContent = 'Sending…';

    const data = new FormData(form);

    try {
      const res = await fetch('mail.php', { method: 'POST', body: data });
      const json = await res.json();

      if (json.success) {
        formWrap.style.display = 'none';
        successWrap.style.display = 'flex';
      } else {
        showAlert('error', json.error || 'Something went wrong. Please try again.');
      }
    } catch (err) {
      showAlert('error', 'Network error. Please check your connection and try again.');
    } finally {
      submitBtn.disabled = false;
      submitBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg> Send Message';
    }
  });

  function showAlert(type, message) {
    alertEl.className = `alert ${type} show`;
    alertEl.textContent = message;
  }

  /* Send Another */
  sendAgain && sendAgain.addEventListener('click', () => {
    form.reset();
    formWrap.style.display = '';
    successWrap.style.display = 'none';
    alertEl.className = 'alert';
  });
})();

/* ══════════════════════════════════════════════════
   8. BACK TO TOP
══════════════════════════════════════════════════ */
document.querySelectorAll('[data-scroll-top]').forEach(btn => {
  btn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
});

/* ══════════════════════════════════════════════════
   9. HERO BUTTONS (smooth scroll)
══════════════════════════════════════════════════ */
document.querySelectorAll('[data-scroll]').forEach(btn => {
  btn.addEventListener('click', () => scrollToSection(btn.dataset.scroll));
});

/* ══════════════════════════════════════════════════
   10. FOOTER SCROLL LINKS
══════════════════════════════════════════════════ */
document.querySelectorAll('[data-footer-link]').forEach(btn => {
  btn.addEventListener('click', () => scrollToSection(btn.dataset.footerLink));
});
