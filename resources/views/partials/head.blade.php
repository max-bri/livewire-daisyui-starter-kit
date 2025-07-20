<script>
(function() {
  var COOKIE = 'theme';
  var COOKIE_RE = /(?:^|;\s*)theme=([^;]+)/;

  function readCookieTheme() {
    var m = document.cookie.match(COOKIE_RE);
    return m ? decodeURIComponent(m[1]) : null;
  }
  function systemTheme() {
    return (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches)
      ? 'dark' : 'light';
  }
  function applyTheme(theme) {
    if (!theme) return;
    var cur = document.documentElement.getAttribute('data-theme');
    if (cur !== theme) {
      document.documentElement.setAttribute('data-theme', theme);
    }
  }
  function desiredTheme() {
    return readCookieTheme() || systemTheme();
  }
  function ensureTheme() {
    applyTheme(desiredTheme());
  }

  // Initial ASAP
  ensureTheme();

  // Watch system changes ONLY if no explicit cookie
  if (!readCookieTheme() && window.matchMedia) {
    var mq = window.matchMedia('(prefers-color-scheme: dark)');
    mq.addEventListener('change', function(e) {
      if (!readCookieTheme()) applyTheme(e.matches ? 'dark' : 'light');
    });
  }

  // Public API
  window.__theme = {
    set: function(t) {
      if (t === 'system') {
        // Remove cookie so system preference is live again
        document.cookie = COOKIE + '=;path=/;max-age=0;SameSite=Lax';
        applyTheme(systemTheme());
        return;
      }
      document.cookie = COOKIE + '=' + encodeURIComponent(t) + ';path=/;max-age=31536000;SameSite=Lax';
      applyTheme(t);
    },
    get: function() { return document.documentElement.getAttribute('data-theme'); },
    refresh: ensureTheme,
    cookie: readCookieTheme
  };

  // Handle back/forward cache + visibility
  window.addEventListener('pageshow', function(e) {
    // e.persisted = true means from bfcache
    ensureTheme();
  });
  document.addEventListener('visibilitychange', function() {
    if (document.visibilityState === 'visible') ensureTheme();
  });

  // If using Inertia.js
  document.addEventListener('inertia:navigate', ensureTheme);
  // Turbo (Hotwire)
  document.addEventListener('turbo:render', ensureTheme);
  // Livewire (after DOM diff)
  document.addEventListener('livewire:navigated', ensureTheme);

})();
</script>


<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? 'Laravel' }}</title>

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

@vite(['resources/css/app.css'])
