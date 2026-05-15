# HelloNico (Admin + Site) — Joomla 5 “Hello World” Component

A minimal **Joomla 5** component that ships with **Administrator** and **Site** layers.  
It demonstrates **PSR-4 namespaces**, a **DI service provider** (`admin/services/provider.php`), and **MVC** on both sides, plus a **Menu Item Type** exposed via a layout metadata file (`site/tmpl/hello/default.xml`).

- **Component element:** `com_hellonico`  
- **Manifest `<name>`:** `NicolauRoca_Joomla_Admin_and_Frontend_HelloWorld`  
- **Namespace base (manifest):** `Nico\Component\Hellonico`  
- **Default view (Admin/Site):** `hello`  
- **Admin menu:** **Components → Hellonico**  
- **Menu Item Type (frontend):** appears when creating a menu item (keys: `COM_HELLONICO_MENU_HELLO_*`)

---

## Requirements

- Joomla **5.x**  
- PHP **8.1+**  
- Administrator access  
- (Optional) Web server rewrite for SEF URLs

---

## Installation / Update

1. Download the ZIP package (e.g. `com_hellonico.zip`).  
2. In Joomla backend: **System → Extensions → Install** → upload the ZIP.  
3. After install/update, open **Components → Hellonico**.

> The manifest uses `method="upgrade"`, so you can install over an existing version.

---

## Usage

### Administrator (backend)

- Go to **Components → Hellonico** to see the admin “Hello” view.  
- This view demonstrates a minimal MVC flow and layout (`admin/tmpl/hello/default.php`).

### Frontend (site)

1. Create a menu item: **Menus → (your menu) → New → Select**.  
2. Pick the **Hello (frontend)** item type exposed by the component.  
3. Optional: set the **Greeting** parameter (defined in `site/tmpl/hello/default.xml`).  
4. Visit the new menu item URL to see the site “Hello” view.

**Diagnostic (non-SEF URL):**
/index.php?option=com_hellonico&view=hello

---

## Language Files

**Admin `.sys.ini`** → strings used by Joomla admin UI (component name/description, **Menu Item Type** strings shown in the selector, etc.):

administrator/language/en-GB/en-GB.com_hellonico.sys.ini
administrator/language/es-ES/es-ES.com_hellonico.sys.ini

**Site `.ini`** → strings used inside your frontend views/layouts:

language/en-GB/en-GB.com_hellonico.ini
language/es-ES/es-ES.com_hellonico.ini


> Keep your keys aligned with the component element: **`COM_HELLONICO_*`**.

---

## File Layout (package)

    com_hellonico/ — component package root.
    ├─ com_hellonico.xml — manifest: declares name, namespace, install paths, languages, and (optionally) update servers.
    ├─ LICENSE — package license (e.g., GPL); not executed by Joomla.
    ├─ README.md — component notes/guide; informational.
    ├─ admin/ — component backend (Administrator application) code.
    │  ├─ services/ — dependency-injection bootstrap for the extension.
    │  │  └─ provider.php — ServiceProvider: registers dispatcher/MVC/router for the admin side.
    │  ├─ src/ — backend PHP classes (PSR-4).
    │  │  ├─ Extension/ — admin-side extension classes (component entrypoint).
    │  │  │  └─ HellonicoComponent.php — main component class for admin (bootstrap/behaviour).
    │  │  ├─ Controller/ — admin MVC controllers.
    │  │  │  └─ DisplayController.php — default admin controller; routes to the view.
    │  │  └─ View/ — admin MVC views.
    │  │     └─ Hello/
    │  │        └─ HtmlView.php — admin HTML view; prepares data/params for the layout.
    │  ├─ language/ — administrator language files (loaded in backend).
    │  │  ├─ en-GB/ — English (admin).
    │  │  │  ├─ en-GB.com_hellonico.ini — strings used inside admin screens.
    │  │  │  └─ en-GB.com_hellonico.sys.ini — admin “system” strings (component name/desc in manager, menus, etc.).
    │  │  └─ es-ES/ — Spanish (admin).
    │  │     ├─ es-ES.com_hellonico.ini — admin internal strings in Spanish.
    │  │     └─ es-ES.com_hellonico.sys.ini — admin system strings in Spanish.
    │  └─ tmpl/ — admin templates (layouts).
    │     └─ hello/
    │        └─ default.php — HTML layout for the Hello admin view.
    └─ site/ — component frontend (Site application) code.
       ├─ language/ — site language files (loaded in frontend and by the menu item type selector).
       │  ├─ en-GB/ — English (site).
       │  │  ├─ en-GB.com_hellonico.ini — strings used inside frontend views.
       │  │  └─ en-GB.com_hellonico.sys.ini — **menu item type strings** (title/description shown in selector).
       │  └─ es-ES/ — Spanish (site).
       │     ├─ es-ES.com_hellonico.ini — frontend internal strings in Spanish.
       │     └─ es-ES.com_hellonico.sys.ini — **menu item type strings** in Spanish.
       ├─ src/ — frontend PHP classes (PSR-4).
       │  ├─ Controller/ — site MVC controllers.
       │  │  └─ DisplayController.php — default site controller; loads the “hello” view.
       │  └─ View/ — site MVC views.
       │     └─ Hello/
       │        └─ HtmlView.php — site HTML view; reads menu item params and exposes them to the layout.
       └─ tmpl/ — frontend templates (layouts).
          └─ hello/
             ├─ default.php — HTML layout rendered on the frontend.
             └─ default.xml — **layout metadata**: exposes the **menu item type** and defines its fields.


---

## Troubleshooting

- **“Invalid controller class: display”**  
  Ensure the site controller namespace is `Nico\Component\Hellonico\Site\Controller\DisplayController`.  
  Namespace mismatches break autoloading.

- **Menu Item Type shows `COM_…` instead of text**  
  Check **admin `.sys.ini`** files and key prefix (`COM_HELLONICO_*`).  
  Clear Joomla cache (and language debug if needed).

- **404 only with SEF URL**  
  Verify `.htaccess` rewrite/SEF settings or implement a custom Router if you need custom paths.  
  Test with the non-SEF URL first.

---

## License

GPL-2.0-or-later — see `LICENSE`.

## Author

**Nicolau Roca** — https://nicolauroca.dev