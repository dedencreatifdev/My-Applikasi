# Catatan Proyek — My-Aplikasi

Dokumentasi singkat berisi catatan pengembangan, setup lokal, dan hal penting lainnya untuk tim.

## 🎯 Tujuan
- Menyediakan catatan cepat untuk pengembang baru dan referensi.

## 📂 Struktur Penting
- `app/Models/User.php` — Model User
- `app/Models/Usergrup.php` — Model Grup Pengguna
- `app/Models/Usergruppermission.php` — Permission untuk grup
- `app/Filament/Resources/` — Resource Filament (admin)
- `database/migrations/` — File migrasi

## ⚙️ Setup Lokal
Prasyarat: PHP, Composer, Node, npm/yarn, Laragon (Windows)

Perintah umum:

```bash
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install
npm run dev
```

> Catatan: Sesuaikan variabel di `.env` (DB, mail, app URL) sebelum menjalankan migrasi.

## 🗄️ Database & Migrasi
- Migrations ada di `database/migrations/` (periksa tanggal file untuk urutan).
- Jika ada error migrasi, cek `DB_CONNECTION` dan kredensial di `.env`.

## ✅ Testing
Jalankan test suite:

```bash
php artisan test
```

## 🧭 Filament Admin
- Resource Filament berada di `app/Filament/Resources/`.
- Policy terkait ada di `app/Policies/` (mis. `UserPolicy.php`, `UsergrupPolicy.php`).

## 🛠️ Debugging Cepat
- Bersihkan cache config: `php artisan config:cache`
- Clear route/view cache: `php artisan route:clear && php artisan view:clear`
- Jika error pada seeder, cek factory terkait di `database/factories/`.

## 📋 TODO
- [ ] Dokumentasi endpoint API (jika ada)
- [ ] Tambah unit test untuk model utama
- [ ] Periksa validasi di Form Filament

## 📞 Kontak
- Developer: (tambahkan nama & kontak di sini)

## 🎨 Filament: Theme CSS
Berikut adalah isi `resources/css/filament/admin/theme.css` (relevan untuk kustomisasi UI admin):

```css
@import "../../../../vendor/filament/filament/resources/css/theme.css";

/* @source '../../../../app/Filament*'; */
/* @source '../../../../resources/views/filament*'; */
/* @source '../../../../app/Providers/Filament*'; */

/* @source '../../../../resources/views/components*'; */
/* @source '../../../../resources/views/livewire*'; */
/* @source '../../../../app/Livewire*'; */

@theme {
    --font-sans:
        "Instrument Sans", ui-sans-serif, system-ui, sans-serif,
        "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol",
        "Noto Color Emoji";
}

* {
    font-size: 13px;
    button,
    button > span {
        font-size: 12px;
    }
    .fi-btn {
        font-size: 12px;
    }
    .fi-sidebar {
        @apply bg-white dark:bg-gray-950 border-r border-gray-200 dark:border-gray-800;
    }

    .fi-topbar {
        @apply bg-primary-600 dark:bg-gray-950;
        .fi-logo {
            color: white;
            font-size: 18px;
        }
    }

    .fi-header-heading {
        font-size: 18px;
    }

    .fi-page-header-main-ctn {
        row-gap: calc(var(--spacing) * 3);
        padding-block: calc(var(--spacing) * 3);
    }

    /* MENU */
    .fi-topbar-item {
        a span{
            color: white;
        }
        .fi-icon{
            color: white;
        }
        .fi-topbar-item-label{
            color: white;
        }
    }
    .fi-topbar-item:hover {
        a span{
            color: var(--primary-600);
        }
        .fi-icon{
            color: var(--primary-600);
        }
        .fi-topbar-item-label{
            color: var(--primary-600);
        }
    }
    .fi-topbar-item.fi-active {
         a span{
             color: var(--primary-600);
            font-weight: normal;
            font-size: small;
         }
        .fi-icon{
            color: var(--primary-600);
        }
        .fi-topbar-item-label{
            color: var(--primary-600);
        }
    }

    /* TABLE */
    .fi-ta-ctn {
        border-radius: 0;
        thead tr {
            border-bottom: 2px solid var(--primary-600);
        }
        .fi-badge-label {
            font-size: 11px;
        }
        .fi-ta-header-cell {
            padding: 8px 12px;
        }
        .fi-ta-cell {
            padding: 1px 6px;
        }
        .fi-ta-actions {
            padding: 4px 4px;
        }
        .fi-ta-text {
            padding: 8px 12px;
        }
        .fi-ta-record-checkbox {
            padding: 4px 4px;
        }
    }
}
```

---

Tanggal dibuat: 2026-02-03
