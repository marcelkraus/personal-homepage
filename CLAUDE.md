# personal-homepage
> Übergreifender Kontext > personal-homepage

Kurzname: homepage

Dieses Projekt ist Teil meiner IT-Landschaft – einer Sammlung
privater und gewerblicher Projekte. Übergeordneter Kontext und
Struktur sind im „Übergreifenden Kontext" dokumentiert.

## Beschreibung

Meine persönliche Portfolio-Website (https://www.marcelkraus.de). Die
Seite stellt meine Tätigkeiten, Karrieremeilensteine und Projekte
vor – als minimalistische Visitenkarte. Die Website ist
zweisprachig (Deutsch/Englisch) verfügbar.

## Technologie-Stack

- **Backend:** Symfony 8.0, PHP 8.4
- **Templates:** Twig
- **Styling:** Tailwind CSS 4 mit Typography-Plugin
- **Internationalisierung:** Symfony Translation (YAML-Dateien)
- **Karte:** Leaflet mit OpenStreetMap
- **Analytics:** Matomo (cookie-free, Site ID 10)
- **Entwicklung:** DDEV (Nginx-FPM, MariaDB 10.4)

## Entwicklungsumgebung

### DDEV starten

```bash
ddev start
```

Zugriff über: https://personal-homepage.ddev.site

### Tailwind CSS kompilieren

```bash
# Entwicklung mit Watch-Modus:
ddev exec npm run dev

# Produktions-Build:
ddev exec npm run build
```

### Symfony-Befehle

```bash
ddev exec php bin/console cache:clear
ddev exec php bin/console debug:routes
```

## Projektstruktur

```
personal-homepage/
├── config/
│   ├── content/
│   │   ├── milestones.json          ← Meilensteine (DE + EN, via language-Feld)
│   │   └── projects.json            ← Projekte (DE + EN, via language-Feld)
│   └── packages/
│       └── translation.yaml         ← Übersetzungskonfiguration
├── src/
│   ├── Controller/
│   │   └── DefaultController.php    ← Alle Routes (nur GET)
│   ├── Entity/
│   │   ├── Milestone.php            ← Meilenstein-Entity
│   │   └── Project.php              ← Projekt-Entity
│   └── EventListener/
│       └── LocaleRedirectListener.php ← Locale-Erkennung (Accept-Language)
├── templates/
│   ├── base.html.twig               ← Basis-Template mit Header, Footer, Matomo
│   └── default/
│       ├── homepage.html.twig       ← Startseite
│       ├── imprint.de.html.twig     ← Impressum (Deutsch)
│       ├── imprint.en.html.twig     ← Imprint (Englisch)
│       ├── data-privacy.de.html.twig ← Datenschutz (Deutsch)
│       └── data-privacy.en.html.twig ← Privacy Policy (Englisch)
├── translations/
│   ├── messages.de.yaml             ← Deutsche UI-Strings
│   └── messages.en.yaml             ← Englische UI-Strings
├── public/
│   ├── css/
│   │   ├── input.css                ← Tailwind-Quell-CSS
│   │   └── output.css               ← Kompiliertes Tailwind CSS
│   ├── fonts/                       ← Aller-Schriftfamilie
│   └── images/                      ← Bilder (Avatar, Logos, Projekte)
├── .ddev/config.yaml
├── composer.json
└── package.json
```

## Routing

Jede Seite hat zwei Routen: eine deutsche (ohne Präfix) und eine
englische (mit `/en`-Präfix). Namensschema: `app_{locale}_{name}`.

| Route | Name | Beschreibung |
|-------|------|-------------|
| `GET /` | `app_de_homepage` | Startseite (Deutsch) |
| `GET /en` | `app_en_homepage` | Homepage (Englisch) |
| `GET /impressum` | `app_de_imprint` | Impressum |
| `GET /en/imprint` | `app_en_imprint` | Imprint |
| `GET /datenschutz` | `app_de_data_privacy` | Datenschutz |
| `GET /en/privacy-policy` | `app_en_data_privacy` | Privacy Policy |

## Internationalisierung

- **Standardsprache:** Deutsch (kein URL-Präfix)
- **Locale-Erkennung:** `LocaleRedirectListener` prüft auf `/`
  den `Accept-Language`-Header; bei englischem Browser → 302 auf
  `/en`. Ein `locale`-Cookie überschreibt die Erkennung.
- **UI-Strings:** `translations/messages.{de,en}.yaml`, in
  Templates über `{{ 'key'|trans }}`
- **JSON-Inhalte:** Jeder Eintrag hat ein `language`-Feld
  (`de`/`en`), Controller filtert nach Locale
- **Rechtstexte:** Separate Templates pro Sprache; englische
  Versionen enthalten einen Hinweis auf die maßgebliche deutsche
  Fassung

## Inhalte

Die Inhalte der Startseite werden aus JSON-Dateien geladen und über
den Symfony Serializer in Entities deserialisiert:

- `config/content/milestones.json` – Berufliche Meilensteine
- `config/content/projects.json` – Projekte und Arbeiten

Jeder Eintrag enthält ein `language`-Feld als erstes Feld.
Änderungen an Inhalten erfordern keine Code-Änderungen.

## Tailwind-Konfiguration

Die Tailwind-Konfiguration erfolgt über `public/css/input.css`
(Tailwind CSS 4). Eigene Farben und Design-Tokens sind dort als
`@theme`-Block definiert:

- `accent`: #607E4A (Markenfarbe)
- Markenfarben: `brand-marcelkraus`, `brand-krausgebaut`,
  `brand-krausgeborgt`, `brand-krausgedruckt`
- Eigene Schriftfamilie: Aller (Regular, Bold)

Plugin: `@tailwindcss/typography`

## Umgebungsvariablen

| Variable | Beschreibung |
|----------|-------------|
| `APP_ENV` | Umgebung (`dev` / `prod`) |
| `APP_SECRET` | Symfony Secret |
