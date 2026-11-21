<?php get_header(); ?>

<section class="error-hero">
  <div class="container" style="text-align:center;">
    <div class="hero-eyebrow" style="justify-content:center;">PORTAL DIAGNOSTYCZNY HVAC & AGD • STYLE PROMPTOWY.COM 1:1</div>
    <h1 class="hero-title" style="font-size:clamp(3rem, 7vw, 5.5rem);">KOMPLETNA BAZA KODÓW BŁĘDÓW</h1>
    <p class="hero-subtitle" style="max-width:700px; margin:0 auto 32px;">
      100 zweryfikowanych kodów błędów kotłów gazowych, pomp ciepła i dużego AGD. Oficjalne dane z instrukcji DTR producentów, procedury resetu i bezpieczne instrukcje naprawy.
    </p>

    <!-- STATS BAR -->
    <div class="stats-bar" style="max-width:900px; margin:0 auto 48px;">
      <div class="stat-box">
        <div class="stat-num">100</div>
        <div class="stat-label">Kodów w bazie</div>
      </div>
      <div class="stat-box">
        <div class="stat-num">20+</div>
        <div class="stat-label">Marek HVAC & AGD</div>
      </div>
      <div class="stat-box">
        <div class="stat-num">100%</div>
        <div class="stat-label">Poparcie w DTR</div>
      </div>
      <div class="stat-box">
        <div class="stat-num">3s</div>
        <div class="stat-label">Czas diagnozy</div>
      </div>
    </div>
  </div>
</section>

<!-- LIST OF CODES -->
<section class="article-cream-wrap">
  <div class="container">
    <h2 class="article-header-title">BAZA 100 ZWERYFIKOWANYCH KODÓW BŁĘDÓW</h2>
    <p style="margin-bottom:24px; color:#4b5563;">Wybierz kod błędu, aby otworzyć pełną instrukcję diagnostyki i usunięcia usterki:</p>
    
    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(280px, 1fr)); gap:16px;">
      <?php
      $args = array(
        'post_type' => 'kod_bledu',
        'posts_per_page' => 100,
        'orderby' => 'title',
        'order' => 'ASC'
      );
      $query = new WP_Query($args);
      if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
        $kod = get_post_meta(get_the_ID(), 'kod_oznaczenie', true) ?: get_the_title();
        $znaczenie = get_post_meta(get_the_ID(), 'kod_znaczenie_dtr', true);
        $marka_terms = get_the_terms(get_the_ID(), 'producent_marka');
        $marka_name = ($marka_terms && !is_wp_error($marka_terms)) ? $marka_terms[0]->name : '';
      ?>
        <a href="<?php the_permalink(); ?>" class="related-card" style="padding:16px; border:1px solid #e5e0d8; background:#fff; border-radius:10px;">
          <div style="font-family:var(--font-mono); font-size:11px; color:var(--accent-pink); font-weight:700; text-transform:uppercase;"><?php echo esc_html($marka_name); ?></div>
          <div style="font-family:var(--font-display); font-size:24px; color:#111827; margin:4px 0;"><?php echo esc_html($kod); ?></div>
          <div style="font-size:12px; color:#4b5563; line-height:1.4; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;"><?php echo esc_html($znaczenie); ?></div>
        </a>
      <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>