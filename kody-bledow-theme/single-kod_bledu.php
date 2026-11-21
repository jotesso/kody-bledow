<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php
  $kod = get_post_meta(get_the_ID(), 'kod_oznaczenie', true) ?: get_the_title();
  $marka_terms = get_the_terms(get_the_ID(), 'producent_marka');
  $marka_name = ($marka_terms && !is_wp_error($marka_terms)) ? $marka_terms[0]->name : 'Urządzenie';
  
  $znaczenie = get_post_meta(get_the_ID(), 'kod_znaczenie_dtr', true);
  $bluf = get_post_meta(get_the_ID(), 'kod_bluf_streszczenie', true);
  $reset = get_post_meta(get_the_ID(), 'kod_mozna_resetowac', true);
  $kwalifikacja = get_post_meta(get_the_ID(), 'kod_kwalifikacja_bezpieczenstwa', true);
  $przyczyny = get_post_meta(get_the_ID(), 'kod_przyczyny_tabela', true);
  $procedura = get_post_meta(get_the_ID(), 'kod_procedura_naprawy', true);
  $kiedy_serwis = get_post_meta(get_the_ID(), 'kod_kiedy_wezwac_serwis', true);
  $koszt = get_post_meta(get_the_ID(), 'kod_szacowany_koszt', true) ?: '250 - 550 PLN (robocizna + diagnostyka)';
  $dtr_tytul = get_post_meta(get_the_ID(), 'kod_zrodlo_dtr_tytul', true);
  $dtr_strona = get_post_meta(get_the_ID(), 'kod_zrodlo_dtr_strona', true);
  $dtr_url = get_post_meta(get_the_ID(), 'kod_zrodlo_dtr_url_nieklikalny', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <!-- HERO (OBSIDIAN) -->
  <section class="error-hero">
    <div class="container">
      <div class="hero-eyebrow">
        <span><?php echo esc_html($marka_name); ?></span> • <span>DOKUMENTACJA TECHNICZNA DTR</span>
      </div>
      <h1 class="hero-title"><?php echo esc_html($marka_name); ?> KOD BŁĘDU <?php echo esc_html($kod); ?></h1>
      <div class="hero-subtitle"><?php echo esc_html($znaczenie); ?></div>

      <!-- 4 STATS BAR -->
      <div class="stats-bar">
        <div class="stat-box">
          <div class="stat-num">3s</div>
          <div class="stat-label">Diagnoza BLUF</div>
        </div>
        <div class="stat-box">
          <div class="stat-num"><?php echo (strpos($reset, 'Nie') !== false) ? '0' : '1-2'; ?></div>
          <div class="stat-label">Dozwolone resety</div>
        </div>
        <div class="stat-box">
          <div class="stat-num"><?php echo (strpos($kwalifikacja, 'G3') !== false) ? 'G3' : ((strpos($kwalifikacja, 'SEP') !== false) ? 'SEP' : 'DIY'); ?></div>
          <div class="stat-label">Kwalifikacja</div>
        </div>
        <div class="stat-box">
          <div class="stat-num">100%</div>
          <div class="stat-label">Zgodność z DTR</div>
        </div>
      </div>

      <!-- 2-COL DIAGNOSTIC PANELS -->
      <div class="diagnostic-grid" id="solucja">
        <!-- LEWY: DOMOWNICY -->
        <div class="diag-panel">
          <div class="diag-panel-header">
            <h2 class="diag-panel-title">CZYNNOŚCI DLA DOMOWNIKÓW</h2>
            <span class="diag-badge-diy">BEZPIECZNE DIY</span>
          </div>
          <ul class="diag-steps">
            <li class="diag-step-item">
              <span class="step-num">1</span>
              <div><strong>Status resetu:</strong> <?php echo esc_html($reset); ?>.</div>
            </li>
            <li class="diag-step-item">
              <span class="step-num">2</span>
              <div><strong>Kroki użytkownika:</strong> <?php echo esc_html($procedura); ?></div>
            </li>
            <li class="diag-step-item">
              <span class="step-num">3</span>
              <div><strong>Objawy krytyczne:</strong> <?php echo esc_html($kiedy_serwis); ?></div>
            </li>
          </ul>
        </div>

        <!-- PRAWY: SERWISANT SEP/G3 -->
        <div class="diag-panel" id="diagnostyka-sep">
          <div class="diag-panel-header">
            <h2 class="diag-panel-title">DIAGNOSTYKA SERWISOWA</h2>
            <span class="diag-badge-sep"><?php echo esc_html($kwalifikacja); ?></span>
          </div>
          <ul class="diag-steps">
            <li class="diag-step-item">
              <span class="step-num">A</span>
              <div><strong>Przyczyny techniczne:</strong> <?php echo esc_html($przyczyny); ?></div>
            </li>
            <li class="diag-step-item">
              <span class="step-num">B</span>
              <div><strong>Szacowany koszt naprawy:</strong> <?php echo esc_html($koszt); ?>.</div>
            </li>
            <li class="diag-step-item">
              <span class="step-num">C</span>
              <div><strong>Pomiary:</strong> Weryfikacja armatury, czujników NTC i uziemienia zgodnie z DTR.</div>
            </li>
          </ul>
          <div style="margin-top:20px;">
            <a href="#dtr-zrodlo" class="btn-gold" style="width:100%; justify-content:center;">ZAPISZ PROTOKÓŁ NAPRAWY (PDF)</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CREAM PAPER ARTICLE -->
  <section class="article-cream-wrap">
    <div class="container">
      <h2 class="article-header-title">DOKŁADNY OPIS TECHNICZNY I PROCEDURA NAPRAWY</h2>
      <div class="article-body">
        <p class="drop-cap-p">
          Błąd <strong><?php echo esc_html($kod); ?></strong> w urządzeniach marki <strong><?php echo esc_html($marka_name); ?></strong> oznacza zgodnie z dokumentacją serwisową: <em><?php echo esc_html($znaczenie); ?></em>. Usterka ta pojawia się w momencie, gdy moduł sterujący zarejestruje nieprawidłowe parametry pracy bloku kotła lub układu wykonawczego.
        </p>
        <p>
          W przypadku wystąpienia tego kodu kluczowe znaczenie ma zachowanie procedur bezpieczeństwa. <?php echo esc_html($bluf); ?>
        </p>

        <!-- SPEC TILES -->
        <div class="spec-tile-list">
          <div class="spec-row-tile">
            <div class="label">Producent & Seria</div>
            <div class="val"><?php echo esc_html($marka_name); ?></div>
          </div>
          <div class="spec-row-tile">
            <div class="label">Kod Błędu</div>
            <div class="val"><?php echo esc_html($kod); ?></div>
          </div>
          <div class="spec-row-tile">
            <div class="label">Wymagane Kwalifikacje</div>
            <div class="val"><?php echo esc_html($kwalifikacja); ?></div>
          </div>
          <div class="spec-row-tile">
            <div class="label">Szacowany Koszt</div>
            <div class="val"><?php echo esc_html($koszt); ?></div>
          </div>
        </div>

        <p>
          <strong>Szczegółowa instrukcja usunięcia problemu:</strong><br>
          <?php echo esc_html($procedura); ?>
        </p>

        <!-- DTR CAPSULE -->
        <div class="dtr-source-box" id="dtr-zrodlo">
          <div class="dtr-source-title">OFICJALNE ŹRÓDŁO TECHNICZNE DTR (PRODUCENT)</div>
          <p style="font-size:13px; color:#4b5563; margin-bottom:4px;">
            Dokumentacja: <strong><?php echo esc_html($dtr_tytul); ?></strong> (<?php echo esc_html($dtr_strona); ?>).
          </p>
          <span class="dtr-url-capsule"><?php echo esc_html($dtr_url); ?></span>
          <span style="font-size:11px; color:#6b7280; display:block; margin-top:6px;">
            (Powyższy adres jest nieklikalnym identyfikatorem źródłowym – skopiuj go do paska przeglądarki, aby pobrać manual).
          </span>
        </div>

        <!-- 4-COL RELATED MATRIX -->
        <h3 class="related-matrix-title">POWIĄZANE KODY BŁĘDÓW <?php echo esc_html(strtoupper($marka_name)); ?></h3>
        <div class="related-matrix">
          <a href="<?php echo esc_url(home_url('/marka/' . sanitize_title($marka_name) . '/')); ?>" class="related-card">
            <div class="code">HUB <?php echo esc_html($marka_name); ?></div>
            <div class="desc">Wszystkie kody producenta</div>
          </a>
          <a href="#solucja" class="related-card">
            <div class="code">RESET <?php echo esc_html($kod); ?></div>
            <div class="desc">Procedura kasowania</div>
          </a>
          <a href="#diagnostyka-sep" class="related-card">
            <div class="code">SERWIS SEP</div>
            <div class="desc">Kwalifikacje i pomiary</div>
          </a>
          <a href="<?php echo esc_url(home_url('/weryfikacja-dtr/')); ?>" class="related-card">
            <div class="code">CERTYFIKAT DTR</div>
            <div class="desc">Zgodność z dokumentacją</div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ (OBSIDIAN) -->
  <section class="faq-section">
    <div class="container">
      <h2 class="faq-title">NAJCZĘSTSZE PYTANIA O BŁĄD <?php echo esc_html($kod); ?></h2>
      <div class="faq-accordion">
        <div class="faq-item">
          <h3>Czy mogę samodzielnie zresetować błąd <?php echo esc_html($kod); ?>?</h3>
          <p><?php echo esc_html($reset); ?>. Pamiętaj, aby nie powtarzać resetu wielokrotnie w przypadku braku efektu.</p>
        </div>
        <div class="faq-item">
          <h3>Jakie są najczęstsze przyczyny usterki <?php echo esc_html($kod); ?>?</h3>
          <p><?php echo esc_html($przyczyny); ?></p>
        </div>
        <div class="faq-item">
          <h3>Kiedy bezwzględnie należy wezwać autoryzowany serwis?</h3>
          <p><?php echo esc_html($kiedy_serwis); ?></p>
        </div>
      </div>
    </div>
  </section>
</article>

<?php endwhile; endif; ?>

<?php get_footer(); ?>