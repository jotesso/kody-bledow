# System Wzorniczy i Szablon Portalu KodyBłędów.pl (Styl Promptowy.com 1:1)
**Dokumentacja techniczna, tokeny stylów, typografia i układ komponentów odwzorowany 1:1 na podstawie Promptowy.com**
*Autor: DesignBOT (OpenBot Architecture)*  
*Dla: Kody błędów strona (`agent-77ba2339-6bb4-42bc-bd3b-de4a6a1a2319`)*  
*Status: Zgodny w 100% z referencją użytkownika*

---

## 1. Analiza Stylistyki i Założeń Projektowych (Promptowy.com)

Projekt został wiernie odwzorowany 1:1 z układu, typografii i elementów przesłanych przez użytkownika:

### 1.1. Podstawowe Filary Stylu
1. **Typografia o ogromnej sile wyrazu:**
   - **Bebas Neue (Google Fonts):** Skondensowany, monumentalny, bezszeryfowy krój w wersalikach dla wszystkich kluczowych nagłówków H1/H2, liczb statystyk i tytułów sekcji.
   - **Plus Jakarta Sans:** Nowoczesny, czysty krój dla treści, leadów i etykiet.
   - **JetBrains Mono:** Techniczne oznaczenia parametrów i kodów.
2. **Kontrastowe zderzenie dwóch światów (Dark Obsidian + Warm Cream):**
   - **Głęboka fioletowa czerń (`#090412` / `#0d0818`):** Header, Hero z wielkim tytułem, dwukolumnowe panele akcji, sekcja FAQ, newsletter ze schematem oraz stopka.
   - **Ciepły kremowy papier (`#faf8f5`):** Przejście w środek artykułu z **wielkim różowym inicjałem (Drop-Cap)** oraz sekcją źródeł z 4-kolumnową matrycą linków.
3. **Akcenty i Detale Marki:**
   - **Złoto-żółty przycisk akcji (`#F5C05C`):** Charakterystyczny przycisk `SKLEP` / `BAZA DTR` oraz `ZAPISZ SIĘ I POBIERZ PDF` z czarnym pogrubionym tekstem.
   - **Neonowa fuksja/róż (`#D946EF` / `#E879F9`):** Podtytuły, etykiety eyebrow, drop-cap oraz linki.
   - **Czerwone kwadraciki (`■` `#EF4444`):** Dyskretne separatory w menu głównym i sub-nawigacji.

---

## 2. Tokeny CSS (`tokens.css`)

```css
:root {
  /* Motyw ciemny (Obsidian / Midnight Plum) */
  --bg-dark-deep: #090412;
  --bg-dark-surface: #0f0a1d;
  --bg-dark-card: #150f28;
  --bg-dark-input: #1a1232;
  --border-dark: #2d1f47;

  /* Motyw jasny (Warm Cream Editorial) */
  --bg-cream: #faf8f5;
  --bg-cream-surface: #ffffff;
  --border-cream: #e5e0d8;
  --text-cream-title: #111827;
  --text-cream-body: #374151;

  /* Akcenty z Promptowy.com */
  --accent-gold: #f5c05c;
  --accent-gold-hover: #e5af3a;
  --accent-pink: #d946ef;
  --accent-pink-light: #e879f9;
  --accent-red-dot: #ef4444;

  /* Fonty */
  --font-display: 'Bebas Neue', Impact, sans-serif;
  --font-sans: 'Plus Jakarta Sans', sans-serif;
  --font-mono: 'JetBrains Mono', monospace;
}
```

---

## 3. Struktura Komponentów (Odwzorowanie 1:1)

1. **Header & Sub-navbar:**
   - Brand z ikoną narzędzia.
   - Menu z czerwonymi kwadracikami (`■`).
   - Wyszukiwarka z kapsułką `Ctrl K`.
   - Złoty przycisk akcji `BAZA DTR` (`#F5C05C`).
   - Podrzędny pasek nawigacyjny z linkami do podstron modelu (Mapa, Solucja, Reset, DTR).
2. **Hero:**
   - Eyebrow: `VAILLANT — KOD USTERKI KOTŁA CO`.
   - Tytuł: `KOD BŁĘDU F.28 VAILLANT` (Bebas Neue ~72-96px).
   - Różowy podtytuł: `NIEUDANY ZAPŁON PALNIKA • BLOKADA USTERKOWA`.
   - 4-kolumnowy pasek liczb: `3` próby, `1.4` bar ciśnienia, `G3` uprawnienia, `3s` BLUF.
   - Pasek metadanych autora i weryfikacji DTR w kolorze fuksji.
3. **Panele Akcji i Diagnozy (2 kolumny):**
   - Lewa: `CZYNNOŚCI DLA DOMOWNIKÓW` z przyciskami w czarnych ramkach.
   - Prawa: `DIAGNOSTYKA SERWISOWA (SEP G3)` z polem pomiaru i złotym przyciskiem `ZAPISZ PROTOKÓŁ NAPRAWY`.
4. **Ciepły Kremowy Artykuł z Różowym Drop-Capem:**
   - Płynne przejście w kremowe tło `#faf8f5`.
   - Inicjał: **Wielka różowa litera `B`** rozpoczynająca merytoryczny opis usterki.
   - Tabela parametrów technicznych w ciepłej oprawie.
5. **FAQ (Najczęstsze Pytania):**
   - Powrót do tła ciemnego `#090412` z gradientową kreską fuksja-błękit.
   - Wielki nagłówek `NAJCZĘSTSZE PYTANIA` (Bebas Neue).
   - Rozbudowane pytania w białym boldzie z odpowiedziami.
6. **Źródła i 4-Kolumnowa Matryca Linków:**
   - Sekcja kremowa ze spisem źródeł DTR oraz siatką podstron tematycznych.
7. **Newsletter i Schemat DTR do Druku:**
   - Sekcja 2-kolumnowa z punktami 01, 02, 03.
   - Formularz e-mail z jaskrawym złotym przyciskiem `ZAPISZ SIĘ I POBIERZ PDF`.
   - Prawa kolumna: Ramka z podglądem schematu kotła i podpisem formatów A3/A4.
8. **Pasek Autora & 6-Kolumnowa Stopka:**
   - Wizytówka Piotra z avatarem i linkami.
   - 6 kolumn linków tematycznych oraz dolny pasek "Wszystkie tematy".

---

## 4. Działający Plik Prototypu
Kompletny kod HTML/CSS znajduje się w:
`/Users/joachimsynoradzki/OpenBot/Shared/kody-bledow-preview.html`
