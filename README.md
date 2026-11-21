# KodyBłędów.pl – Portal Kodów Błędów HVAC & AGD

Kompletny pakiet wdrożeniowy dla serwisu **KodyBłędów.pl** opartego na **WordPressie** z autorskim, ultralekkim motywem w stylistyce **Promptowy.com 1:1** oraz dedykowaną wtyczką silnika danych z bazą **100 zweryfikowanych kodów błędów** z oficjalnej dokumentacji DTR producentów.

---

## 🚀 Kluczowe Cechy Projektu

- **Stylistyka Promptowy.com 1:1**: Monumentalny krój **Bebas Neue** w nagłówkach H1/H2 i liczbach, dynamiczne zderzenie **ciemnego obsydianu (`#090412`)** z **kremowym papierem (`#faf8f5`)**, wyraziste akcenty **fuksji (`#d946ef`)**, **złote przyciski CTA (`#f5c05c`)** oraz wielki różowy Drop-Cap.
- **Mobile-First & Zero-Overflow**: Rygorystyczny brak ucinania tekstu i tabel na urządzeniach mobilnych (od 320px wzwyż), lekkie menu hamburgerowe (< 1 KB Vanilla JS bez jQuery).
- **100 Zweryfikowanych Kodów Błędów**:
  - **45 kodów kotłów gazowych i pieców**: De Dietrich, Buderus, Junkers, Vaillant, Viessmann, Ariston, Brötje, Defro, Ferroli, Termet.
  - **20 kodów pomp ciepła i klimatyzacji**: Panasonic Aquarea, Kaisai, Daikin Altherma, Mitsubishi Electric, Carrier, Nibe.
  - **35 kodów dużego AGD**: Samsung EcoBubble, Bosch/Siemens (zmywarki i pralki), Whirlpool/Hotpoint Ariston, Electrolux, Beko, Amica, Hisense, Candy, Miele, Indesit.
- **Bezpieczne, nieklikalne źródła**: Wszystkie adresy URL do oficjalnej dokumentacji PDF producentów są osadzone w nieklikalnych kapsułkach tekstowych (ochrona przed utratą ruchu i karami SEO).
- **Yoast SEO Sentence Case**: Unikalne tagi meta title (do 60 znaków) i meta description (do 155 znaków) pisane z zachowaniem zwykłej wielkości liter.
- **Automatyczny Import (Plug & Play)**: Wtyczka `kody-bledow-core` przy aktywacji w WordPressie automatycznie tworzy CPT `kod_bledu`, taksonomie oraz importuje 100 artykułów technicznych z procedurami naprawy i polami meta.

---

## 📂 Struktura Repozytorium

```
├── kody-bledow-theme/          # Kod źródłowy autorskiego motywu WordPress
│   ├── style.css               # Arkusz stylów (Promptowy.com 1:1, tokens, zero-overflow)
│   ├── functions.php           # Konfiguracja motywu, fonty Google, chlebki, filtry Yoast
│   ├── header.php              # Header, sub-navbar, wyszukiwarka Ctrl K, menu hamburger
│   ├── footer.php              # 6-kolumnowa stopka techniczna, certyfikacja DTR
│   ├── index.php / front-page  # Strona główna z wyszukiwarką i katalogiem kodów
│   └── single-kod_bledu.php    # Szablon błędu (Hero Bebas Neue, BLUF 3s, kremowy Drop-Cap, FAQ)
├── kody-bledow-core/           # Kod źródłowy wtyczki silnika danych
│   ├── kody-bledow-core.php    # Rejestracja CPT, taksonomii i hook auto-importu
│   └── data-100-errors.json    # Wsadowa baza danych 100 kodów z DTR
├── packages/                   # Gotowe archiwa ZIP do wgrania w kokpicie WordPress
│   ├── kody-bledow-theme.zip   # Paczka motywu
│   └── kody-bledow-core.zip    # Paczka wtyczki
├── data/                       # Bazy danych w formatach CSV i JSON
│   ├── baza-100-kodow-bledow.csv # Arkusz CSV UTF-8 z BOM (do Excela / WP All Import)
│   └── data-100-errors.json    # Pełna baza w JSON
├── docs/                       # Dokumentacja techniczna i plan wdrożenia
│   ├── plan-wdrozenia-kody-bledow-wordpress-100-kodow.md # Główny plan wdrożenia
│   ├── design-system-kody-bledow.md                      # Specyfikacja design systemu
│   └── INSTRUKCJA-INSTALACJI-WORDPRESS.md                # Instrukcja instalacji krok po kroku
├── preview/                    # Samodzielny podgląd wizualny HTML
│   └── kody-bledow-podglad-promptowy.html
└── README.md                   # Niniejsza dokumentacja
```

---

## 🛠️ Szybka Instalacja w WordPressie (2 minuty)

1. **Wgraj motyw**: Kokpit WP -> **Wygląd -> Motywy -> Dodaj nowy -> Wyślij motyw na serwer** -> wskaż `packages/kody-bledow-theme.zip` -> kliknij **Włącz**.
2. **Wgraj wtyczkę**: Kokpit WP -> **Wtyczki -> Dodaj nową -> Wyślij wtyczkę na serwer** -> wskaż `packages/kody-bledow-core.zip` -> kliknij **Włącz wtyczkę**.
3. **Gotowe!** W menu bocznym pojawi się zakładka **Kody błędów** ze 100 kompletnymi, zweryfikowanymi podstronami.

Szczegółowy opis konfiguracji znajduje się w [docs/INSTRUKCJA-INSTALACJI-WORDPRESS.md](docs/INSTRUKCJA-INSTALACJI-WORDPRESS.md).

---

## 📄 Licencja & Autorzy
Projekt przygotowany w ramach platformy OpenBot przy współpracy agentów `Kody błędów strona` oraz `DesignBOT`.