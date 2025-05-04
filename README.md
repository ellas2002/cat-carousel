# 🐾 Cat (or Dog) API Carousel Viewer

This project demonstrates how to integrate **PHP**, **Bootstrap**, and a third-party API (Cat or Dog API) to build a responsive carousel-based image viewer with dynamic content.

Users can select a cat (or dog) breed from a dropdown, view a gallery of images via a Bootstrap carousel, and read breed-specific information and ratings — all fetched dynamically from the API.

---

## 🎯 Main Objectives

- Use **PHP** to generate dynamic HTML content.
- Connect to the **Cat API** (or Dog API) as a remote data source.
- Use **HTML forms and GET variables** to drive user interaction.
- Display results using the **Bootstrap Grid and Carousel** components.
- Keep PHP modular with reusable functions.
- Include star-based ratings using **Font Awesome** icons.

---

## 🧱 File Overview

### `index.php`
- Includes `src/functions.php` at the top.
- Displays a **Bootstrap form** with:
  - A `select` dropdown populated by breed data from the Cat API.
  - A submit button (`GET` method) pointing to `carousel.php`.
- Layout uses the **Bootstrap grid system** to align form elements side-by-side.

### `carousel.php`
- Also includes `src/functions.php`.
- Receives the selected `breed_id` via `$_GET`.
- Fetches:
  - 10 images of the breed from the API.
  - Descriptive information about the breed.
- Displays:
  - A **Bootstrap carousel** with indicators and controls.
  - A **descriptive section** with:
    - Breed name
    - Origin
    - Temperament
    - Description
    - 4 starred traits using **Font Awesome**

The carousel and details should appear **side-by-side on larger screens**, and **stack vertically on smaller screens** using responsive grid layout.

### `src/functions.php`
- Contains all reusable **PHP functions** for:
  - API requests
  - HTML rendering (e.g., breed dropdown, carousel slides, star ratings)
- Included in both `index.php` and `carousel.php`.

### `config/config.php`
- Stores your API key as a PHP constant:
  ```php
  define("API_KEY", "your-api-key-here");

