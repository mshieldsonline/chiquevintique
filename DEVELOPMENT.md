# Chique Vintique — Development Log

## How to use this file
If starting a new Claude Code session, paste this file in at the start and say:
> "I'm continuing work on the Chique Vintique WordPress site. Here is the development log."

---

## Project Overview

**Site:** Chique Vintique — Vintage, Antiques & Curios shop  
**Type:** WordPress with WooCommerce  
**Local dev:** LocalWP → `C:\Users\mshie\Local Sites\chiquevintique\app\public\`  
**Theme folder:** `wp-content/themes/chique-vintique/`  
**GitHub repo:** https://github.com/mshieldsonline/chiquevintique.git  
**Deployment pipeline:** LocalWP → git push → GitHub → WP Pusher → live site (not yet configured)  
**Brand assets:** `C:\Users\mshie\OneDrive\Documents\Chique Vintique\Website\Images\`

---

## Tech Stack

- WordPress (LocalWP, latest)
- Custom theme — Gutenberg heavy, no Elementor
- WooCommerce (installed, setup wizard completed, no products yet)
- Contact Form 7 (not yet installed)
- Git for Windows (installed)
- WP Pusher (not yet installed on live host)
- Hosting: to be confirmed (same Guru Reseller cPanel as Brand Mark)

---

## Design Decisions

### Colour Palette
All colours defined as CSS custom properties in `style.css`:

| Token | Hex | Use |
|---|---|---|
| `--cv-cream` | `#f0efed` | Page background |
| `--cv-blush` | `#e3e1de` | Section backgrounds |
| `--cv-dusty-rose` | `#6e6b68` | Eyebrow text, accents |
| `--cv-sage` | `#9a9696` | Mid grey |
| `--cv-warm-brown` | `#3d3b3b` | Header background, headings |
| `--cv-charcoal` | `#2a2420` | Body text |
| `--cv-gold` | `#8a8480` | Subtle accents |
| `--cv-white` | `#ffffff` | White |

Derived from: logo (dark charcoal badge, white text) and sepia-toned product photos.  
**No pink/warm tones** — user specifically rejected these.

### Typography
- Headings: Playfair Display (Google Fonts)
- Body: Lato (Google Fonts)

### Logo
- `assets/logo.png` — dark grey background version
- `assets/logo-white.png` — transparent white outline version (used in header + footer)
- Header uses white logo on dark charcoal header
- Footer uses white logo on dark charcoal footer
- **Note:** Logo still says "Vintage & Antiques" — user will update the logo file separately

### Header Behaviour
- `position: fixed` (not sticky — prevents scroll jitter)
- Body padding set dynamically via JS to compensate
- Homepage: logo starts at **195px**, shrinks to **80px** on scroll
- Inner pages: logo starts at **120px**, shrinks to **80px** on scroll
- Nav font: starts at **1.35rem**, shrinks to **0.95rem** on scroll
- Scroll threshold: shrinks at 80px, restores below 80px
- Hysteresis handled; jitter-free

---

## File Structure

```
chique-vintique/
├── style.css               — All CSS, design tokens, layout, components
├── functions.php           — Theme setup, enqueue, WooCommerce hooks, inline CSS
├── index.php               — Blog listing
├── front-page.php          — Homepage (hero, products, quote, why us, blog)
├── single.php              — Single blog post
├── page.php                — Standard WP page
├── archive.php             — Category/tag archives
├── search.php              — Search results
├── 404.php                 — Not found
├── header.php              — Fixed header, logo, nav, cart
├── footer.php              — 4-column footer
├── inc/
│   ├── template-tags.php   — Pagination helper
│   └── nav-walker.php      — Clean nav HTML
├── template-parts/
│   └── card-post.php       — Blog post card
├── woocommerce/
│   └── archive-product.php — Shop page layout
├── assets/
│   ├── logo.png            — Grey background logo
│   ├── logo-white.png      — White transparent logo
│   ├── hero-bg.jpeg        — Homepage hero background (Singer sewing machine photo)
│   ├── css/
│   │   └── editor.css      — Gutenberg editor styles
│   └── js/
│       └── main.js         — Mobile nav + scroll shrink behaviour
└── DEVELOPMENT.md          — This file
```

---

## Homepage Sections (front-page.php)

1. **Hero** — background image (`hero-bg.jpeg`), white logo centred, dark overlay, tagline, two CTA buttons
2. **New Arrivals** — WooCommerce latest 4 products grid (shows placeholder when empty)
3. **Quote band** — dark charcoal band with italic brand quote
4. **Why Us** — 4 feature pillars on blush background
5. **From the Blog** — latest 3 posts grid

---

## Known Issues / Notes

- CSS cache on LocalWP can be stubborn — logo sizing uses `wp_add_inline_style()` with `!important` to bypass file cache
- Current theme version: `2.1.2` — bump `CV_VERSION` in `functions.php` when making CSS changes
- Hero background image path uses relative URL in CSS (`url('assets/hero-bg.jpeg')`) — may need to be updated to absolute URL if issues arise on live site
- The `.home` body class controls homepage-specific header size

---

## Git Workflow

```bash
# Make changes in theme folder, then:
git add .
git commit -m "Description of change"
git push
# WP Pusher (once installed on live site) picks this up automatically
```

All commits pushed to: https://github.com/mshieldsonline/chiquevintique.git  
Branch: `main`

---

## To Do List

### High priority
- [ ] Install Contact Form 7 and build Contact page
- [ ] Add products to WooCommerce shop
- [ ] Set up WP navigation menus (currently using fallback links)
- [ ] Update WordPress site tagline in **Settings → General** to "Vintage, Antiques & Curios"
- [ ] Set a static front page: **Settings → Reading → Static page**

### Medium priority
- [ ] Build About / Our Story page
- [ ] Tidy Blog page layout
- [ ] Flesh out footer content (widgets or hardcoded links)
- [ ] Test and style WooCommerce product single page
- [ ] Test cart and checkout pages

### Before going live
- [ ] Update logo file with correct tagline ("Vintage, Antiques & Curios")
- [ ] Install WP Pusher on live host and connect to GitHub repo
- [ ] Use All-in-One WP Migration for initial launch (local → live)
- [ ] Set up payment gateway in WooCommerce (Stripe or PayPal)
- [ ] Configure shipping options
- [ ] SSL certificate on live host

### Nice to have
- [ ] Add more product photos to hero rotation or gallery section
- [ ] Mobile menu styling (currently functional but unstyled)
- [ ] Breadcrumb styling on inner pages
- [ ] WooCommerce email template styling

---

## Session History

### Session 1 — 2026-06-06 ✅ Complete
- Built full custom theme from scratch (17 files)
- Set up Git repo locally and connected to GitHub
- Installed WooCommerce
- Activated theme
- Iterated on colour palette — removed all pink/warm tones, switched to charcoal/grey/cream from logo
- Added white logo to header and footer
- Implemented animated shrinking header on scroll (fixed position, JS-controlled)
- Reduced hero section height
- Made inner page headers consistent with homepage (smaller default, same scroll behaviour)
- Added hero background image (Singer sewing machine photo)
- Added dark overlay and frosted panel behind logo for contrast
- Fixed logo jitter (reflow loop) by switching to `position: fixed`
- Updated tagline throughout to "Vintage, Antiques & Curios"
