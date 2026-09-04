/* ============================================================
   PARTICLES BACKGROUND — Live particles (particles.js style)
   Ported behavior from VincentGarreau/particles.js (MIT).
   Renders only the particles/lines; the canvas stays transparent
   so the theme's background color (slate/navy) shows through.
   Uses the site's accent color, adapting opacity for light/dark.
   ============================================================ */
(function () {
  if (typeof window === 'undefined') return;

  const canvas = document.createElement('canvas');
  canvas.id = 'constellation-canvas';
  Object.assign(canvas.style, {
    position: 'fixed',
    inset: '0',
    width: '100%',
    height: '100%',
    zIndex: '0',
    pointerEvents: 'none'
  });
  document.body.prepend(canvas);

  const ctx = canvas.getContext('2d');
  let w = 0, h = 0;
  let particles = [];
  const mouse = { x: null, y: null };
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const CONFIG = {
    number: 90,          // base particle count
    densityArea: 750,    // area (px^2 / 1000) per particle
    size: 3,             // base particle radius
    speed: 6,            // drift speed
    linkDistance: 160,   // max distance to draw connecting lines
    linkWidth: 0.8,
    grabDistance: 220    // mouse "grab" link radius
  };

  /* Resolve the current accent color (from CSS var) into {r,g,b} */
  function accentRGB() {
    const styles = getComputedStyle(document.documentElement);
    const val = styles.getPropertyValue('--accent').trim() || '#0284c7';
    const hex = val.replace('#', '');
    const full = hex.length === 3
      ? hex.split('').map(c => c + c).join('')
      : hex;
    const num = parseInt(full, 16);
    return { r: (num >> 16) & 255, g: (num >> 8) & 255, b: num & 255 };
  }

  function resize() {
    w = canvas.width = window.innerWidth;
    h = canvas.height = window.innerHeight;
  }

  function desiredCount() {
    const area = (w * h) / 1000;
    return Math.round((area * CONFIG.number) / CONFIG.densityArea);
  }

  function particle(x, y) {
    const dir = Math.random() * Math.PI * 2;
    const vel = (Math.random() + 0.2) * (CONFIG.speed / 2);
    return {
      x: x !== undefined ? x : Math.random() * w,
      y: y !== undefined ? y : Math.random() * h,
      vx: Math.cos(dir) * vel,
      vy: Math.sin(dir) * vel,
      radius: CONFIG.size * (0.5 + Math.random() * 1.2),
      opacity: 0.3 + Math.random() * 0.5
    };
  }

  /* Reconcile particle count with density on init/resize */
  function rebalance() {
    const target = desiredCount();
    while (particles.length < target) particles.push(particle());
    if (particles.length > target) particles.length = target;
  }

  function alphaScale() {
    return document.documentElement.classList.contains('dark') ? 1 : 0.45;
  }

  function update() {
    if (prefersReduced) return;
    for (const p of particles) {
      p.x += p.vx;
      p.y += p.vy;
      if (p.x - p.radius > w) { p.x = -p.radius; p.y = Math.random() * h; }
      else if (p.x + p.radius < 0) { p.x = w + p.radius; p.y = Math.random() * h; }
      if (p.y - p.radius > h) { p.y = -p.radius; p.x = Math.random() * w; }
      else if (p.y + p.radius < 0) { p.y = h + p.radius; p.x = Math.random() * w; }
    }
  }

  function draw() {
    const { r, g, b } = accentRGB();
    const scale = alphaScale();
    ctx.clearRect(0, 0, w, h);
    const count = particles.length;

    /* connecting lines between close particles */
    ctx.lineWidth = CONFIG.linkWidth;
    for (let i = 0; i < count; i++) {
      const p1 = particles[i];
      for (let j = i + 1; j < count; j++) {
        const p2 = particles[j];
        const dx = p1.x - p2.x;
        const dy = p1.y - p2.y;
        const dist = Math.sqrt(dx * dx + dy * dy);
        if (dist < CONFIG.linkDistance) {
          const alpha = (1 - dist / CONFIG.linkDistance) * 0.5 * scale;
          if (alpha <= 0) continue;
          ctx.strokeStyle = `rgba(${r},${g},${b},${alpha})`;
          ctx.beginPath();
          ctx.moveTo(p1.x, p1.y);
          ctx.lineTo(p2.x, p2.y);
          ctx.stroke();
        }
      }
    }

    /* grab lines from mouse to nearby particles */
    if (mouse.x !== null && mouse.y !== null) {
      for (const p of particles) {
        const dx = p.x - mouse.x;
        const dy = p.y - mouse.y;
        const dist = Math.sqrt(dx * dx + dy * dy);
        if (dist < CONFIG.grabDistance) {
          const alpha = (1 - dist / CONFIG.grabDistance) * 0.6 * scale;
          if (alpha <= 0) continue;
          ctx.strokeStyle = `rgba(${r},${g},${b},${alpha})`;
          ctx.beginPath();
          ctx.moveTo(p.x, p.y);
          ctx.lineTo(mouse.x, mouse.y);
          ctx.stroke();
        }
      }
    }

    /* draw particles */
    for (const p of particles) {
      ctx.beginPath();
      ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
      ctx.fillStyle = `rgba(${r},${g},${b},${p.opacity * scale})`;
      ctx.fill();
    }

    requestAnimationFrame(draw);
  }

  resize();
  rebalance();
  draw();

  window.addEventListener('resize', () => { resize(); rebalance(); });
  document.addEventListener('mousemove', (e) => {
    mouse.x = e.clientX;
    mouse.y = e.clientY;
  });
  document.addEventListener('mouseleave', () => { mouse.x = null; mouse.y = null; });

  /* click to emit new particles (classic particles.js "push") */
  document.addEventListener('click', (e) => {
    for (let i = 0; i < 4; i++) {
      const p = particle(e.clientX, e.clientY);
      p.x += (Math.random() - 0.5) * 20;
      p.y += (Math.random() - 0.5) * 20;
      particles.push(p);
    }
    rebalance();
  });
})();
