---
name: Koota Service Professional System
colors:
  surface: '#fcf9f8'
  surface-dim: '#dcd9d9'
  surface-bright: '#fcf9f8'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f6f3f2'
  surface-container: '#f0edec'
  surface-container-high: '#eae7e7'
  surface-container-highest: '#e5e2e1'
  on-surface: '#1c1b1b'
  on-surface-variant: '#5b403c'
  inverse-surface: '#313030'
  inverse-on-surface: '#f3f0ef'
  outline: '#906f6b'
  outline-variant: '#e4beb8'
  surface-tint: '#ba1a15'
  primary: '#820003'
  on-primary: '#ffffff'
  primary-container: '#ac0c0c'
  on-primary-container: '#ffb9af'
  inverse-primary: '#ffb4a9'
  secondary: '#006e25'
  on-secondary: '#ffffff'
  secondary-container: '#80f98b'
  on-secondary-container: '#007327'
  tertiary: '#830003'
  on-tertiary: '#ffffff'
  tertiary-container: '#a61e17'
  on-tertiary-container: '#ffb9af'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#ffdad5'
  primary-fixed-dim: '#ffb4a9'
  on-primary-fixed: '#410001'
  on-primary-fixed-variant: '#930004'
  secondary-fixed: '#83fc8e'
  secondary-fixed-dim: '#66df75'
  on-secondary-fixed: '#002106'
  on-secondary-fixed-variant: '#00531a'
  tertiary-fixed: '#ffdad5'
  tertiary-fixed-dim: '#ffb4a9'
  on-tertiary-fixed: '#410001'
  on-tertiary-fixed-variant: '#910a09'
  background: '#fcf9f8'
  on-background: '#1c1b1b'
  surface-variant: '#e5e2e1'
typography:
  h1-desktop:
    fontFamily: Inter
    fontSize: 64px
    fontWeight: '700'
    lineHeight: '1.1'
    letterSpacing: -0.02em
  h1-mobile:
    fontFamily: Inter
    fontSize: 40px
    fontWeight: '700'
    lineHeight: '1.2'
    letterSpacing: -0.01em
  h2:
    fontFamily: Inter
    fontSize: 40px
    fontWeight: '600'
    lineHeight: '1.2'
    letterSpacing: -0.01em
  h3:
    fontFamily: Inter
    fontSize: 24px
    fontWeight: '600'
    lineHeight: '1.3'
  body-lg:
    fontFamily: Inter
    fontSize: 18px
    fontWeight: '400'
    lineHeight: '1.6'
  body-md:
    fontFamily: Inter
    fontSize: 16px
    fontWeight: '400'
    lineHeight: '1.6'
  label-sm:
    fontFamily: Inter
    fontSize: 14px
    fontWeight: '500'
    lineHeight: '1.4'
    letterSpacing: 0.01em
  caption:
    fontFamily: Inter
    fontSize: 13px
    fontWeight: '400'
    lineHeight: '1.4'
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  container-max: 1280px
  gutter: 24px
  margin-mobile: 16px
  section-padding-desktop: 120px
  stack-sm: 8px
  stack-md: 16px
  stack-lg: 32px
---

## Brand & Style

The design system is engineered for a premium, multi-service corporate identity. It balances the urgency of service maintenance with the stability of institutional management. The aesthetic is **Corporate Modern**, characterized by precise alignment, generous whitespace, and a high-contrast palette that signals authority and reliability.

The target audience ranges from residential homeowners to industrial facility managers. The UI must evoke an immediate sense of trust, efficiency, and environmental responsibility. Key visual drivers include:
- **Clarity of Information:** High-density data handled through clear hierarchy.
- **Service Distinction:** Using color as a subtle signifier between repair (red) and sustainability (green) services.
- **Institutional Weight:** Utilizing thick, purposeful strokes and stable typography to ground the brand.

## Colors

The palette is anchored by **Primary Red (#AC0C0C)**, used for critical actions, brand headers, and primary service categories (Cleaning, Repair, Handyman). **Secondary Green (#28A745)** is reserved specifically for sustainability-focused services like Waste Management and IPAL, and for success states.

- **Neutrality:** The background uses a very cool, slight-blue white (#F7F8FF) to maintain a sterile, clean professional feel, contrasting against the warmth of the brand red.
- **Text Hierarchy:** Primary text (#161616) ensures WCAG AAA compliance for readability. Secondary text (#555555) is used for meta-data and descriptions to reduce visual noise.

## Typography

The design system utilizes **Inter** exclusively to leverage its systematic, utilitarian nature. The scale is built on a high-contrast ratio to differentiate between large marketing headlines and dense service information.

- **Headlines:** Set with tight letter-spacing (-0.01em to -0.02em) to create a compact, "heavy" corporate feel.
- **Body Text:** Uses a generous 1.6 line-height to ensure readability during long descriptions of technical services or IPAL processes.
- **Service Labels:** All-caps should be avoided except for very small overlines or category badges to maintain an approachable tone.

## Layout & Spacing

The system follows a **Fixed Grid** model for desktop, centered with a maximum width of 1280px. This ensures that content remains readable and professional on ultra-wide monitors.

- **Grid:** A 12-column grid is used for desktop (80px columns, 24px gutters).
- **Responsive Behavior:** 
  - **Desktop (1024px+):** 12 columns, 120px section vertical padding.
  - **Tablet (768px - 1023px):** 6 columns, 80px section vertical padding, 32px side margins.
  - **Mobile (<768px):** 2 columns, 48px section vertical padding, 16px side margins.
- **Rhythm:** All spacing (padding, margins) should be multiples of 8px to maintain a strict mathematical harmony.

## Elevation & Depth

This design system uses **Tonal Layers** combined with **Ambient Shadows** to create a sense of organized structure. 

- **Level 0 (Base):** #F7F8FF (Background).
- **Level 1 (Cards):** White (#FFFFFF) with a very soft, diffused shadow (0px 4px 20px rgba(0, 0, 0, 0.04)).
- **Level 2 (Hover/Active):** White (#FFFFFF) with a more pronounced shadow (0px 12px 30px rgba(0, 0, 0, 0.08)).
- **Interactions:** Elevation is used to denote interactivity. When a service card is hovered, it should subtly lift (Y-axis -4px) to signal to the user it is clickable. 
- **Outlines:** Low-contrast borders (#E6E6E6) are used for form inputs and structural separators where shadow-based depth is not required.

## Shapes

The shape language is **Rounded (Level 2)**, conveying a friendly yet professional demeanor.

- **Standard Elements:** Buttons, inputs, and small cards use a 0.5rem (8px) radius.
- **Large Components:** Hero images and large service containers use a 1rem (16px) radius.
- **Interactive Indicators:** Small UI elements like "Checkboxes" or "Pills" maintain a 4px (Soft) radius to differentiate from larger structural containers.
- **Icons:** Should be housed in circular or softly rounded square containers to match the overall UI geometry.

## Components

### Header & Navigation
- **Mega-Menu:** Full-width dropdown. Columns are split by service category (e.g., "Facility Care", "Sustainability", "Emergency"). Icons (24px) should precede each service name.
- **CTA:** The "Get a Quote" button in the header must use the Primary Red background with white text.

### Buttons & Chips
- **Primary Button:** Primary Red background, White text, 8px radius, height 48px or 56px for main CTAs.
- **Sustainability Chip:** Secondary Green background, 12px font size, used to tag waste management or IPAL services.

### Service Cards
- **Structure:** Image (top, 16:9 ratio), followed by a 24px padding area containing an icon (colored by category), H3 Title, short description, and a text-link "Learn More" with a trailing arrow (→).
- **State:** On hover, the border-bottom should change to Primary Red (2px height).

### Multi-step Consultation Form
- **Progress Bar:** A thin horizontal track at the top. Completed steps in Primary Red, active step with a pulse effect.
- **Inputs:** 1px border (#E6E6E6), turns Primary Red on focus. Labels are always visible above the field in 14px Medium weight.

### FAQ Accordion
- **Style:** Clean, flush-to-edge design with a 1px bottom border.
- **Trigger:** A chevron icon that rotates 180 degrees on expansion. Active state expands with a smooth height transition.

### Floating WhatsApp Button
- **Placement:** Bottom-right, 24px from edges.
- **Design:** Circular, 60px diameter, using the official WhatsApp green (#25D366) with a white icon and a subtle notification badge if needed.