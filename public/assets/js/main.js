/* ==========================================================================
   Stonemere Life Management: interactions
   Vanilla JavaScript, no dependencies. Every effect has a calm fallback:
   content is complete without JavaScript and with reduced motion.
   ========================================================================== */
(function () {
  'use strict';

  var doc = document;
  var root = doc.documentElement;
  var CFG = window.STONEMERE || { phone: '+441225338436', whatsapp: '447891341414', email: '' };
  var finePointer = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
  var calm = function () { return root.classList.contains('calm'); };
  var $ = function (s, c) { return (c || doc).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || doc).querySelectorAll(s)); };
  var clamp = function (v, a, b) { return Math.min(b, Math.max(a, v)); };
  var lerp = function (a, b, t) { return a + (b - a) * t; };
  var ease = function (t) { return 1 - Math.pow(1 - t, 4); };
  var store = {
    get: function (k, s) { try { return (s || localStorage).getItem(k); } catch (e) { return null; } },
    set: function (k, v, s) { try { (s || localStorage).setItem(k, v); } catch (e) { /* storage blocked */ } }
  };
  var waLink = function (text) { return 'https://wa.me/' + CFG.whatsapp + '?text=' + encodeURIComponent(text); };

  /* ---------- 1. Contact config (email shown only when supplied) ---------- */
  function initConfig() {
    $$('[data-year]').forEach(function (el) { el.textContent = new Date().getFullYear(); });
    if (!CFG.email) return;
    $$('[data-email-row]').forEach(function (el) { el.hidden = false; });
    $$('[data-email]').forEach(function (a) { a.href = 'mailto:' + CFG.email + '?subject=' + encodeURIComponent('Enquiry from the Stonemere website'); });
    $$('[data-email-text]').forEach(function (el) { el.textContent = CFG.email; });
  }

  /* ---------- 2. Text helpers: word split and text roll ---------- */
  function splitWords(el) {
    if (el.dataset.splitDone) return;
    var i = 0;
    var walk = function (node) {
      Array.prototype.slice.call(node.childNodes).forEach(function (child) {
        if (child.nodeType === 3) {
          var parts = child.textContent.split(/(\s+)/);
          var frag = doc.createDocumentFragment();
          parts.forEach(function (p) {
            if (!p) return;
            if (/^\s+$/.test(p)) { frag.appendChild(doc.createTextNode(p)); return; }
            var w = doc.createElement('span'); w.className = 'w';
            var inner = doc.createElement('span'); inner.textContent = p; inner.style.setProperty('--i', i++);
            w.appendChild(inner); frag.appendChild(w);
          });
          child.parentNode.replaceChild(frag, child);
        } else if (child.nodeType === 1 && child.tagName !== 'BR') { walk(child); }
      });
    };
    walk(el);
    el.dataset.splitDone = '1';
  }
  function initText() {
    $$('[data-split]').forEach(splitWords);
    $$('.roll').forEach(function (r) {
      if (r.firstElementChild) return;
      var inner = doc.createElement('span');
      inner.className = 'roll__in';
      inner.setAttribute('data-text', r.getAttribute('data-text') || r.textContent);
      inner.textContent = r.textContent;
      r.textContent = '';
      r.appendChild(inner);
    });
  }

  /* ---------- 3. Preloader and page transitions ---------- */
  function initArrival() {
    var pre = $('.preloader');
    var first = root.classList.contains('first-visit') && !calm();
    var finish = function () { root.classList.add('ready'); };
    if (first && pre) {
      root.style.setProperty('--hero-delay', '1.6s');
      setTimeout(function () { pre.classList.add('is-done'); store.set('sm-seen', '1', sessionStorage); }, 1500);
      setTimeout(finish, 1600);
    } else {
      store.set('sm-seen', '1', sessionStorage);
      finish();
    }
    if (store.get('sm-leaving', sessionStorage) === '1' && !calm()) {
      root.classList.add('is-arriving');
      requestAnimationFrame(function () { requestAnimationFrame(function () { root.classList.add('is-arrived'); }); });
      setTimeout(function () { root.classList.remove('is-arriving', 'is-arrived'); }, 1000);
    }
    store.set('sm-leaving', '0', sessionStorage);

    var curtain = $('.curtain');
    doc.addEventListener('click', function (e) {
      var a = e.target.closest && e.target.closest('a[href]');
      if (!a || calm() || e.defaultPrevented || e.button !== 0 || e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
      if (a.target === '_blank' || a.hasAttribute('download')) return;
      var url;
      try { url = new URL(a.href, location.href); } catch (err) { return; }
      if (url.origin !== location.origin || !/\.html$|\/$/.test(url.pathname)) return;
      if (url.pathname === location.pathname && url.hash) return;
      e.preventDefault();
      store.set('sm-leaving', '1', sessionStorage);
      curtain.classList.add('is-covering');
      setTimeout(function () { location.href = url.href; }, 560);
    });
    window.addEventListener('pageshow', function (e) { if (e.persisted) curtain.classList.remove('is-covering'); });
  }

  /* ---------- 4. Header: solid after the hero, hides on scroll down ---------- */
  function initHeader() {
    var header = $('.site-header');
    if (!header) return;
    var last = 0;
    var update = function () {
      var y = window.scrollY;
      header.classList.toggle('is-solid', y > 40);
      if (!root.classList.contains('menu-open')) header.classList.toggle('is-hidden', y > last && y > 400);
      last = y;
    };
    window.addEventListener('scroll', update, { passive: true });
    update();
  }

  /* ---------- 5. Full-screen menu ---------- */
  function initMenu() {
    var btn = $('.menu-toggle'), menu = $('#menu');
    if (!btn || !menu) return;
    var label = $('.menu-toggle__text', btn);
    var preview = $('.menu__preview img', menu);
    var main = $('#main'), footer = $('.site-footer');
    $$('.menu__link', menu).forEach(function (a, i) { a.style.setProperty('--i', i); });
    var open = function () {
      menu.hidden = false;
      requestAnimationFrame(function () { menu.classList.add('is-open'); });
      root.classList.add('menu-open');
      btn.setAttribute('aria-expanded', 'true');
      label.textContent = 'Close';
      doc.body.style.overflow = 'hidden';
      if (main) main.inert = true;
      if (footer) footer.inert = true;
      setTimeout(function () { var f = $('.menu__link', menu); if (f) f.focus(); }, 300);
    };
    var close = function (focus) {
      menu.classList.remove('is-open');
      root.classList.remove('menu-open');
      btn.setAttribute('aria-expanded', 'false');
      label.textContent = 'Menu';
      doc.body.style.overflow = '';
      if (main) main.inert = false;
      if (footer) footer.inert = false;
      setTimeout(function () { if (!menu.classList.contains('is-open')) menu.hidden = true; }, calm() ? 0 : 800);
      if (focus) btn.focus();
    };
    btn.addEventListener('click', function () { (btn.getAttribute('aria-expanded') === 'true' ? close : open)(true); });
    doc.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && menu.classList.contains('is-open')) close(true);
      if (e.key === 'Tab' && menu.classList.contains('is-open')) {
        var items = [btn].concat($$('a, button', menu));
        var firstEl = items[0], lastEl = items[items.length - 1];
        if (e.shiftKey && doc.activeElement === firstEl) { e.preventDefault(); lastEl.focus(); }
        else if (!e.shiftKey && doc.activeElement === lastEl) { e.preventDefault(); firstEl.focus(); }
      }
    });
    $$('[data-preview]', menu).forEach(function (a) {
      var swap = function () { if (preview && preview.getAttribute('src') !== a.dataset.preview) { preview.style.opacity = 0; setTimeout(function () { preview.src = a.dataset.preview; preview.style.opacity = 1; }, 180); } };
      a.addEventListener('mouseenter', swap);
      a.addEventListener('focus', swap);
    });
    window.addEventListener('resize', function () { if (window.innerWidth > 1099 && menu.classList.contains('is-open')) close(false); });
  }

  /* ---------- 6. Scroll reveals ---------- */
  function initReveal() {
    var targets = $$('[data-reveal], [data-split], .site-footer__cta, [data-count]');
    // stagger siblings
    $$('[data-reveal]').forEach(function (el) {
      var sibs = Array.prototype.filter.call(el.parentNode.children, function (c) { return c.hasAttribute('data-reveal'); });
      var idx = sibs.indexOf(el);
      if (idx > 0) el.style.setProperty('--d', Math.min(idx * 90, 450) + 'ms');
    });
    if (!('IntersectionObserver' in window) || calm()) { targets.forEach(function (t) { t.classList.add('is-in'); }); return; }
    // first-screen content (heroes) reveals on load, not on scroll, so the main call to action is never held back
    var heroDelay = root.classList.contains('first-visit') ? 1500 : 150;
    var heroes = $$('.hero [data-reveal], .hero [data-split], .phero [data-reveal], .phero [data-split], .contact-hero [data-reveal], .contact-hero [data-split]');
    setTimeout(function () { heroes.forEach(function (el) { el.classList.add('is-in'); }); }, heroDelay);
    targets = targets.filter(function (t) { return heroes.indexOf(t) === -1 || t.getAttribute('data-reveal') === 'mask'; });
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (!en.isIntersecting) return;
        // clipped reveals (mask, wipe) are observed through their parent, because a fully clipped element never intersects
        var list = en.target._clipped || [en.target];
        list.forEach(function (el) {
          el.classList.add('is-in');
          if (el.hasAttribute('data-count')) countUp(el);
        });
        io.unobserve(en.target);
      });
    }, { rootMargin: '0px 0px -12% 0px', threshold: 0.12 });
    targets.forEach(function (t) {
      var mode = t.getAttribute('data-reveal');
      if (mode === 'mask' || mode === 'wipe') {
        var host = t.parentElement;
        (host._clipped = host._clipped || []).push(t);
        if (host._clipped.length === 1) io.observe(host);
      } else io.observe(t);
    });
  }
  function countUp(el) {
    var end = parseFloat(el.dataset.count), t0 = null;
    if (calm()) { el.textContent = end; return; }
    var step = function (ts) {
      if (!t0) t0 = ts;
      var p = clamp((ts - t0) / 1400, 0, 1);
      el.textContent = Math.round(lerp(0, end, ease(p)));
      if (p < 1) requestAnimationFrame(step);
    };
    el.textContent = '0';
    requestAnimationFrame(step);
  }

  /* ---------- 7. One scroll loop for parallax, pinned scenes and line draws ---------- */
  var scrollFns = [];
  function onScrollFrame(fn) { scrollFns.push(fn); }
  function startLoop() {
    var ticking = false;
    var run = function () { ticking = false; var vh = window.innerHeight; scrollFns.forEach(function (fn) { fn(vh); }); };
    var req = function () { if (!ticking) { ticking = true; requestAnimationFrame(run); } };
    window.addEventListener('scroll', req, { passive: true });
    window.addEventListener('resize', req);
    run();
  }

  function initParallax() {
    var els = $$('[data-parallax]');
    if (!els.length) return;
    onScrollFrame(function (vh) {
      if (calm()) return;
      els.forEach(function (el) {
        var host = el.parentElement.getBoundingClientRect();
        if (host.bottom < -200 || host.top > vh + 200) return;
        var offset = (host.top + host.height / 2 - vh / 2) * -parseFloat(el.dataset.parallax);
        el.style.transform = 'translate3d(0,' + offset.toFixed(1) + 'px,0)';
      });
    });
  }

  function initDraw() {
    var els = $$('[data-draw]');
    onScrollFrame(function (vh) {
      els.forEach(function (el) {
        if (calm()) { el.style.setProperty('--draw', 0); return; }
        var r = el.getBoundingClientRect();
        var p = clamp((vh * 0.85 - r.top) / (r.height * 0.9 + vh * 0.2), 0, 1);
        el.style.setProperty('--draw', (1 - p).toFixed(3));
      });
    });
  }

  /* ---------- 8. Signature: the keystone arch assembles on scroll ---------- */
  function initKeystone() {
    var sec = $('[data-keystone]');
    if (!sec) return;
    var stones = $$('.vs', sec), key = $('.vs--key', sec), caps = $$('.keystone__cap', sec);
    var bar = $('.keystone__progress', sec), glow = $('.ks-glow', sec);
    var setCap = function (n) { caps.forEach(function (c, i) { c.classList.toggle('is-active', i === n); }); };
    onScrollFrame(function (vh) {
      if (calm()) { stones.forEach(function (s) { s.style.transform = ''; }); caps.forEach(function (c) { c.classList.add('is-active'); }); return; }
      var r = sec.getBoundingClientRect();
      var total = r.height - vh;
      var p = clamp(-r.top / total, 0, 1);
      bar.style.setProperty('--p', p.toFixed(3));
      // 0-0.45: side stones gather; 0.45-0.6: they sag; 0.6-0.8: keystone drops and the arch locks
      var gather = ease(clamp(p / 0.45, 0, 1));
      var sag = p < 0.6 ? clamp((p - 0.4) / 0.2, 0, 1) * 14 : lerp(14, 0, ease(clamp((p - 0.62) / 0.16, 0, 1)));
      var drop = ease(clamp((p - 0.6) / 0.2, 0, 1));
      stones.forEach(function (s) {
        var x = parseFloat(s.dataset.x), y = parseFloat(s.dataset.y), rot = parseFloat(s.dataset.r);
        if (s === key) {
          s.style.transform = 'translate(0px,' + lerp(-520, 0, drop).toFixed(1) + 'px)';
          s.style.opacity = clamp((p - 0.5) * 8, 0, 1);
        } else {
          var t = 1 - gather;
          s.style.transform = 'translate(' + (x * t).toFixed(1) + 'px,' + (y * t + sag).toFixed(1) + 'px) rotate(' + (rot * t).toFixed(2) + 'deg)';
          s.style.opacity = 0.35 + 0.65 * gather;
        }
      });
      if (glow) glow.style.opacity = drop.toFixed(3);
      setCap(p < 0.38 ? 0 : p < 0.68 ? 1 : 2);
    });
  }

  /* ---------- 9. Four areas: horizontal track pinned inside vertical scroll ---------- */
  function initTrack() {
    var sec = $('[data-hscroll]');
    if (!sec) return;
    var rail = $('.track__rail', sec), bar = $('.track__bar span', sec);
    var desktop = window.matchMedia('(min-width: 900px)');
    var distance = 0;
    var measure = function () {
      if (!desktop.matches || calm()) { sec.classList.remove('is-pinned'); sec.style.removeProperty('--track-h'); rail.style.transform = ''; return; }
      sec.classList.add('is-pinned');
      distance = Math.max(0, rail.scrollWidth - window.innerWidth);
      sec.style.setProperty('--track-h', (window.innerHeight + distance) + 'px');
    };
    measure();
    window.addEventListener('resize', measure);
    window.addEventListener('load', measure);
    onScrollFrame(function () {
      if (!sec.classList.contains('is-pinned')) return;
      var r = sec.getBoundingClientRect();
      var p = clamp(-r.top / Math.max(1, distance), 0, 1);
      rail.style.transform = 'translate3d(' + (-p * distance).toFixed(1) + 'px,0,0)';
      if (bar) sec.style.setProperty('--p', p.toFixed(3)), bar.parentNode.style.setProperty('--p', p.toFixed(3));
    });
  }

  /* ---------- 10. Velocity-reactive marquee ---------- */
  function initMarquee() {
    var track = $('[data-marquee]');
    if (!track || !track.animate || calm()) return;
    var anim = track.animate([{ transform: 'translateX(0)' }, { transform: 'translateX(-50%)' }], { duration: 38000, iterations: Infinity });
    var lastY = window.scrollY, rate = 1, target = 1;
    window.addEventListener('scroll', function () {
      var dy = window.scrollY - lastY; lastY = window.scrollY;
      target = clamp(1 + Math.abs(dy) * 0.18, 1, 7) * (dy < 0 ? -1 : 1);
    }, { passive: true });
    (function tick() {
      rate = lerp(rate, target, 0.08);
      target = lerp(target, target < 0 ? -1 : 1, 0.04);
      anim.playbackRate = rate;
      requestAnimationFrame(tick);
    })();
  }

  /* ---------- 11. Cursor, magnetic buttons, tilt ---------- */
  function initPointer() {
    if (!finePointer) return;
    var cursor = $('.cursor'), label = $('.cursor__label');
    var x = -100, y = -100, cx = x, cy = y;
    doc.addEventListener('pointermove', function (e) {
      x = e.clientX; y = e.clientY;
      root.classList.add('has-cursor');
      var t = e.target.closest && e.target.closest('[data-cursor]');
      if (t && !calm()) { label.textContent = t.dataset.cursor; cursor.classList.add('is-label'); }
      else cursor.classList.remove('is-label');
    });
    doc.addEventListener('pointerleave', function () { root.classList.remove('has-cursor'); });
    doc.addEventListener('pointerdown', function () { cursor.classList.add('is-down'); });
    doc.addEventListener('pointerup', function () { cursor.classList.remove('is-down'); });
    (function loop() {
      cx = lerp(cx, x, calm() ? 1 : 0.22); cy = lerp(cy, y, calm() ? 1 : 0.22);
      cursor.style.transform = 'translate3d(' + cx.toFixed(1) + 'px,' + cy.toFixed(1) + 'px,0)';
      requestAnimationFrame(loop);
    })();

    $$('[data-magnetic]').forEach(function (b) {
      b.addEventListener('pointermove', function (e) {
        if (calm()) return;
        var r = b.getBoundingClientRect();
        var mx = (e.clientX - r.left - r.width / 2) * 0.22, my = (e.clientY - r.top - r.height / 2) * 0.32;
        b.style.transform = 'translate(' + mx.toFixed(1) + 'px,' + my.toFixed(1) + 'px)';
      });
      b.addEventListener('pointerleave', function () { b.style.transform = ''; });
    });

    $$('[data-tilt]').forEach(function (card) {
      card.addEventListener('pointermove', function (e) {
        var r = card.getBoundingClientRect();
        var px = (e.clientX - r.left) / r.width, py = (e.clientY - r.top) / r.height;
        card.style.setProperty('--lx', (px * 100).toFixed(1) + '%');
        card.style.setProperty('--ly', (py * 100).toFixed(1) + '%');
        if (calm()) return;
        card.style.transform = 'perspective(900px) rotateX(' + ((0.5 - py) * 6).toFixed(2) + 'deg) rotateY(' + ((px - 0.5) * 8).toFixed(2) + 'deg)';
      });
      card.addEventListener('pointerleave', function () { card.style.transform = ''; });
    });
  }

  /* ---------- 12. Expanding rows with cursor-following previews ---------- */
  function initRows() {
    $$('.row__head').forEach(function (btn) {
      var body = doc.getElementById(btn.getAttribute('aria-controls'));
      btn.addEventListener('click', function () {
        var open = btn.getAttribute('aria-expanded') === 'true';
        btn.setAttribute('aria-expanded', String(!open));
        body.classList.toggle('is-open', !open);
      });
    });
    if (!finePointer) return;
    $$('.refer, .index').forEach(function (sec) {
      var box = $('.rows__preview', sec), img = box && $('img', box);
      if (!box) return;
      var x = 0, y = 0, cx = 0, cy = 0, on = false;
      $$('[data-preview]', sec).forEach(function (row) {
        row.addEventListener('pointerenter', function () { if (calm()) return; img.src = row.dataset.preview; box.classList.add('is-on'); on = true; });
        row.addEventListener('pointerleave', function () { box.classList.remove('is-on'); on = false; });
      });
      sec.addEventListener('pointermove', function (e) { x = e.clientX + 170; y = e.clientY; });
      (function loop() {
        if (on) { cx = lerp(cx, x, 0.14); cy = lerp(cy, y, 0.14); box.style.transform = 'translate(' + (cx - 140).toFixed(1) + 'px,' + (cy - 105).toFixed(1) + 'px)'; }
        else { cx = x; cy = y; }
        requestAnimationFrame(loop);
      })();
    });
  }

  /* ---------- 13. FAQ accordions and tabs ---------- */
  function initFaq() {
    $$('.faq__q button').forEach(function (btn) {
      var panel = doc.getElementById(btn.getAttribute('aria-controls'));
      btn.addEventListener('click', function () {
        var open = btn.getAttribute('aria-expanded') === 'true';
        btn.setAttribute('aria-expanded', String(!open));
        panel.classList.toggle('is-open', !open);
      });
    });
  }
  function initTabs() {
    $$('[role="tablist"]').forEach(function (list) {
      var tabs = $$('[role="tab"]', list), ink = $('.tabs__ink', list);
      var place = function (t) { if (!ink) return; ink.style.setProperty('--x', t.offsetLeft + 'px'); ink.style.setProperty('--w', t.offsetWidth + 'px'); };
      var select = function (t, focus) {
        tabs.forEach(function (o) {
          var on = o === t;
          o.setAttribute('aria-selected', String(on));
          o.tabIndex = on ? 0 : -1;
          doc.getElementById(o.getAttribute('aria-controls')).hidden = !on;
        });
        place(t);
        if (focus) t.focus();
      };
      tabs.forEach(function (t, i) {
        t.addEventListener('click', function () { select(t); });
        t.addEventListener('keydown', function (e) {
          var n = null;
          if (e.key === 'ArrowRight') n = (i + 1) % tabs.length;
          if (e.key === 'ArrowLeft') n = (i - 1 + tabs.length) % tabs.length;
          if (e.key === 'Home') n = 0;
          if (e.key === 'End') n = tabs.length - 1;
          if (n !== null) { e.preventDefault(); select(tabs[n], true); }
        });
      });
      var current = tabs.filter(function (t) { return t.getAttribute('aria-selected') === 'true'; })[0] || tabs[0];
      requestAnimationFrame(function () { place(current); });
      window.addEventListener('resize', function () { place(tabs.filter(function (t) { return t.getAttribute('aria-selected') === 'true'; })[0]); });
    });
  }

  /* ---------- 14. Feature: case mapper ---------- */
  function initMapper() {
    var sec = $('[data-mapper]');
    if (!sec) return;
    var nodes = $$('.mapper__node', sec), lines = $$('[data-line]', sec);
    var n = $('[data-mapper-n]', sec), label = $('[data-mapper-label]', sec), cta = $('[data-mapper-cta]', sec);
    var update = function () {
      var picked = nodes.filter(function (b) { return b.getAttribute('aria-pressed') === 'true'; });
      var names = picked.map(function (b) { return b.textContent.trim(); });
      n.textContent = picked.length;
      sec.classList.toggle('has-nodes', picked.length > 0);
      sec.style.setProperty('--n', picked.length);
      label.textContent = picked.length === 0 ? 'parties selected. Choose the people and organisations involved.'
        : (picked.length === 1 ? 'party involved. You speak to one person: Stonemere.' : 'parties involved. You speak to one person: Stonemere.');
      lines.forEach(function (l) { l.classList.toggle('is-on', picked.some(function (b) { return b.dataset.node === l.dataset.line; })); });
      var msg = 'Hello Stonemere, I would like to talk about a case.' + (names.length ? '\n\nPeople and organisations involved:\n- ' + names.join('\n- ') : '');
      cta.href = waLink(msg);
    };
    nodes.forEach(function (b) {
      b.addEventListener('click', function () { b.setAttribute('aria-pressed', String(b.getAttribute('aria-pressed') !== 'true')); update(); });
    });
    update();
  }

  /* ---------- 15. Forms that open WhatsApp ---------- */
  function setError(field, msg) {
    var wrap = field.closest('.field');
    var err = wrap && $('.field__error', wrap);
    if (wrap) wrap.classList.toggle('is-invalid', !!msg);
    if (err) err.textContent = msg || '';
    field.setAttribute('aria-invalid', msg ? 'true' : 'false');
  }
  function validate(form) {
    var firstBad = null;
    $$('input[required], select[required], textarea[required]', form).forEach(function (f) {
      if (f.type === 'radio' || f.type === 'checkbox') return;
      var v = (f.value || '').trim(), msg = '';
      if (!v) msg = 'Please fill this in.';
      else if (f.type === 'tel' && v.replace(/[^\d]/g, '').length < 10) msg = 'Please enter a full phone number.';
      setError(f, msg);
      if (msg && !firstBad) firstBad = f;
    });
    return firstBad;
  }
  function openWhatsApp(form, text) {
    var w = window.open(waLink(text), '_blank', 'noopener');
    var ok = $('.form__success', form);
    if (ok) { ok.hidden = false; ok.focus && ok.setAttribute('tabindex', '-1'); ok.focus(); }
    if (!w) location.href = waLink(text);
  }

  function initEnquiry() {
    $$('[data-wa-form="enquiry"]').forEach(function (form) {
      // clear an error as soon as the field is corrected, so the layout is stable before the next tap
      $$('input, textarea, select', form).forEach(function (f) {
        var recheck = function () {
          if (f.getAttribute('aria-invalid') !== 'true') return;
          var v = (f.value || '').trim();
          if (v && (f.type !== 'tel' || v.replace(/[^\d]/g, '').length >= 10)) setError(f, '');
        };
        f.addEventListener('input', recheck);
        f.addEventListener('change', recheck);
      });
      form.addEventListener('submit', function (e) {
        e.preventDefault();
        var bad = validate(form);
        if (bad) { bad.focus(); return; }
        var d = new FormData(form);
        var text = 'Hello Stonemere, I am getting in touch through your website.\n\n'
          + 'Name: ' + d.get('name') + '\n'
          + (d.get('organisation') ? 'Organisation: ' + d.get('organisation') + '\n' : '')
          + 'Contacting as: ' + d.get('role') + '\n'
          + 'Phone: ' + d.get('phone') + '\n\n'
          + d.get('message');
        openWhatsApp(form, text);
        var csrf = document.querySelector('meta[name="csrf-token"]');
        if (csrf) {
          fetch('/contact', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': csrf.getAttribute('content') },
            body: JSON.stringify({
              name: d.get('name'),
              phone: d.get('phone'),
              organisation: d.get('organisation') || null,
              role: d.get('role') || null,
              message: d.get('message')
            })
          }).catch(function () {});
        }
      });
    });
  }

  function initBuilder() {
    var form = $('[data-wa-form="referral"]');
    if (!form) return;
    var out = $('[data-preview-text]', form);
    var compose = function () {
      var d = new FormData(form);
      var needs = d.getAll('needs');
      var lines = ['Hello Stonemere, I would like to make a referral.', ''];
      if (d.get('referrer')) lines.push('Referring as: ' + d.get('referrer'));
      if (d.get('name')) lines.push('Name: ' + d.get('name') + (d.get('organisation') ? ', ' + d.get('organisation') : ''));
      if (d.get('phone')) lines.push('Phone: ' + d.get('phone'));
      if (d.get('reference')) lines.push('Client initials / reference: ' + d.get('reference'));
      if (needs.length) { lines.push('', 'The client needs help with:'); needs.forEach(function (n) { lines.push('- ' + n); }); }
      if (d.get('urgency')) lines.push('', 'How soon: ' + d.get('urgency'));
      if (d.get('area')) lines.push('Client lives: ' + d.get('area'));
      return lines.join('\n');
    };
    var refresh = function (e) {
      out.textContent = compose();
      var t = e && e.target;
      if (t && t.name) {
        var err = $('[data-error="' + t.name + '"]', form);
        if (err) err.textContent = '';
        if (t.getAttribute('aria-invalid') === 'true' && t.value.trim()) setError(t, '');
      }
    };
    form.addEventListener('input', refresh);
    form.addEventListener('change', refresh);
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var d = new FormData(form), first = null;
      var need = function (name, ok, msg) {
        var el = $('[data-error="' + name + '"]', form);
        if (el) el.textContent = ok ? '' : msg;
        if (!ok && !first) first = $('[name="' + name + '"]', form);
      };
      need('referrer', !!d.get('referrer'), 'Please choose how you are referring.');
      need('needs', d.getAll('needs').length > 0, 'Please choose at least one thing the client needs.');
      need('urgency', !!d.get('urgency'), 'Please choose how soon.');
      need('area', !!d.get('area'), 'Please choose where the client lives.');
      var bad = validate(form);
      if (first || bad) { (first || bad).focus(); return; }
      openWhatsApp(form, compose());
    });
  }

  function initFinder() {
    var form = $('[data-finder]');
    if (!form) return;
    var level = $('[data-finder-level]', form), why = $('[data-finder-why]', form), cta = $('[data-finder-cta]', form);
    var LEVELS = {
      Silver: 'A starting point for occasional, dependable help with appointments, admin and the odd practical problem.',
      Gold: 'Suits regular coordination across several organisations, with a named contact who holds the whole picture.',
      Platinum: 'Suits complex or changing circumstances, many parties, or family at a distance who need frequent updates.'
    };
    form.addEventListener('change', function () {
      var picked = $$('input:checked', form);
      if (picked.length < 3) { level.textContent = (3 - picked.length) + ' question' + (picked.length === 2 ? '' : 's') + ' to go'; return; }
      var score = picked.reduce(function (s, i) { return s + parseInt(i.value, 10); }, 0);
      var name = score <= 4 ? 'Silver' : score <= 7 ? 'Gold' : 'Platinum';
      level.textContent = name;
      level.classList.remove('is-set'); void level.offsetWidth; level.classList.add('is-set');
      why.textContent = LEVELS[name] + ' We confirm the right level with you before anything is agreed.';
      var answers = picked.map(function (i) { return '- ' + i.closest('fieldset').querySelector('legend').textContent.replace(/^\s*\d\s*/, '').trim() + ' ' + i.dataset.label; });
      cta.href = waLink('Hello Stonemere, the level finder suggested ' + name + '. Please could you tell me more and send current rates?\n\n' + answers.join('\n'));
      $('.roll__in', cta) ? $('.roll__in', cta).setAttribute('data-text', 'Ask about ' + name) : null;
      var r = $('.roll__in', cta) || $('.roll', cta); if (r) r.textContent = 'Ask about ' + name;
    });
  }

  function initChecklist() {
    var form = $('[data-checklist]');
    if (!form) return;
    var cta = $('[data-checklist-cta]', form);
    var update = function () {
      var items = $$('input:checked', form).map(function (i) { return '- ' + i.value; });
      cta.href = waLink('Hello Stonemere, I would like to ask about vacant property checks.' + (items.length ? '\n\nThe visits would need to cover:\n' + items.join('\n') : ''));
    };
    form.addEventListener('change', update);
    form.addEventListener('submit', function (e) { e.preventDefault(); });
    update();
  }

  /* ---------- 16. Reduce-motion toggle ---------- */
  function initMotionToggle() {
    $$('.motion-toggle').forEach(function (b) {
      b.setAttribute('aria-pressed', String(calm()));
      b.addEventListener('click', function () {
        var on = !calm();
        root.classList.toggle('calm', on);
        store.set('sm-motion', on ? 'calm' : 'full');
        b.setAttribute('aria-pressed', String(on));
        if (on) { $$('[data-reveal], [data-split]').forEach(function (el) { el.classList.add('is-in'); }); $$('[data-parallax]').forEach(function (el) { el.style.transform = ''; }); }
        window.dispatchEvent(new Event('resize'));
        window.dispatchEvent(new Event('scroll'));
      });
    });
  }

  /* ---------- Boot ---------- */
  function boot() {
    initConfig();
    initText();
    initArrival();
    initHeader();
    initMenu();
    initReveal();
    initParallax();
    initDraw();
    initKeystone();
    initTrack();
    initMarquee();
    initPointer();
    initRows();
    initFaq();
    initTabs();
    initMapper();
    initEnquiry();
    initBuilder();
    initFinder();
    initChecklist();
    initMotionToggle();
    startLoop();
    root.classList.add('engine');
  }
  if (doc.readyState === 'loading') doc.addEventListener('DOMContentLoaded', boot); else boot();
})();
