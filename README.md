### Description
This starter kit jumpstarts your **Laravel 12** application using **Livewire 3** for reactive components and **daisyUI 5** (Tailwind CSS component library) for fast, consistent UI styling. It’s fully responsive out of the box, easily themeable, and purposely simplified: **Flux has been removed** to reduce overhead and keep the stack familiar. Ideal for SaaS dashboards, internal tools, and MVPs where you want clean structure, rapid iteration, and easy customization.


### Key Features
* **Laravel + Livewire Core** – Server-driven reactive components without a heavy SPA framework.
* **daisyUI v5 Integration** – Pre‑built Tailwind components + theme system (switch or extend themes quickly).
* **No Flux Layer** – Reduced complexity; easier onboarding for any Laravel dev.
* **Fully Responsive Layout** – Mobile-first navigation, adaptive panels, fluid typography.
* **Authentication Ready** – Prewired auth & password reset flows.
* **Production Friendly** – Ready for deployment.


### Getting Started
**Clone:**
```bash
git clone https://github.com/max-bri/livewire-daisyui-starter-kit.git
cd livewire-daisyui-starter-kit
```
**Install:**
```bash
cp .env.example .env
composer install
php artisan key:generate
npm install
```
**Build:**
```bash
npm run dev   # or npm run build for production
php artisan migrate --seed
```
**Run:**
```bash
php artisan serve
```
**Example output:**
```bash
INFO  Server running on [http://127.0.0.1:8000].
Press Ctrl+C to stop the server
```


### Customize Themes and browse pre-mande components
Visit official [daisyUI Theme Generator](https://daisyui.com/theme-generator)
Generate a new / modify existing theme and add the css to the bottom of the file:
```bash
resources/css/app.css
```
Also be sure to check out [All daisyUI components](https://daisyui.com/components)

All are free under MIT license.

[Official daisyUI Github Repository](https://github.com/saadeghi/daisyui)


### Check official documantation and guides:
[Laravel Docs](https://laravel.com/docs)

[Laravel Livewire Docs](https://livewire.laravel.com/docs)

[Laracast](https://laracasts.com/)


---


### License

MIT – use freely for personal & commercial projects.


