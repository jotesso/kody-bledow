<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
  <div class="container">
    <nav class="nav-main">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="brand-logo">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
        KODY<span>BŁĘDÓW</span>.PL
        <span class="brand-badge">BAZA DTR</span>
      </a>

      <ul class="nav-links">
        <li><a href="<?php echo esc_url(home_url('/kategoria/kotly-gazowe/')); ?>">Kotły gazowe</a></li>
        <li class="nav-dot">■</li>
        <li><a href="<?php echo esc_url(home_url('/kategoria/pompy-ciepla/')); ?>">Pompy ciepła</a></li>
        <li class="nav-dot">■</li>
        <li><a href="<?php echo esc_url(home_url('/kategoria/pralki/')); ?>">Pralki & AGD</a></li>
        <li class="nav-dot">■</li>
        <li><a href="<?php echo esc_url(home_url('/weryfikacja-dtr/')); ?>">Weryfikacja DTR</a></li>
      </ul>

      <div style="display:flex; align-items:center; gap:12px;">
        <button type="button" class="btn-search-trigger" onclick="alert('Wyszukiwarka: wpisz kod błędu, np. F.28, 4C, E01.04')" style="background:var(--bg-dark-input); border:1px solid var(--border-dark); color:var(--text-gray); padding:8px 14px; border-radius:8px; font-size:12px; cursor:pointer; display:flex; align-items:center; gap:8px;">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
          Szukaj kodu... <kbd style="background:#090412; padding:1px 5px; border-radius:4px; font-size:10px; border:1px solid var(--border-dark);">Ctrl K</kbd>
        </button>
        <a href="#baza-dtr" class="btn-gold">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
          BAZA DTR
        </a>
      </div>
    </nav>
  </div>
</header>

<div class="sub-nav">
  <div class="container sub-nav-inner">
    <?php kody_bledow_breadcrumbs(); ?>
    <div style="display:flex; gap:12px; font-family:var(--font-mono); font-size:11px;">
      <a href="#solucja" style="color:var(--accent-pink); text-decoration:none;"># Solucja domowa</a>
      <a href="#diagnostyka-sep" style="color:var(--accent-gold); text-decoration:none;"># Diagnostyka SEP/G3</a>
      <a href="#dtr-zrodlo" style="color:#d1d5db; text-decoration:none;"># Dokumentacja DTR</a>
    </div>
  </div>
</div>