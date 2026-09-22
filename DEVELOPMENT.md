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
**Live site:** https://chiquevintique.co.uk (behind a "Coming soon" banner)  
**Deployment pipeline:** LocalWP → git push → GitHub → WP Pusher → live site  
**Brand assets:** `C:\Users\mshie\OneDrive\Documents\Chique Vintique\Website\Images\`

---

## Tech Stack

- WordPress (LocalWP, latest)
- Custom theme — Gutenberg heavy, no Elementor
- WooCommerce (installed, setup wizard completed, no products yet)
- WooCommerce Stripe Payment Gateway (connected — see To Do List)
- Contact Form 7 (installed; form `f1ba732` rendered by `page-contact.php`)
- Git for Windows (installed)
- WP Pusher (installed on live host, connected to GitHub)
- All-in-One WP Migration (used for the initial local → live move)
- Hosting: Guru Reseller cPanel, same as Brand Mark

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
- Current theme version: `2.4.3` — bump `CV_VERSION` in `functions.php` when making CSS changes, or browsers serve the cached stylesheet
- Hero background image path uses relative URL in CSS (`url('assets/hero-bg.jpeg')`) — may need to be updated to absolute URL if issues arise on live site
- The `.home` body class controls homepage-specific header size

---

## Git Workflow

```bash
# Make changes in the theme folder, then:
git remote -v                       # confirm you are in the RIGHT repo
git status                          # check which files actually changed
git add style.css functions.php     # stage files BY NAME, never "git add ."
git commit -m "Description of change"
git push
# WP Pusher picks this up automatically
```

**Stage files by name.** On 2026-09-21 a commit meant for this theme was
made in the unrelated LaneInsights repo, which auto-deploys to Azure, while
the actual theme changes sat uncommitted and were nearly lost. Several
projects are often open at once, so always confirm the remote before
committing, and stop if a commit message doesn't match the staged diff.

**This repo must stay public.** The free WP Pusher tier only deploys from
public repositories. Because it is public, never commit secrets — Stripe
keys and database credentials live in the WP admin and `wp-config.php`,
both outside this folder.

**Continuous integration:** `.github/workflows/lint.yml` runs `php -l` over
every PHP file on each push, so a syntax error shows as a red tick in the
Actions tab. It is a warning only — WP Pusher deploys on GitHub's webhook,
which fires regardless of whether the job passes.

All commits pushed to: https://github.com/mshieldsonline/chiquevintique.git  
Branch: `main`

---

## To Do List

### High priority
- [ ] **Run a Stripe test order** — card `4242 4242 4242 4242`, any future expiry, any 3-digit CVC. The payment path has never been tested end to end; one order exercises the shipping zone, checkout, Stripe and the order emails together.
- [ ] Add products to WooCommerce shop (still empty — nothing to sell or test with)
- [x] Install Contact Form 7 and build Contact page (form `f1ba732`; test that it actually sends on the live host)
- [ ] Update WordPress site tagline in **Settings → General** to "Vintage, Antiques & Curios"
- [ ] Set a static front page: **Settings → Reading → Static page**
- [x] Set up WP navigation menus — Primary (Home, Shop, Blog, Contact) and Footer (Contact, Shop)
- [x] Update PHP to 8.2 on live server

### Medium priority
- [ ] Build About / Our Story page
- [ ] Tidy Blog page layout
- [ ] Flesh out footer content (widgets or hardcoded links)
- [x] Test and style WooCommerce product single page
- [x] Style cart and checkout pages (block-based — see Session 2)

### Hosting & infrastructure
- [ ] Set up automatic WordPress backups on live site (e.g. UpdraftPlus to Google Drive / Dropbox)

### Before going live
- [ ] Update logo file with correct tagline ("Vintage, Antiques & Curios")
- [ ] Verify SSL certificate on live host (Stripe connected without complaint, so likely present — confirm)
- [x] Install WP Pusher on live host and connect to GitHub repo
- [x] Use All-in-One WP Migration for initial launch (local → live)
- [x] Set up payment gateway — WooCommerce Stripe plugin, account `acct_1UI5hdDKQMPD1aLr`
- [x] Configure shipping — UK-only zone, £4.99 flat rate. Rest of World has no method, so non-UK checkout is blocked by design.
- [ ] Turn off the "Coming soon" banner (**WooCommerce → Settings → Site visibility**)

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

### Session 2 — 2026-06-08 ✅ Complete
- Added contact page template and inner page hero styles
- Installed Contact Form 7 and wired the shortcode to form `f1ba732`
- Removed opening hours from the contact page

### Session 3 — 2026-06-13 ✅ Complete
- Restyled shop, single product, cart and checkout pages
- Long iteration on the single product layout, settling on: summary floated
  left at 36%, gallery right at 60%, description tabs clearing beneath
- Grid was tried first and abandoned — WooCommerce's own float rules and
  clear divs fight it, so the theme works *with* the floats instead
- Removed the description/reviews tabs, hid category meta, closed the
  persistent gap between title and description
- Hid empty price/add-to-cart elements via PHP when a product has no price

### Session 4 — 2026-09-21 ✅ Complete
- Connected Stripe via the WooCommerce Stripe plugin (payment, payout,
  webhook and sync all enabled)
- Set up shipping: UK-only zone at £4.99 flat. Rest of World deliberately
  has no method, which blocks non-UK checkout
- Created both navigation menus and assigned them to their theme locations
- Styled the block-based basket and checkout (form inputs, cart items,
  quantity stepper, totals, order summary panel, notices)

### Session 5 — 2026-09-22 ✅ Complete
- Rewrote the first three "Why Chique Vintique" cards. The old copy was
  pitched at heirloom antiques and read as generic filler; the shop sells
  quirky retro items, so the voice is now short, plain and first-person
- The third card changed job entirely — it used to labour the "one of a
  kind" point that the first card already implies, and now tells people
  stock turns over, giving them a reason to come back
- Added `.github/workflows/lint.yml` (PHP syntax check on every push)
- Corrected this file, which had drifted badly out of date: WP Pusher and
  the hosting were still listed as unconfigured, Contact Form 7 as not
  installed, the theme version as 2.1.2, and menus/payment/shipping as
  outstanding when all three were done
