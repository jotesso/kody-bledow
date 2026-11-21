# Instrukcja Wdrożenia Bazy Kodów Błędów na WordPress (FTP / Kokpit WP)

Przygotowano kompletny zestaw plików instalacyjnych dla portalu **KodyBłędów.pl** odwzorowujący stylistykę **Promptowy.com 1:1** (Bebas Neue, ciemny obsydian, kremowy papier z wielkim różowym inicjałem, złote przyciski CTA, 4-stat bar, brak overflow na mobile od 320px wzwyż) wraz z bazą **100 zweryfikowanych kodów błędów HVAC i AGD** z oficjalnych instrukcji DTR.

---

## 1. Zestaw Plików Instalacyjnych

Wszystkie pliki znajdują się w folderze roboczym oraz katalogu współdzielonym `OpenBot/Shared`:
- **Motyw WordPress**: `kody-bledow-theme.zip` (katalog `/wp-content/themes/kody-bledow-theme/`)
- **Wtyczka Silnika Danych & Auto-Importu**: `kody-bledow-core.zip` (katalog `/wp-content/plugins/kody-bledow-core/`)
- **Baza 100 kodów w formacie CSV**: `baza-100-kodow-bledow.csv` (rozdzielana średnikami, kodowanie UTF-8 z BOM, gotowa do Excela / WP All Import)
- **Baza 100 kodów w formacie JSON**: `data-100-errors.json`
- **Podgląd wizualny HTML**: `kody-bledow-podglad-promptowy.html`

---

## 2. Metoda Instalacji (Kokpit WordPress - 2 minuty)

### Krok 1: Instalacja i włączenie motywu
1. Zaloguj się do kokpitu WordPress (`/wp-admin`).
2. Przejdź do: **Wygląd -> Motywy -> Dodaj nowy -> Wyślij motyw na serwer**.
3. Wybierz plik `kody-bledow-theme.zip`, kliknij **Zainstaluj teraz**, a następnie **Włącz**.

### Krok 2: Instalacja i aktywacja wtyczki danych (Auto-Import 100 Kodów)
1. Przejdź do: **Wtyczki -> Dodaj nową -> Wyślij wtyczkę na serwer**.
2. Wybierz plik `kody-bledow-core.zip`, kliknij **Zainstaluj teraz**, a następnie **Włącz wtyczkę**.
3. **Automatyczny import:** W momencie aktywacji wtyczka natychmiast:
   - Utworzy CPT `kod_bledu` oraz taksonomie `kategoria_urzadzenia`, `producent_marka`, `seria_urzadzenia`.
   - Zaimportuje 100 unikalnych artykułów technicznych z procedurami naprawy z DTR.
   - Przypisze wszystkie pola meta (znaczenie, reset, kwalifikacje, DTR, nieklikalne URL-e).
   - Ustawi unikalne tagi **Yoast SEO** (`_yoast_wpseo_title`, `_yoast_wpseo_metadesc`) w formacie sentence case.

---

## 3. Alternatywna Instalacja przez FTP / SFTP

1. Połącz się z serwerem hostingowym.
2. Rozpakuj zawartość archiwów do katalogów docelowych:
   - Folder `kody-bledow-theme/` wgraj do `/wp-content/themes/`
   - Folder `kody-bledow-core/` wgraj do `/wp-content/plugins/`
3. Wejdź do Kokpitu WordPress i aktywuj motyw oraz wtyczkę.

---

## 4. Weryfikacja Poprawności i Yoast SEO
1. Wejdź w **Kody błędów -> Wszystkie kody** – na liście pojawi się 100 zweryfikowanych wpisów.
2. Otwórz dowolny błąd (np. *Vaillant F.28* lub *Samsung 4C*):
   - Zobaczysz sekcję Hero w stylu Promptowy.com z czarnym obsydianem i złotym przyciskiem.
   - Sekcja środkowa płynnie przechodzi w kremowy papier `#faf8f5` z różowym inicjałem (Drop-Cap).
   - Adres instrukcji PDF producenta wyświetla się w bezpiecznej, nieklikalnej kapsułce DTR.
3. Wtyczka **Yoast SEO** automatycznie odczyta przypisane meta tytuły i opisy w sentence case bez potrzeby ich ręcznej edycji.