/*!
 * Stonemere Life Management: js/main.js
 * Interactive engine · jQuery 3.7.1 + modern JavaScript (ES6+)
 * Theme: Bath Stone & Brass. Works from file:/// and any web server.
 * Every feature is progressive enhancement and respects reduced motion
 * (the system setting and the on-site "Reduce motion" switch).
 *
 *  1. Configuration & helpers     12. Keystone story (pinned)
 *  2. Session-aware preloader     13. Before / after slider
 *  3. Scroll engine & header      14. Horizontal services gallery
 *  4. Dropdown navigation         15. Carousel
 *  5. Mobile drawer               16. Case-study filter
 *  6. FAQ accordion               17. Forms, wizard & validation
 *  7. Testimonial marquee         18. Call-back modal
 *  8. Split text & reveals        19. Page transitions
 *  9. Parallax & scroll progress  20. Motion switch & dot navigation
 * 10. Micro-interactions          21. Thank-you page & utilities
 * 11. Audience switcher           22. Home hero
 *                                 23. Smooth scrolling
 *
 * No third-party animation libraries: every effect is CSS, vanilla
 * JavaScript (including the Web Animations API) or jQuery.
 */

/* --------------------------------------------------------------------------
   1. CONFIGURATION & HELPERS
   -------------------------------------------------------------------------- */
const SITE_CONFIG = {
  /*
   * Forms are delivered through WhatsApp: no server, no form service. On
   * submit, the visitor's answers are written into a WhatsApp message to this
   * number (international format, digits only); they press Send to deliver it.
   */
  whatsapp: '447891341414',

  /*
   * GENUINE, CONSENTED REVIEWS ONLY. With three or more, they replace the
   * "first call" cards in the top marquee track on every page:
   * { quote: '…', name: 'Helen Carter', role: 'Daughter of a client, Edinburgh', rating: 5 }
   */
  reviews: []
};

(function ($) {
  'use strict';

  const $win = $(window);
  const $doc = $(document);
  const $html = $('html');
  const $body = $('body');
  const root = document.documentElement;

  const systemReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const isReduced = () => systemReduced || root.classList.contains('reduce-motion');
  const finePointer = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
  const desktopNav = window.matchMedia('(min-width: 73.75em)');
  const desktop = window.matchMedia('(min-width: 64em)');

  const speed = (ms) => (isReduced() ? 0 : ms);
  const clamp = (v, min, max) => Math.min(max, Math.max(min, v));
  const store = {
    get(area, key) { try { return window[area].getItem(key); } catch (e) { return null; } },
    set(area, key, value) { try { window[area].setItem(key, value); } catch (e) { /* storage unavailable */ } }
  };

  const escapeHtml = (value) => String(value).replace(/[&<>"']/g, (ch) => ({
    '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
  }[ch]));

  const onMediaChange = (mql, handler) => {
    if (typeof mql.addEventListener === 'function') mql.addEventListener('change', handler);
    else if (typeof mql.addListener === 'function') mql.addListener(handler);
  };

  // Resolves when the web fonts are ready (or after `max` ms), so entrances
  // never play while headings are still swapping from the fallback font.
  const fontsReady = (max) => new Promise((resolve) => {
    const timer = window.setTimeout(resolve, max);
    if (document.fonts && document.fonts.ready) document.fonts.ready.then(() => { window.clearTimeout(timer); resolve(); });
  });

  $html.removeClass('no-js no-engine').addClass('js engine-ready');

  /* ------------------------------------------------------------------------
     2. SESSION-AWARE PRELOADER
     ------------------------------------------------------------------------ */
  const Preloader = {
    done: false,
    callbacks: [],

    onDone(fn) { if (this.done) fn(); else this.callbacks.push(fn); },

    finish() {
      if (this.done) return;
      this.done = true;
      this.callbacks.forEach((fn) => fn());
    },

    init() {
      const $preloader = $('#preloader');
      if (!$preloader.length) { this.finish(); return; }

      if (store.get('sessionStorage', 'site_loaded') === 'true') {
        $preloader.remove();
        this.finish();
        return;
      }

      let closed = false;
      const close = () => {
        if (closed) return;
        closed = true;
        store.set('sessionStorage', 'site_loaded', 'true');
        const done = () => {
          $('#preloader').remove();
          Preloader.finish();
        };
        $('#preloader').fadeOut(speed(500), done);
        // jQuery fades run on animation frames. If those are throttled
        // (background tab, preview tools), still clear the preloader on time.
        window.setTimeout(done, speed(500) + 400);
      };

      $win.on('load', close);
      if (document.readyState === 'complete') close();
      window.setTimeout(close, 3500);
    }
  };

  /* ------------------------------------------------------------------------
     3. SCROLL ENGINE & HEADER
     One requestAnimationFrame pass drives every scroll-linked effect. Each
     pass runs all layout reads first, then all style writes, so a frame
     never alternates between the two (the classic cause of scroll jank).
     ------------------------------------------------------------------------ */
  const Scroll = {
    readers: [],
    handlers: [],
    ticking: false,
    lastY: -1,
    lastVh: -1,
    forceNext: false,
    docH: 0,

    // Writers: receive (scrollY, viewportHeight) and only write styles.
    add(fn) { this.handlers.push(fn); },
    // Readers: measure layout before any writer runs in the same frame.
    read(fn) { this.readers.push(fn); },

    measure() { this.docH = document.documentElement.scrollHeight; },

    run(force) {
      const y = window.scrollY;
      const vh = window.innerHeight;
      if (!force && y === this.lastY && vh === this.lastVh) return;
      this.lastY = y;
      this.lastVh = vh;
      this.readers.forEach((fn) => fn(y, vh));
      this.handlers.forEach((fn) => fn(y, vh));
    },

    // Scroll events pass false so identical frames are skipped; any other
    // caller (resizes, layout changes, modules) forces a full pass.
    request(force = true) {
      if (force) this.forceNext = true;
      if (this.ticking) return;
      this.ticking = true;
      window.requestAnimationFrame(() => {
        this.ticking = false;
        const f = this.forceNext;
        this.forceNext = false;
        this.run(f);
      });
    },

    init() {
      this.measure();
      const remeasure = () => { this.measure(); this.request(); };
      window.addEventListener('scroll', () => this.request(false), { passive: true });
      $win.on('resize load', remeasure);
      // Page height changes (images, accordions, fonts) without a resize.
      if ('ResizeObserver' in window) new ResizeObserver(remeasure).observe(document.body);
      this.request();
    }
  };

  const Header = {
    init() {
      const header = document.querySelector('.site-header');
      const utility = header ? header.querySelector('.utility-bar') : null;
      const progress = document.querySelector('.scroll-progress');
      const toTop = document.querySelector('.to-top');
      const bar = document.querySelector('.action-bar');
      let lastP = '';

      // The utility bar slides away with a transform, so the header never
      // animates its height (which would re-layout the page while scrolling).
      const setUtilityHeight = () => {
        if (header && utility) header.style.setProperty('--util-h', `${utility.offsetHeight}px`);
      };
      setUtilityHeight();
      $win.on('resize load', setUtilityHeight);

      Scroll.add((y, vh) => {
        if (header) header.classList.toggle('is-scrolled', y > 24);
        const max = Scroll.docH - vh;
        const p = (max > 0 ? clamp(y / max, 0, 1) : 0).toFixed(4);
        if (p !== lastP) {
          lastP = p;
          if (progress) progress.style.setProperty('--progress', p);
          if (toTop) toTop.style.setProperty('--progress', p);
        }
        if (toTop) toTop.classList.toggle('is-visible', y > vh * 0.8);
        if (bar) bar.classList.toggle('is-visible', y > vh * 0.4);
      });

      $doc.on('click', '.to-top', () => {
        SmoothScroll.to(0);
        const target = document.getElementById('main');
        if (target) window.setTimeout(() => target.focus({ preventScroll: true }), 400);
      });
    }
  };

  /* ------------------------------------------------------------------------
     4. DROPDOWN NAVIGATION
     CSS opens menus on :hover / :focus-within (with an invisible hover
     bridge); these delegated listeners add a close delay, click/tap
     support, Escape-to-dismiss and ARIA state.
     ------------------------------------------------------------------------ */
  const Dropdowns = {
    closeTimer: null,
    openedAt: 0,

    open($item) {
      window.clearTimeout(this.closeTimer);
      $('.nav-item--dropdown.is-open').not($item).each((_, el) => this.close($(el)));
      $item.addClass('is-open').removeClass('is-dismissed');
      $item.children('.nav-trigger').attr('aria-expanded', 'true');
    },

    close($item) {
      $item.removeClass('is-open');
      $item.children('.nav-trigger').attr('aria-expanded', 'false');
    },

    closeAll() { $('.nav-item--dropdown.is-open').each((_, el) => this.close($(el))); },

    init() {
      const self = this;

      $doc.on('mouseenter', '.nav-item--dropdown', function () {
        if (!desktopNav.matches) return;
        self.openedAt = Date.now();
        self.open($(this));
      });

      $doc.on('mouseleave', '.nav-item--dropdown', function () {
        const $item = $(this);
        window.clearTimeout(self.closeTimer);
        self.closeTimer = window.setTimeout(() => {
          if (!$item[0].contains(document.activeElement)) self.close($item);
          $item.removeClass('is-dismissed');
        }, 220);
      });

      $doc.on('click', '.nav-trigger', function (event) {
        event.preventDefault();
        const $item = $(this).closest('.nav-item--dropdown');
        const expanded = $(this).attr('aria-expanded') === 'true';
        if (expanded && Date.now() - self.openedAt < 450) return;
        if (expanded) { self.close($item); $item.addClass('is-dismissed'); } else { self.open($item); }
      });

      $doc.on('keydown', '.nav-item--dropdown', function (event) {
        if (event.key !== 'Escape') return;
        const $item = $(this);
        self.close($item);
        $item.addClass('is-dismissed');
        $item.children('.nav-trigger').trigger('focus');
      });

      $doc.on('focusout', '.nav-item--dropdown', function () {
        const $item = $(this);
        window.setTimeout(() => {
          if (!$item[0].contains(document.activeElement)) { self.close($item); $item.removeClass('is-dismissed'); }
        }, 0);
      });

      $doc.on('click', (event) => {
        if (!$(event.target).closest('.nav-item--dropdown').length) self.closeAll();
      });

      onMediaChange(desktopNav, () => self.closeAll());
    }
  };

  /* ------------------------------------------------------------------------
     5. MOBILE DRAWER
     ------------------------------------------------------------------------ */
  const Drawer = {
    lastFocus: null,

    init() {
      const $drawer = $('#mobile-drawer');
      if (!$drawer.length) return;

      const $panel = $drawer.find('.drawer__panel');
      const $toggle = $('.nav-toggle');
      const $outside = $('.site-header, main, .pre-footer, .site-footer, .whatsapp-float, .action-bar, .to-top');

      const focusables = () => $panel
        .find('a[href], button:not([disabled]), input:not([disabled]), select, textarea, [tabindex]:not([tabindex="-1"])')
        .filter(':visible');

      const open = () => {
        this.lastFocus = document.activeElement;
        $drawer.addClass('is-open').attr('aria-hidden', 'false');
        $toggle.attr('aria-expanded', 'true');
        $body.addClass('is-locked');
        $outside.attr('inert', '');
        window.setTimeout(() => $drawer.find('.drawer__close').trigger('focus'), 60);
      };

      const close = () => {
        if (!$drawer.hasClass('is-open')) return;
        $drawer.removeClass('is-open').attr('aria-hidden', 'true');
        $toggle.attr('aria-expanded', 'false');
        $body.removeClass('is-locked');
        $outside.removeAttr('inert');
        const target = this.lastFocus && document.body.contains(this.lastFocus) ? this.lastFocus : $toggle[0];
        if (target) target.focus();
      };

      $doc.on('click', '.nav-toggle', open);
      $doc.on('click', '.drawer__close, .drawer__overlay', close);
      $drawer.on('click', 'a[href]', close);
      $doc.on('keydown', (event) => { if (event.key === 'Escape' && $drawer.hasClass('is-open')) close(); });

      $panel.on('keydown', (event) => {
        if (event.key !== 'Tab') return;
        const $items = focusables();
        if (!$items.length) return;
        const first = $items[0];
        const last = $items[$items.length - 1];
        if (event.shiftKey && document.activeElement === first) { event.preventDefault(); last.focus(); }
        else if (!event.shiftKey && document.activeElement === last) { event.preventDefault(); first.focus(); }
      });

      $doc.on('click', '.drawer__toggle', function () {
        const $btn = $(this);
        const $sub = $('#' + $btn.attr('aria-controls'));
        const expanded = $btn.attr('aria-expanded') === 'true';
        $btn.attr('aria-expanded', String(!expanded));
        $sub.stop(true, true).slideToggle(speed(320));
      });

      $drawer.find('.drawer__sub').each(function () {
        if ($(this).find('[aria-current="page"]').length) {
          $(this).show();
          $('[aria-controls="' + this.id + '"]').attr('aria-expanded', 'true');
        }
      });

      onMediaChange(desktopNav, (event) => { if (event.matches) close(); });
    }
  };

  /* ------------------------------------------------------------------------
     6. FAQ ACCORDION (single-open, slideToggle, rotating chevron)
     ------------------------------------------------------------------------ */
  const Faq = {
    collapse($item) {
      $item.removeClass('is-open');
      $item.find('.faq__question').attr('aria-expanded', 'false');
      $item.find('.faq__answer').stop(true, true).slideUp(speed(300), function () {
        $(this).removeClass('is-open').css('display', '');
      });
    },

    init() {
      $('.faq__question').attr('aria-expanded', 'false');

      $doc.on('click', '.faq__question', function () {
        const $btn = $(this);
        const $item = $btn.closest('.faq__item');
        const $panel = $('#' + $btn.attr('aria-controls'));
        const isOpen = $btn.attr('aria-expanded') === 'true';

        $btn.closest('.faq').find('.faq__item.is-open').not($item).each(function () { Faq.collapse($(this)); });

        $btn.attr('aria-expanded', String(!isOpen));
        $item.toggleClass('is-open', !isOpen);
        $panel.stop(true, true).slideToggle(speed(isOpen ? 300 : 360), function () {
          $(this).toggleClass('is-open', !isOpen).css('display', '');
        });
      });
    }
  };

  /* ------------------------------------------------------------------------
     7. TESTIMONIAL MARQUEE
     ------------------------------------------------------------------------ */
  const Marquee = {
    stars(rating) {
      const count = clamp(Math.round(Number(rating) || 5), 1, 5);
      let html = '';
      for (let i = 0; i < count; i += 1) html += '<svg class="icon icon--fill" aria-hidden="true"><use href="#i-star"></use></svg>';
      return `<span class="review-card__stars" role="img" aria-label="Rated ${count} out of 5">${html}</span>`;
    },

    renderReviews() {
      const reviews = (SITE_CONFIG.reviews || []).filter((r) => r && r.quote && r.name);
      if (reviews.length < 3) return;
      const cards = reviews.map((r) => `
        <li class="m-card review-card">
          ${this.stars(r.rating)}
          <p class="review-card__quote">${escapeHtml(r.quote)}</p>
          <p><span class="review-card__name">${escapeHtml(r.name)}</span>
          <span class="review-card__role">${escapeHtml(r.role || '')}</span></p>
        </li>`).join('');
      $('[data-marquee-reviews] .marquee__group').html(cards);
      $('[data-marquee-heading]').text('What clients and families say');
      $('[data-marquee-intro]').text('Genuine feedback from the people we support and their families.');
    },

    init() {
      this.renderReviews();
      // With motion reduced the strips scroll sideways instead, so keyboard users
      // must be able to focus them and scroll with the arrow keys.
      if (isReduced()) {
        $('.marquee__viewport').attr({ tabindex: '0', role: 'region', 'aria-label': 'Comments, scroll sideways to read more' });
      }
      $doc.on('click', '.marquee-toggle', function () {
        const $btn = $(this);
        const paused = $('#' + $btn.attr('aria-controls')).toggleClass('is-paused').hasClass('is-paused');
        $btn.attr('aria-pressed', String(paused));
        $btn.find('.marquee-toggle__label').text(paused ? 'Play' : 'Pause');
        $btn.find('use').attr('href', paused ? '#i-play' : '#i-pause');
      });
    }
  };

  /* ------------------------------------------------------------------------
     8. SPLIT TEXT & REVEALS
     ------------------------------------------------------------------------ */
  const SplitText = {
    selector: '.lux-hero h1, .page-hero h1, .section-head h2, .convert h2, .kstory h2, .hgallery h2, [data-split]',

    split(el) {
      if (el.dataset.splitDone) return;
      el.dataset.splitDone = 'true';

      // A screen-reader copy keeps the heading readable as one phrase.
      const reader = document.createElement('span');
      reader.className = 'visually-hidden';
      reader.innerHTML = el.innerHTML;

      const visual = document.createElement('span');
      visual.setAttribute('aria-hidden', 'true');
      visual.innerHTML = el.innerHTML;

      let index = 0;
      const walk = (node) => {
        Array.from(node.childNodes).forEach((child) => {
          if (child.nodeType === 3) {
            const frag = document.createDocumentFragment();
            child.textContent.split(/(\s+)/).forEach((part) => {
              if (!part) return;
              if (/^\s+$/.test(part)) { frag.appendChild(document.createTextNode(' ')); return; }
              const word = document.createElement('span');
              word.className = 'split-word';
              const inner = document.createElement('span');
              inner.className = 'split-word__inner';
              inner.style.setProperty('--i', index);
              index += 1;
              inner.textContent = part;
              word.appendChild(inner);
              frag.appendChild(word);
            });
            child.replaceWith(frag);
          } else if (child.nodeType === 1 && child.tagName.toLowerCase() !== 'svg') {
            walk(child);
          }
        });
      };
      walk(visual);

      el.innerHTML = '';
      el.appendChild(reader);
      el.appendChild(visual);
    },

    init() {
      if (isReduced()) return;
      document.querySelectorAll(this.selector).forEach((el) => this.split(el));
    }
  };

  const Reveal = {
    observer: null,

    observe(el) {
      if (this.observer) this.observer.observe(el);
      else el.classList.add('is-visible', 'is-split-in');
    },

    init() {
      // Image frames get a mask reveal automatically. A fully clipped element
      // reports zero visible area to IntersectionObserver, so each frame is
      // revealed when its (unclipped) parent comes into view.
      const masks = new Map();
      document.querySelectorAll('.media-frame').forEach((frame) => {
        if (frame.closest('.lux-hero')) return;
        frame.classList.add('mask-reveal');
        const anchor = frame.parentElement;
        if (!masks.has(anchor)) masks.set(anchor, []);
        masks.get(anchor).push(frame);
      });

      // The animated home hero choreographs its own entrance.
      const targets = new Set([...document.querySelectorAll('[data-reveal], [data-split-done]'), ...masks.keys()]
        .filter((el) => !el.closest('.lux-hero.is-anim')));
      const show = (el) => {
        el.classList.add('is-visible', 'is-split-in');
        (masks.get(el) || []).forEach((frame) => frame.classList.add('is-visible'));
      };

      if (isReduced() || !('IntersectionObserver' in window)) {
        targets.forEach(show);
        return;
      }

      this.observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          const el = entry.target;
          const reveal = () => show(el);
          // Hero headlines wait for the preloader to clear.
          if (el.closest('.lux-hero, .page-hero')) Preloader.onDone(() => window.setTimeout(reveal, 80));
          else reveal();
          this.observer.unobserve(el);
        });
      }, { rootMargin: '0px 0px -8% 0px', threshold: 0.06 });

      targets.forEach((el) => {
        const delay = el.getAttribute('data-reveal-delay');
        if (delay) el.style.setProperty('--reveal-delay', `${parseInt(delay, 10) / 1000}s`);
        // Above-the-fold hero content reveals straight after the preloader,
        // without waiting for an observer callback.
        if (el.closest('.lux-hero, .page-hero')) {
          Preloader.onDone(() => window.setTimeout(() => show(el), 60));
          return;
        }
        this.observer.observe(el);
      });
    }
  };

  /* ------------------------------------------------------------------------
     9. PARALLAX & SCROLL-LINKED PROGRESS
     Transform-only, measured against an untransformed parent to avoid jitter.
     ------------------------------------------------------------------------ */
  const Parallax = {
    items: [],

    register(el, rate) {
      if (!el) return;
      const anchor = el.closest('[data-parallax-root]') || el.parentElement;
      this.items.push({ el, anchor, rate });
    },

    init() {
      if (isReduced()) return;

      document.querySelectorAll('[data-parallax]').forEach((el) => this.register(el, parseFloat(el.getAttribute('data-parallax')) || 0.1));
      document.querySelectorAll('.media-frame img').forEach((el) => this.register(el, 0.07));
      document.querySelectorAll('.convert__bg img, .feature-case__media img').forEach((el) => this.register(el, 0.12));

      // Vertical step lists fill a progress line as you read.
      const lists = Array.from(document.querySelectorAll('.steps--progress')).map((el) => ({ el, next: null, last: null }));

      // Read pass: measure everything first...
      Scroll.read((y, vh) => {
        this.items.forEach((item) => {
          const rect = item.anchor.getBoundingClientRect();
          item.next = (rect.bottom < -200 || rect.top > vh + 200 || !rect.height)
            ? null
            : ((rect.top + rect.height / 2 - vh / 2) * -item.rate).toFixed(1);
        });
        lists.forEach((list) => {
          const rect = list.el.getBoundingClientRect();
          list.next = rect.height ? clamp((vh * 0.65 - rect.top) / rect.height, 0, 1).toFixed(3) : null;
        });
      });

      // ...then write pass: only touch styles whose value actually changed.
      Scroll.add(() => {
        this.items.forEach((item) => {
          if (item.next === null || item.next === item.last) return;
          item.last = item.next;
          item.el.style.setProperty('--py', `${item.next}px`);
        });
        lists.forEach((list) => {
          if (list.next === null || list.next === list.last) return;
          list.last = list.next;
          list.el.style.setProperty('--line-p', list.next);
        });
      });
    }
  };

  /* ------------------------------------------------------------------------
     10. MICRO-INTERACTIONS: ambient glow, spotlight, tilt, magnetic, counters
     ------------------------------------------------------------------------ */
  const Micro = {
    ambient() {
      document.querySelectorAll('.card, .case-card, .price-card, .m-card, .steps__item, .faq__item, .info-card, .finder, .form-card, .feature-case, .account-flow li, .trust-item')
        .forEach((el) => el.classList.add('spotlight'));

      if (!finePointer || isReduced()) return;

      const glow = document.querySelector('.ambient-glow');
      let x = window.innerWidth / 2;
      let y = window.innerHeight / 3;
      let tx = x;
      let ty = y;
      let card = null;
      let cx = 0;
      let cy = 0;
      let frame = null;

      const render = () => {
        x += (tx - x) * 0.14;
        y += (ty - y) * 0.14;
        if (glow) glow.style.transform = `translate3d(${x.toFixed(1)}px, ${y.toFixed(1)}px, 0)`;
        if (card) { card.style.setProperty('--mx', `${cx}px`); card.style.setProperty('--my', `${cy}px`); }
        frame = (Math.abs(tx - x) > 0.4 || Math.abs(ty - y) > 0.4) ? window.requestAnimationFrame(render) : null;
      };

      document.addEventListener('pointermove', (event) => {
        if (event.pointerType && event.pointerType !== 'mouse') return;
        tx = event.clientX;
        ty = event.clientY;
        const hit = event.target instanceof Element ? event.target.closest('.spotlight') : null;
        card = hit;
        if (hit) {
          const rect = hit.getBoundingClientRect();
          cx = Math.round(event.clientX - rect.left);
          cy = Math.round(event.clientY - rect.top);
        }
        if (glow && !glow.classList.contains('is-active')) glow.classList.add('is-active');
        if (!frame) frame = window.requestAnimationFrame(render);
      }, { passive: true });

      document.documentElement.addEventListener('mouseleave', () => { if (glow) glow.classList.remove('is-active'); });
    },

    tilt() {
      if (!finePointer || isReduced()) return;
      // The card eases toward the pointer once per frame, instead of
      // restarting a CSS transition on every mousemove event.
      let active = null;
      let frame = null;
      let rotX = 0; let rotY = 0; let lift = 0;
      let targetX = 0; let targetY = 0; let targetLift = 0;

      const render = () => {
        rotX += (targetX - rotX) * 0.16;
        rotY += (targetY - rotY) * 0.16;
        lift += (targetLift - lift) * 0.16;
        if (active) active.style.transform = `perspective(1200px) rotateX(${rotX.toFixed(2)}deg) rotateY(${rotY.toFixed(2)}deg) translateY(${lift.toFixed(2)}px)`;
        const settled = Math.abs(targetX - rotX) < 0.01 && Math.abs(targetY - rotY) < 0.01 && Math.abs(targetLift - lift) < 0.01;
        if (settled && active && !targetLift) { active.style.transform = ''; active.style.transition = ''; active = null; }
        frame = settled ? null : window.requestAnimationFrame(render);
      };
      const kick = () => { if (!frame) frame = window.requestAnimationFrame(render); };

      $doc.on('mousemove', '[data-tilt], .price-card', function (event) {
        if (active && active !== this) { active.style.transform = ''; active.style.transition = ''; rotX = 0; rotY = 0; lift = 0; }
        active = this;
        this.style.transition = 'box-shadow 0.5s var(--ease)';
        const rect = this.getBoundingClientRect();
        const px = (event.clientX - rect.left) / rect.width - 0.5;
        const py = (event.clientY - rect.top) / rect.height - 0.5;
        targetX = -py * 6;
        targetY = px * 6;
        targetLift = -6;
        kick();
      });
      $doc.on('mouseleave', '[data-tilt], .price-card', () => { targetX = 0; targetY = 0; targetLift = 0; kick(); });
    },

    magnetic() {
      if (!finePointer || isReduced()) return;
      $doc.on('mousemove', '.btn--lg, [data-magnetic]', function (event) {
        const rect = this.getBoundingClientRect();
        const dx = event.clientX - (rect.left + rect.width / 2);
        const dy = event.clientY - (rect.top + rect.height / 2);
        this.style.setProperty('--mx-btn', `${clamp(dx * 0.18, -10, 10).toFixed(1)}px`);
        this.style.setProperty('--my-btn', `${clamp(dy * 0.3, -8, 8).toFixed(1)}px`);
      });
      $doc.on('mouseleave', '.btn--lg, [data-magnetic]', function () {
        this.style.setProperty('--mx-btn', '0px');
        this.style.setProperty('--my-btn', '0px');
      });
    },

    counters() {
      const els = document.querySelectorAll('[data-count]');
      if (!els.length) return;

      const run = (el) => {
        const target = parseInt(el.getAttribute('data-count'), 10) || 0;
        if (isReduced()) { el.textContent = target; return; }
        const start = performance.now();
        const duration = 1600;
        const step = (now) => {
          const t = clamp((now - start) / duration, 0, 1);
          const eased = 1 - Math.pow(1 - t, 3);
          el.textContent = Math.round(target * eased);
          if (t < 1) window.requestAnimationFrame(step);
        };
        window.requestAnimationFrame(step);
        // If animation frames are throttled, still land on the real number.
        window.setTimeout(() => { el.textContent = target; }, duration + 300);
      };

      if (!('IntersectionObserver' in window)) { els.forEach(run); return; }
      const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) { run(entry.target); io.unobserve(entry.target); }
        });
      }, { threshold: 0.6 });
      els.forEach((el) => { if (!isReduced()) el.textContent = '0'; io.observe(el); });
    },

    init() {
      this.ambient();
      this.tilt();
      this.magnetic();
      this.counters();
    }
  };

  /* ------------------------------------------------------------------------
     11. AUDIENCE SWITCHER (tabs that personalise the journey)
     ------------------------------------------------------------------------ */
  const Audience = {
    select($tab, focus, persist = true) {
      const $tabs = $tab.closest('[role="tablist"]').find('[role="tab"]');
      $tabs.attr({ 'aria-selected': 'false', tabindex: '-1' });
      $tab.attr({ 'aria-selected': 'true', tabindex: '0' });
      $tabs.each(function () { $('#' + $(this).attr('aria-controls')).removeClass('is-active'); });
      $('#' + $tab.attr('aria-controls')).addClass('is-active');
      if (focus) $tab.trigger('focus');
      const audience = $tab.attr('data-audience');
      // Only personalise forms once the visitor has actually made a choice.
      if (audience && persist) {
        store.set('sessionStorage', 'sm_audience', audience);
        Forms.applyAudience(audience);
      }
    },

    init() {
      const $lists = $('.audience__tabs[role="tablist"]');
      if (!$lists.length) return;

      $lists.each((_, list) => {
        const $list = $(list);
        const saved = store.get('sessionStorage', 'sm_audience');
        const $initial = saved ? $list.find(`[data-audience="${saved}"]`) : $();
        this.select($initial.length ? $initial : $list.find('[role="tab"]').first(), false, $initial.length > 0);
      });

      $doc.on('click', '.audience__tabs [role="tab"]', function () { Audience.select($(this), false); });

      $doc.on('keydown', '.audience__tabs [role="tab"]', function (event) {
        const $tabs = $(this).closest('[role="tablist"]').find('[role="tab"]');
        const index = $tabs.index(this);
        let next = null;
        if (event.key === 'ArrowRight' || event.key === 'ArrowDown') next = (index + 1) % $tabs.length;
        if (event.key === 'ArrowLeft' || event.key === 'ArrowUp') next = (index - 1 + $tabs.length) % $tabs.length;
        if (event.key === 'Home') next = 0;
        if (event.key === 'End') next = $tabs.length - 1;
        if (next === null) return;
        event.preventDefault();
        Audience.select($tabs.eq(next), true);
      });
    }
  };

  /* ------------------------------------------------------------------------
     12. KEYSTONE STORY (pinned scroll narrative on desktop)
     ------------------------------------------------------------------------ */
  const Keystone = {
    init() {
      const section = document.querySelector('.kstory');
      if (!section) return;
      const svg = section.querySelector('.kstory__svg');
      const steps = section.querySelectorAll('.kstory__step');
      const nodes = section.querySelectorAll('.kstory__node');
      const count = section.querySelector('.kstory__count');

      const setPinned = () => {
        const pin = desktop.matches && !isReduced();
        section.classList.toggle('is-pinned', pin);
        if (!pin) {
          if (svg) { svg.style.setProperty('--draw', '1'); svg.style.setProperty('--key', '1'); }
          steps.forEach((s) => s.classList.add('is-active'));
          nodes.forEach((n) => n.classList.add('is-lit'));
        }
      };

      let rect = null;
      let lastActive = -1;
      setPinned();
      onMediaChange(desktop, () => { setPinned(); lastActive = -1; Scroll.request(); });

      Scroll.read(() => { rect = section.classList.contains('is-pinned') ? section.getBoundingClientRect() : null; });
      Scroll.add((y, vh) => {
        if (!rect) return;
        const p = clamp(-rect.top / (rect.height - vh), 0, 1);
        if (svg) {
          svg.style.setProperty('--draw', clamp(p * 1.3, 0, 1).toFixed(3));
          svg.style.setProperty('--key', clamp((p - 0.72) / 0.2, 0, 1).toFixed(3));
        }
        const active = p < 0.34 ? 0 : (p < 0.67 ? 1 : 2);
        if (active === lastActive) return;
        lastActive = active;
        steps.forEach((s, i) => s.classList.toggle('is-active', i === active));
        nodes.forEach((n, i) => n.classList.toggle('is-lit', i <= active));
        if (count) count.textContent = `0${active + 1}`;
      });
    }
  };

  /* ------------------------------------------------------------------------
     13. BEFORE / AFTER SLIDER
     ------------------------------------------------------------------------ */
  const BeforeAfter = {
    init() {
      document.querySelectorAll('.ba').forEach((ba) => {
        const range = ba.querySelector('.ba__range');
        if (!range) return;
        const apply = (value) => ba.style.setProperty('--pos', `${value}%`);
        range.addEventListener('input', () => apply(range.value));
        apply(range.value);

        // A gentle "here's how it works" sweep the first time it is seen.
        if (isReduced() || !('IntersectionObserver' in window)) return;
        const io = new IntersectionObserver((entries) => {
          if (!entries[0].isIntersecting) return;
          io.disconnect();
          const start = performance.now();
          const from = 88;
          const to = 50;
          const tick = (now) => {
            const t = clamp((now - start) / 1400, 0, 1);
            const eased = 1 - Math.pow(1 - t, 3);
            const value = from + (to - from) * eased;
            range.value = Math.round(value);
            apply(value.toFixed(1));
            if (t < 1) window.requestAnimationFrame(tick);
          };
          window.requestAnimationFrame(tick);
        }, { threshold: 0.5 });
        io.observe(ba);
      });
    }
  };

  /* ------------------------------------------------------------------------
     14. HORIZONTAL SERVICES GALLERY (pinned on desktop, swipe on mobile)
     ------------------------------------------------------------------------ */
  const Gallery = {
    init() {
      const section = document.querySelector('.hgallery');
      if (!section) return;
      const viewport = section.querySelector('.hgallery__viewport');
      const track = section.querySelector('.hgallery__track');
      const bar = section.querySelector('.hgallery__progress');
      let shift = 0;

      const measure = () => {
        const pin = desktop.matches && !isReduced();
        section.classList.toggle('is-pinned', pin);
        if (!pin) {
          section.style.height = '';
          track.style.removeProperty('--tx');
          return;
        }
        const pad = parseFloat(getComputedStyle(viewport).paddingLeft) || 0;
        shift = Math.max(0, track.scrollWidth - (window.innerWidth - pad * 2));
        section.style.height = `${window.innerHeight + shift}px`;
      };

      measure();
      $win.on('resize load', measure);
      onMediaChange(desktop, () => { measure(); Scroll.request(); });

      let rect = null;
      Scroll.read(() => { rect = section.classList.contains('is-pinned') ? section.getBoundingClientRect() : null; });
      Scroll.add((y, vh) => {
        if (!rect) return;
        const p = clamp(-rect.top / Math.max(1, rect.height - vh), 0, 1);
        track.style.setProperty('--tx', `${(-p * shift).toFixed(1)}px`);
        if (bar) bar.style.setProperty('--gp', p.toFixed(3));
      });

      viewport.addEventListener('scroll', () => {
        if (section.classList.contains('is-pinned') || !bar) return;
        const max = viewport.scrollWidth - viewport.clientWidth;
        bar.style.setProperty('--gp', max > 0 ? (viewport.scrollLeft / max).toFixed(3) : '0');
      }, { passive: true });
    }
  };

  /* ------------------------------------------------------------------------
     15. CAROUSEL (drag, buttons, progress)
     ------------------------------------------------------------------------ */
  const Carousel = {
    init() {
      document.querySelectorAll('[data-carousel]').forEach((carousel) => {
        const viewport = carousel.querySelector('.carousel__viewport');
        const progress = carousel.querySelector('.carousel__progress');
        if (!viewport) return;

        const stepSize = () => {
          const item = viewport.querySelector('.carousel__item');
          return item ? item.getBoundingClientRect().width + 24 : viewport.clientWidth * 0.8;
        };

        const update = () => {
          const max = viewport.scrollWidth - viewport.clientWidth;
          const visible = viewport.clientWidth / viewport.scrollWidth;
          const p = max > 0 ? viewport.scrollLeft / max : 1;
          if (progress) progress.style.setProperty('--cp', clamp(visible + (1 - visible) * p, 0.1, 1).toFixed(3));
        };

        carousel.querySelectorAll('.carousel__btn').forEach((btn) => {
          btn.addEventListener('click', () => {
            const dir = btn.classList.contains('carousel__btn--prev') ? -1 : 1;
            viewport.scrollBy({ left: dir * stepSize(), behavior: isReduced() ? 'auto' : 'smooth' });
          });
        });

        viewport.addEventListener('scroll', update, { passive: true });
        $win.on('resize', update);
        update();

        // Mouse drag-to-scroll (touch already scrolls natively).
        let down = false;
        let startX = 0;
        let startLeft = 0;
        let moved = false;
        viewport.addEventListener('pointerdown', (event) => {
          if (event.pointerType !== 'mouse') return;
          down = true; moved = false;
          startX = event.clientX;
          startLeft = viewport.scrollLeft;
        });
        window.addEventListener('pointermove', (event) => {
          if (!down) return;
          const dx = event.clientX - startX;
          if (Math.abs(dx) > 5) { moved = true; viewport.classList.add('is-dragging'); }
          if (moved) viewport.scrollLeft = startLeft - dx;
        });
        window.addEventListener('pointerup', () => {
          if (!down) return;
          down = false;
          window.setTimeout(() => viewport.classList.remove('is-dragging'), 0);
        });
        viewport.addEventListener('click', (event) => { if (moved) { event.preventDefault(); event.stopPropagation(); } }, true);

        viewport.addEventListener('keydown', (event) => {
          if (event.key === 'ArrowRight') { event.preventDefault(); viewport.scrollBy({ left: stepSize(), behavior: 'smooth' }); }
          if (event.key === 'ArrowLeft') { event.preventDefault(); viewport.scrollBy({ left: -stepSize(), behavior: 'smooth' }); }
        });
      });
    }
  };

  /* ------------------------------------------------------------------------
     16. CASE-STUDY FILTER
     ------------------------------------------------------------------------ */
  const CaseFilter = {
    init() {
      const $bar = $('.filter-bar');
      if (!$bar.length) return;
      const $cards = $('.case-grid > [data-tags]');
      const $count = $('.filter-count');

      $bar.on('click', '.filter-btn', function () {
        const filter = String($(this).data('filter'));
        $bar.find('.filter-btn').attr('aria-pressed', 'false');
        $(this).attr('aria-pressed', 'true');
        let shown = 0;
        $cards.each(function () {
          const tags = String($(this).data('tags')).split(',').map((t) => t.trim());
          const visible = filter === 'all' || tags.includes(filter);
          $(this).toggleClass('is-filtered-out', !visible).removeClass('is-filtering-in');
          if (visible) { shown += 1; if (!isReduced()) $(this).addClass('is-filtering-in'); }
        });
        $count.text(`Showing ${shown} example ${shown === 1 ? 'situation' : 'situations'}`);
      });
    }
  };

  /* ------------------------------------------------------------------------
     17. FORMS, WIZARD & VALIDATION
     ------------------------------------------------------------------------ */
  const Forms = {
    emailPattern: /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/,

    isValidPhone(value) {
      const digits = value.replace(/[^\d]/g, '');
      return /^[+\d][\d\s()-]*$/.test(value.trim()) && digits.length >= 10 && digits.length <= 15;
    },

    controls($field) {
      return $field.find('.input, .textarea, .select, input[type="checkbox"], input[type="radio"]');
    },

    check($field) {
      const $controls = this.controls($field);
      if (!$controls.length) return '';
      const $first = $controls.first();
      const type = ($first.attr('type') || '').toLowerCase();

      if (type === 'radio' || (type === 'checkbox' && $controls.length > 1)) {
        if ($field.is('[data-required]') && !$controls.filter(':checked').length) {
          return $field.attr('data-error') || 'Please choose an option.';
        }
        return '';
      }

      if (type === 'checkbox') {
        if ($first.prop('required') && !$first.prop('checked')) return $first.attr('data-error') || 'Please tick this box to continue.';
        return '';
      }

      const value = String($first.val() || '').trim();
      if ($first.prop('required') && !value) return $first.attr('data-error') || 'Please complete this field.';
      if (value && type === 'email' && !this.emailPattern.test(value)) return 'Please enter a valid email address, like name@example.com.';
      if (value && type === 'tel' && !this.isValidPhone(value)) return 'Please enter a valid phone number, like 07700 900123.';
      const max = parseInt($first.attr('maxlength'), 10);
      if (value && max && value.length > max) return `Please keep this to ${max} characters or fewer.`;
      return '';
    },

    show($field, message) {
      $field.toggleClass('has-error', Boolean(message));
      $field.find('.field__error').first().text(message || '');
      this.controls($field).attr('aria-invalid', message ? 'true' : null);
    },

    firstId($field) { return this.controls($field).first().attr('id'); },

    validate($scope) {
      const errors = [];
      $scope.find('[data-field]').filter(':visible').each((_, el) => {
        const $field = $(el);
        const message = this.check($field);
        this.show($field, message);
        if (message) errors.push({ id: this.firstId($field), message });
      });

      $scope.find('[data-require-one]').addBack('[data-require-one]').filter(':visible').each((_, group) => {
        const names = String($(group).attr('data-require-one')).split(',').map((n) => n.trim());
        const $form = $(group).closest('form');
        const filled = names.some((n) => String($form.find(`[name="${n}"]`).val() || '').trim());
        if (!filled) {
          const $target = $form.find(`[name="${names[0]}"]`).closest('[data-field]');
          const message = 'Please give us a phone number or an email address so we can reply.';
          this.show($target, message);
          errors.push({ id: this.firstId($target), message });
        }
      });

      return errors;
    },

    showSummary($form, errors) {
      const $summary = $form.find('.form-errors').first();
      if (!$summary.length) return;
      $summary.find('.form-errors__title').text(errors.length === 1
        ? 'There is 1 thing to fix before we can continue'
        : `There are ${errors.length} things to fix before we can continue`);
      $summary.find('.form-errors__list').html(errors.map((e) =>
        `<li><a href="#${escapeHtml(e.id || '')}">${escapeHtml(e.message)}</a></li>`).join(''));
      $summary.prop('hidden', false).trigger('focus');
    },

    hideSummary($form) { $form.find('.form-errors').prop('hidden', true); },

    redirect($form, viaWhatsApp) {
      const name = String($form.find('[name="name"]').val() || '').trim().split(/\s+/)[0];
      if (name) store.set('sessionStorage', 'sm_name', name);
      const type = $form.attr('data-type') || 'enquiry';
      const url = `./thank-you.html?type=${encodeURIComponent(type)}${viaWhatsApp ? '&via=whatsapp' : ''}`;
      Transitions.go(url);
    },

    // Visible question text for a control, without the "*" / "(optional)" markers.
    labelText($el) {
      const $source = $el.is(':radio, :checkbox') && $el.closest('fieldset').length
        ? $el.closest('fieldset').find('legend').first()
        : $(`label[for="${$el.attr('id')}"]`).first();
      const $copy = $source.clone();
      $copy.find('.field__req, .field__optional, input').remove();
      return $copy.text().replace(/\s+/g, ' ').trim().replace(/[?:]$/, '');
    },

    // Writes the completed form as a plain-text message, one answer per line.
    message($form) {
      const titles = { enquiry: 'New enquiry', callback: 'Call-back request', referral: 'Professional referral' };
      const lines = [`${titles[$form.attr('data-type')] || 'New enquiry'} from the Stonemere website`, ''];
      const done = {};
      $form.find('input[name], select[name], textarea[name]').each((_, el) => {
        const $el = $(el);
        const name = el.name;
        if (done[name] || el.type === 'hidden' || $el.closest('.hp-field').length) return;
        done[name] = true;
        let value = '';
        if (el.type === 'radio' || el.type === 'checkbox') {
          const $group = $form.find(`[name="${name}"]`);
          if ($group.length === 1 && el.type === 'checkbox') {
            value = el.checked ? 'Yes' : '';
            if (value && name === 'consent') { lines.push('Consent to use these details to reply: Yes'); return; }
          } else {
            value = $group.filter(':checked').map((i, c) => $(`label[for="${c.id}"]`).text().replace(/\s+/g, ' ').trim()).get().join(', ');
          }
        } else if (el.tagName === 'SELECT') {
          value = el.value ? $el.find('option:selected').text().trim() : '';
        } else {
          value = String($el.val() || '').trim();
        }
        if (value) lines.push(`${this.labelText($el)}: ${value}`);
      });
      return lines.join('\n');
    },

    // Opens WhatsApp in a new tab (or the app on phones) with the message ready.
    sendViaWhatsApp($form) {
      const url = `https://wa.me/${SITE_CONFIG.whatsapp}?text=${encodeURIComponent(this.message($form))}`;
      const win = window.open(url, '_blank');
      if (win) {
        win.opener = null;
        this.redirect($form, true);
      } else {
        window.location.href = url; // pop-up blocked: go straight to WhatsApp
      }
    },

    submit($form) {
      const $scope = $form.is('[data-wizard]') ? Wizard.current($form) : $form;
      $form.addClass('was-validated');
      const errors = this.validate($scope);
      if (errors.length) { this.showSummary($form, errors); return; }
      this.hideSummary($form);

      const honeypot = String($form.find('.hp-field input').val() || '');
      const tooFast = Date.now() - Number($form.data('started') || 0) < 2500;
      if (honeypot || tooFast) { this.redirect($form, false); return; }

      this.sendViaWhatsApp($form);
    },

    applyAudience(audience) {
      const map = { myself: 'myself', family: 'family', professional: 'professional' };
      const value = map[audience];
      if (!value) return;
      // Pre-select only where the visitor hasn't already answered this question.
      $('form').each(function () {
        const $radios = $(this).find('[name="support_for"]');
        if (!$radios.length || $radios.filter(':checked').length) return;
        $radios.filter(`[value="${value}"]`).prop('checked', true).trigger('change');
      });
    },

    init() {
      const self = this;

      $('form[data-validate]').each(function () {
        const $form = $(this);
        $form.attr('novalidate', 'novalidate').data('started', Date.now());

        $form.on('submit', (event) => {
          event.preventDefault();
          if ($form.is('[data-wizard]') && !Wizard.isLast($form)) { Wizard.next($form); return; }
          self.submit($form);
        });

        $form.on('blur change', '.input, .textarea, .select, input[type="checkbox"], input[type="radio"]', function () {
          if (!$form.hasClass('was-validated')) return;
          const $field = $(this).closest('[data-field]');
          self.show($field, self.check($field));
        });
      });

      $doc.on('click', '.form-errors__list a', function (event) {
        const id = ($(this).attr('href') || '').slice(1);
        const el = id ? document.getElementById(id) : null;
        if (!el) return;
        event.preventDefault();
        el.focus();
        el.scrollIntoView({ block: 'center', behavior: isReduced() ? 'auto' : 'smooth' });
      });

      $doc.on('change', 'form[data-validate] input[type="radio"], form[data-validate] select', function () {
        const $form = $(this).closest('form');
        $form.find('[data-reveal-when]').each(function () {
          const [name, value] = String($(this).attr('data-reveal-when')).split('=');
          const $control = $form.find(`[name="${name}"]`);
          const current = $control.is(':radio') ? $control.filter(':checked').val() : $control.val();
          $(this).prop('hidden', current !== value);
        });
      });

      $('textarea[maxlength]').each(function () {
        const $textarea = $(this);
        const max = parseInt($textarea.attr('maxlength'), 10);
        const $counter = $('<p class="char-count" aria-live="polite"></p>');
        $textarea.closest('[data-field]').append($counter);
        const update = () => $counter.text(`${max - $textarea.val().length} characters remaining`);
        $textarea.on('input', update);
        update();
      });

      const saved = store.get('sessionStorage', 'sm_audience');
      if (saved) this.applyAudience(saved);
    }
  };

  const Wizard = {
    steps($form) { return $form.find('.wizard__step'); },
    current($form) { return this.steps($form).filter('.is-current'); },
    isLast($form) { const $s = this.steps($form); return $s.index(this.current($form)) === $s.length - 1; },

    go($form, index, back) {
      const $steps = this.steps($form);
      const total = $steps.length;
      index = clamp(index, 0, total - 1);
      $steps.removeClass('is-current is-back');
      const $step = $steps.eq(index).addClass('is-current').toggleClass('is-back', Boolean(back));
      $form.find('.wizard__bar').css('--wp', ((index + 1) / total).toFixed(3));
      $form.find('[data-wizard-count]').text(`Step ${index + 1} of ${total}`);
      $form.find('[data-wizard-prev]').prop('hidden', index === 0);
      $form.find('[data-wizard-next]').prop('hidden', index === total - 1);
      $form.find('.wizard__nav [type="submit"]').prop('hidden', index !== total - 1);
      Forms.hideSummary($form);
      return $step;
    },

    next($form) {
      const $step = this.current($form);
      $form.addClass('was-validated');
      const errors = Forms.validate($step);
      if (errors.length) { Forms.showSummary($form, errors); return; }
      $form.removeClass('was-validated');
      const index = this.steps($form).index($step);
      const $next = this.go($form, index + 1, false);
      this.focusStep($form, $next);
    },

    prev($form) {
      const index = this.steps($form).index(this.current($form));
      const $prev = this.go($form, index - 1, true);
      this.focusStep($form, $prev);
    },

    focusStep($form, $step) {
      const $title = $step.find('.wizard__title').first();
      if ($title.length) {
        $title.attr('tabindex', '-1');
        $title[0].focus({ preventScroll: true });
      }
      const rect = $form[0].getBoundingClientRect();
      if (rect.top < 80) $form[0].scrollIntoView({ block: 'start', behavior: isReduced() ? 'auto' : 'smooth' });
    },

    init() {
      $('form[data-wizard]').each((_, form) => this.go($(form), 0, false));
      $doc.on('click', '[data-wizard-next]', function () { Wizard.next($(this).closest('form')); });
      $doc.on('click', '[data-wizard-prev]', function () { Wizard.prev($(this).closest('form')); });
    }
  };

  /* ------------------------------------------------------------------------
     18. CALL-BACK MODAL (native <dialog> with a fallback)
     ------------------------------------------------------------------------ */
  const Modal = {
    trigger: null,

    open(dialog) {
      if (typeof dialog.showModal === 'function') { if (!dialog.open) dialog.showModal(); }
      else { $(dialog).addClass('is-fallback-open').attr('open', ''); $body.addClass('is-locked'); }
      window.setTimeout(() => $(dialog).find('.input, .select, .textarea').first().trigger('focus'), 40);
    },

    close(dialog) {
      if (typeof dialog.close === 'function' && dialog.open) dialog.close();
      else { $(dialog).removeClass('is-fallback-open').removeAttr('open'); $body.removeClass('is-locked'); }
      if (this.trigger && document.body.contains(this.trigger)) this.trigger.focus();
    },

    init() {
      const self = this;
      $doc.on('click', '[data-modal-open]', function (event) {
        const dialog = document.getElementById($(this).attr('data-modal-open'));
        if (!dialog) return;
        event.preventDefault();
        self.trigger = this;
        self.open(dialog);
      });
      $doc.on('click', '[data-modal-close]', function () { self.close($(this).closest('dialog')[0]); });
      $doc.on('click', 'dialog.modal', function (event) { if (event.target === this) self.close(this); });
      $doc.on('keydown', (event) => {
        if (event.key === 'Escape') $('dialog.modal.is-fallback-open').each(function () { self.close(this); });
      });
    }
  };

  /* ------------------------------------------------------------------------
     19. PAGE TRANSITIONS (ink veil between internal pages)
     ------------------------------------------------------------------------ */
  const Transitions = {
    go(url) {
      if (isReduced()) { window.location.href = url; return; }
      root.classList.add('is-leaving');
      window.setTimeout(() => { window.location.href = url; }, 480);
    },

    isInternal(link) {
      if (!link || link.target === '_blank' || link.hasAttribute('download')) return false;
      const href = link.getAttribute('href') || '';
      if (!href || href.charAt(0) === '#' || /^(tel:|mailto:|javascript:)/i.test(href)) return false;
      const url = new URL(link.href, window.location.href);
      if (url.protocol !== window.location.protocol || url.host !== window.location.host) return false;
      if (url.pathname === window.location.pathname && url.hash) return false;
      return /\.html?$/i.test(url.pathname) || url.pathname.endsWith('/');
    },

    init() {
      // Lift the entry veil once the fonts are in, so text doesn't reflow mid-reveal.
      fontsReady(600).then(() => window.requestAnimationFrame(() => root.classList.remove('is-entering')));
      window.addEventListener('pageshow', () => root.classList.remove('is-leaving', 'is-entering'));

      $doc.on('click', 'a[href]', (event) => {
        const link = event.currentTarget;
        if (event.defaultPrevented || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey || event.button !== 0) return;
        if (!this.isInternal(link) || isReduced()) return;
        event.preventDefault();
        this.go(link.href);
      });
    }
  };

  /* ------------------------------------------------------------------------
     20. MOTION SWITCH & SECTION DOT NAVIGATION
     ------------------------------------------------------------------------ */
  const MotionSwitch = {
    init() {
      const reduced = root.classList.contains('reduce-motion') || systemReduced;
      $('.motion-toggle').attr('aria-pressed', String(reduced));
      if (systemReduced) $('.motion-toggle').prop('disabled', true).attr('title', 'Motion is already reduced by your device settings');

      $doc.on('click', '.motion-toggle', function () {
        const next = !root.classList.contains('reduce-motion');
        store.set('localStorage', 'sm_motion', next ? 'reduced' : 'full');
        root.classList.toggle('reduce-motion', next);
        $(this).attr('aria-pressed', String(next));
        window.setTimeout(() => window.location.reload(), 150);
      });
    }
  };

  const DotNav = {
    init() {
      if ($body.hasClass('page-index')) return;
      const sections = Array.from(document.querySelectorAll('main > section[aria-labelledby]'))
        .map((section) => {
          const heading = document.getElementById(section.getAttribute('aria-labelledby'));
          if (!heading || heading.classList.contains('visually-hidden') || heading.closest('.page-hero')) return null;
          const label = (heading.querySelector('.visually-hidden') || heading).textContent.replace(/\s+/g, ' ').trim();
          return { section, heading, label: label.length > 44 ? `${label.slice(0, 42)}…` : label };
        })
        .filter(Boolean);

      if (sections.length < 4 || !('IntersectionObserver' in window)) return;

      const nav = document.createElement('nav');
      nav.className = 'dotnav';
      nav.setAttribute('aria-label', 'Sections on this page');
      nav.innerHTML = `<ol>${sections.map((s) => `<li><a href="#${s.heading.id}"><span class="dotnav__label">${escapeHtml(s.label)}</span><span class="dotnav__dot" aria-hidden="true"></span></a></li>`).join('')}</ol>`;
      document.body.appendChild(nav);
      window.setTimeout(() => nav.classList.add('is-ready'), 600);

      const links = nav.querySelectorAll('a');
      const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          const index = sections.findIndex((s) => s.section === entry.target);
          links.forEach((link, i) => {
            link.classList.toggle('is-active', i === index);
            if (i === index) link.setAttribute('aria-current', 'location'); else link.removeAttribute('aria-current');
          });
        });
      }, { rootMargin: '-45% 0px -50% 0px' });
      sections.forEach((s) => io.observe(s.section));
    }
  };

  /* ------------------------------------------------------------------------
     21. THANK-YOU PAGE & UTILITIES
     ------------------------------------------------------------------------ */
  const ThankYou = {
    init() {
      if (!$body.hasClass('page-thank-you')) return;
      const params = new URLSearchParams(window.location.search);
      const type = params.get('type') || 'enquiry';
      const name = store.get('sessionStorage', 'sm_name');
      if (name) $('[data-ty-name]').text(`, ${name}`);
      $('[data-ty-type]').each(function () { $(this).prop('hidden', $(this).attr('data-ty-type') !== type); });
      if ($('[data-ty-type]:not([hidden])').length === 0) $('[data-ty-type="enquiry"]').prop('hidden', false);
      // Sent through WhatsApp: the message is ready but not yet delivered, so
      // replace "received" wording with the one remaining step.
      const viaWhatsApp = params.get('via') === 'whatsapp';
      $('.ty-preview').prop('hidden', !viaWhatsApp);
      if (viaWhatsApp) $('[data-ty-type]').prop('hidden', true);
    }
  };

  const Utilities = {
    init() {
      const file = (window.location.pathname.split('/').pop() || 'index.html').toLowerCase();
      $('.main-nav a[href], .drawer a[href], .footer-links a[href]').each(function () {
        const href = String($(this).attr('href')).replace('./', '').split('#')[0].toLowerCase();
        if (href && href === file && !$(this).attr('aria-current')) $(this).attr('aria-current', 'page');
      });
      $('[data-year]').text(new Date().getFullYear());
      $doc.on('click', '[data-print]', () => window.print());
    }
  };

  /* ------------------------------------------------------------------------
     22. HOME HERO
     The entrance is choreographed with CSS keyframes (they run on the
     compositor, so they stay smooth while the page is still loading).
     Scroll parallax and pointer depth are eased once per frame and written
     to the independent `translate` property, so they never fight the
     entrance. Loops pause whenever the hero is off screen. With reduced
     motion the hero is simply static.
     ------------------------------------------------------------------------ */
  const LuxHero = {
    onScreen: true,
    timer: null,
    tick: null,
    marquee: null,

    init() {
      const hero = document.querySelector('[data-lux-hero]');
      if (!hero) return;
      if (isReduced()) { hero.classList.add('is-ready', 'is-static'); return; }

      hero.classList.add('is-anim', 'is-ready');
      const title = hero.querySelector('.lux-hero__title');

      // Wait for the preloader and the fonts, then hand over to CSS. The timer
      // is a backstop for when animation frames are paused or throttled.
      const play = () => {
        if (hero.classList.contains('is-in')) return;
        hero.classList.add('is-in');
        if (title) title.classList.add('is-visible', 'is-split-in');
        window.setTimeout(() => this.ticker(hero), 2600);
      };
      Preloader.onDone(() => fontsReady(900).then(() => {
        window.requestAnimationFrame(play);
        window.setTimeout(play, 250);
      }));

      this.strip(hero);
      this.layers(hero);
      this.visibility(hero);
    },

    // The update card cycles through example messages.
    ticker(hero) {
      const list = hero.querySelector('.lux-hero__ticker');
      const items = list ? Array.from(list.children) : [];
      if (items.length < 2) return;
      let index = 0;
      list.classList.add('is-live');
      items[0].classList.add('is-current');
      this.tick = () => {
        const leaving = items[index];
        index = (index + 1) % items.length;
        leaving.classList.remove('is-current');
        leaving.classList.add('is-leaving');
        window.setTimeout(() => leaving.classList.remove('is-leaving'), 700);
        items[index].classList.add('is-current');
      };
      this.startTicker();
    },

    startTicker() {
      if (this.tick && !this.timer && this.onScreen) this.timer = window.setInterval(this.tick, 4200);
    },

    stopTicker() {
      window.clearInterval(this.timer);
      this.timer = null;
    },

    // Services strip: a Web Animations API loop (compositor-driven). The list
    // is duplicated in the markup, so moving it by -50% loops seamlessly.
    strip(hero) {
      const strip = hero.querySelector('.lux-hero__strip');
      const track = hero.querySelector('.lux-hero__strip-track');
      if (!strip || !track || typeof track.animate !== 'function') return;

      const anim = track.animate(
        [{ transform: 'translate3d(0, 0, 0)' }, { transform: 'translate3d(-50%, 0, 0)' }],
        { duration: 46000, iterations: Infinity }
      );
      this.marquee = anim;

      // Ease the speed down on hover (and back up), rather than snapping.
      let frame = null;
      let rate = 1;
      const easeRate = (to) => {
        window.cancelAnimationFrame(frame);
        const from = rate;
        const start = performance.now();
        const step = (now) => {
          const t = clamp((now - start) / 700, 0, 1);
          rate = from + (to - from) * (1 - Math.pow(1 - t, 3));
          if (typeof anim.updatePlaybackRate === 'function') anim.updatePlaybackRate(rate);
          else anim.playbackRate = rate;
          frame = t < 1 ? window.requestAnimationFrame(step) : null;
        };
        frame = window.requestAnimationFrame(step);
      };
      strip.addEventListener('mouseenter', () => easeRate(0.15));
      strip.addEventListener('mouseleave', () => easeRate(1));
    },

    // Scroll parallax and pointer depth for the collage layers.
    layers(hero) {
      if (!('translate' in document.documentElement.style)) return;

      // [selector, scroll drift (share of the layer's own height), pointer depth]
      const spec = [
        ['.lux-hero__content', -0.14, 0],
        ['.lux-hero__arch', -0.07, 0.4],
        ['.lux-hero__arch img', 0.09, 0],
        ['.lux-hero__lines', -0.03, 0],
        ['.lux-hero__portrait', -0.32, 0.9],
        ['.lux-hero__tile', -0.6, 1.2],
        ['.lux-hero__card', -0.48, 1.4],
        ['.lux-hero__seal', -0.9, 0],
        ['.lux-hero__glow', 0.45, 6]
      ];
      const layers = spec
        .map(([selector, rate, depth]) => ({ el: hero.querySelector(selector), rate, depth, h: 0, last: '' }))
        .filter((layer) => layer.el);
      const content = hero.querySelector('.lux-hero__content');
      const glow = hero.querySelector('.lux-hero__glow');

      let heroTop = 0;
      let heroH = 1;
      let progress = 0;
      let lastOpacity = '';
      let lastScale = '';

      // Layout is only measured on load and resize, never per frame.
      const measure = () => {
        heroTop = hero.getBoundingClientRect().top + window.scrollY;
        heroH = hero.offsetHeight || 1;
        layers.forEach((layer) => { layer.h = layer.el.offsetHeight || layer.el.clientHeight || 0; });
      };

      // Pointer state (normalised -0.5 … 0.5), eased toward its target.
      let mx = 0; let my = 0; let tx = 0; let ty = 0;
      let frame = null;
      let lastTime = 0;

      const apply = () => {
        layers.forEach((layer) => {
          const x = mx * 26 * layer.depth;
          const y = progress * layer.rate * layer.h + my * 20 * layer.depth;
          const value = `${x.toFixed(2)}px ${y.toFixed(2)}px`;
          if (value !== layer.last) { layer.last = value; layer.el.style.translate = value; }
        });
        if (content) {
          const opacity = (1 - progress * 0.75).toFixed(3);
          if (opacity !== lastOpacity) { lastOpacity = opacity; content.style.opacity = opacity; }
        }
        if (glow) {
          const scale = (1 + progress * 0.3).toFixed(3);
          if (scale !== lastScale) { lastScale = scale; glow.style.scale = scale; }
        }
      };

      measure();
      $win.on('resize load', () => { measure(); apply(); });
      fontsReady(3000).then(() => { measure(); apply(); });

      Scroll.add((y) => {
        const p = clamp((y - heroTop) / heroH, 0, 1);
        if (p === progress) return;
        progress = p;
        apply();
      });

      if (!finePointer) return;
      const wide = window.matchMedia('(min-width: 64em)');

      const step = (now) => {
        const dt = lastTime ? Math.min(64, now - lastTime) : 16.667;
        lastTime = now;
        const k = 1 - Math.pow(1 - 0.075, dt / 16.667);
        mx += (tx - mx) * k;
        my += (ty - my) * k;
        apply();
        if (Math.abs(tx - mx) > 0.0005 || Math.abs(ty - my) > 0.0005) {
          frame = window.requestAnimationFrame(step);
        } else {
          frame = null;
          lastTime = 0;
        }
      };
      const kick = () => { if (!frame) frame = window.requestAnimationFrame(step); };

      hero.addEventListener('pointermove', (event) => {
        if (event.pointerType !== 'mouse' || !wide.matches) return;
        tx = event.clientX / window.innerWidth - 0.5;
        ty = (event.clientY - (heroTop - window.scrollY)) / heroH - 0.5;
        kick();
      });
      hero.addEventListener('pointerleave', () => { tx = 0; ty = 0; kick(); });
      onMediaChange(wide, () => { if (!wide.matches) { tx = 0; ty = 0; kick(); } });
    },

    // Pause every loop while the hero is out of view.
    visibility(hero) {
      if (!('IntersectionObserver' in window)) return;
      new IntersectionObserver((entries) => {
        this.onScreen = entries[0].isIntersecting;
        hero.classList.toggle('is-offscreen', !this.onScreen);
        if (this.marquee) {
          if (this.onScreen) this.marquee.play();
          else this.marquee.pause();
        }
        if (this.onScreen) this.startTicker();
        else this.stopTicker();
      }).observe(hero);
    }
  };

  /* ------------------------------------------------------------------------
     23. SMOOTH SCROLLING
     Mouse-wheel and trackpad input is eased into the page's real scroll
     position (no fake scroll container), so sticky sections, anchors,
     find-in-page, the keyboard and the scrollbar all keep working normally.
     Desktop pointers only: touch scrolling and reduced motion stay native.
     ------------------------------------------------------------------------ */
  const SmoothScroll = {
    enabled: false,
    running: false,
    frame: null,
    mode: 'lerp',
    current: 0,
    target: 0,
    from: 0,
    start: 0,
    duration: 0,
    limit: 0,
    lastTime: 0,
    lastSet: 0,

    measureLimit() {
      this.limit = Math.max(0, document.documentElement.scrollHeight - window.innerHeight);
    },

    // True when the wheel is meant for an inner scrolling area (a menu,
    // a dialog, a textarea) that can still scroll in that direction.
    scrollsInside(node, dy) {
      while (node && node !== document.body && node !== document.documentElement) {
        if (node.nodeType === 1 && node.scrollHeight > node.clientHeight + 1) {
          const overflow = window.getComputedStyle(node).overflowY;
          if ((overflow === 'auto' || overflow === 'scroll') &&
              ((dy < 0 && node.scrollTop > 0) || (dy > 0 && Math.ceil(node.scrollTop + node.clientHeight) < node.scrollHeight))) {
            return true;
          }
        }
        node = node.parentNode;
      }
      return false;
    },

    onWheel(event) {
      if (event.defaultPrevented || event.ctrlKey || event.metaKey || event.altKey || event.shiftKey) return;
      if (document.body.classList.contains('is-locked') || document.querySelector('dialog[open]')) return;
      let dy = event.deltaY;
      if (!dy || Math.abs(event.deltaX) > Math.abs(dy)) return;
      if (event.deltaMode === 1) dy *= 40;
      else if (event.deltaMode === 2) dy *= window.innerHeight;
      if (this.scrollsInside(event.target, dy)) return;

      event.preventDefault();
      if (!this.running || this.mode !== 'lerp') {
        this.current = window.scrollY;
        this.target = this.current;
        this.mode = 'lerp';
      }
      this.measureLimit();
      this.target = clamp(this.target + dy, 0, this.limit);
      this.run();
    },

    // Programmatic scroll (anchors, back to top) with a long, soft ease.
    to(y) {
      if (!this.enabled) {
        window.scrollTo({ top: y, behavior: isReduced() ? 'auto' : 'smooth' });
        return;
      }
      this.measureLimit();
      this.current = window.scrollY;
      this.from = this.current;
      this.target = clamp(y, 0, this.limit);
      this.duration = clamp(500 + Math.abs(this.target - this.from) * 0.35, 700, 1600);
      this.start = performance.now();
      this.mode = 'tween';
      this.run();
    },

    run() {
      if (this.running) return;
      this.running = true;
      this.lastTime = 0;
      this.frame = window.requestAnimationFrame((now) => this.step(now));
    },

    stop() {
      window.cancelAnimationFrame(this.frame);
      this.running = false;
    },

    step(now) {
      let done;
      if (this.mode === 'tween') {
        const t = clamp((now - this.start) / this.duration, 0, 1);
        const eased = t < 0.5 ? 16 * Math.pow(t, 5) : 1 - Math.pow(-2 * t + 2, 5) / 2; // ease-in-out quint
        this.current = this.from + (this.target - this.from) * eased;
        done = t >= 1;
      } else {
        // Frame-rate independent easing toward the target.
        const dt = this.lastTime ? Math.min(64, now - this.lastTime) : 16.667;
        const k = 1 - Math.pow(1 - 0.1, dt / 16.667);
        this.current += (this.target - this.current) * k;
        done = Math.abs(this.target - this.current) < 0.35;
        if (done) this.current = this.target;
      }
      this.lastTime = now;
      window.scrollTo(0, this.current);
      this.lastSet = window.scrollY;
      // Scroll-linked effects update in this same frame, so nothing lags.
      // A failing effect must never leave the scroll loop stuck.
      try { Scroll.run(); } catch (e) { /* effects catch up on the next scroll event */ }
      if (done) { this.running = false; return; }
      this.frame = window.requestAnimationFrame((time) => this.step(time));
    },

    onAnchor(event) {
      if (event.isDefaultPrevented() || event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return;
      const link = event.currentTarget;
      const href = link.getAttribute('href') || '';
      if (href.length < 2 || link.hasAttribute('data-modal-open') || link.classList.contains('skip-link')) return;
      let target = null;
      try { target = document.getElementById(decodeURIComponent(href.slice(1))); } catch (e) { return; }
      if (!target) return;

      event.preventDefault();
      const pad = parseFloat(window.getComputedStyle(root).scrollPaddingTop) || 0;
      this.to(target.getBoundingClientRect().top + window.scrollY - pad);
      if (window.history && typeof window.history.pushState === 'function') window.history.pushState(null, '', href);

      // Keyboard and screen-reader users continue from the target, as with a native jump.
      if (!target.hasAttribute('tabindex') && !/^(A|BUTTON|INPUT|SELECT|TEXTAREA)$/.test(target.tagName)) target.setAttribute('tabindex', '-1');
      target.focus({ preventScroll: true });
    },

    init() {
      this.enabled = finePointer && !isReduced();
      if (!this.enabled) return;
      root.classList.add('has-smooth-scroll');

      window.addEventListener('wheel', (event) => this.onWheel(event), { passive: false });
      $doc.on('click', 'a[href^="#"]', (event) => this.onAnchor(event));

      // Scrollbar drags, keyboard scrolling and find-in-page take over instantly.
      window.addEventListener('scroll', () => {
        if (this.running && Math.abs(window.scrollY - this.lastSet) > 2) this.stop();
      }, { passive: true });
      window.addEventListener('keydown', (event) => {
        if (this.running && /^(Arrow|Page|Home|End| )/.test(event.key)) this.stop();
      });
    }
  };

  /* ------------------------------------------------------------------------
     BOOT
     ------------------------------------------------------------------------ */
  Preloader.init();

  $(function () {
    ThankYou.init(); // fills the visitor's name before headlines are split
    SplitText.init();
    LuxHero.init(); // before Reveal, which leaves the animated hero alone
    Header.init();
    Dropdowns.init();
    Drawer.init();
    Faq.init();
    Marquee.init();
    Reveal.init();
    Parallax.init();
    Micro.init();
    Audience.init();
    Keystone.init();
    BeforeAfter.init();
    Gallery.init();
    Carousel.init();
    CaseFilter.init();
    Wizard.init();
    Forms.init();
    Modal.init();
    Transitions.init();
    MotionSwitch.init();
    DotNav.init();
    Utilities.init();
    Scroll.init();
    SmoothScroll.init();
  });
})(jQuery);
