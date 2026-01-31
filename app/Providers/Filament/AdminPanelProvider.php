<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Width;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Navigation\NavigationGroup;
use Filament\Support\Icons\Heroicon;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('')
            ->login()
            ->colors([
                'primary' => Color::Orange, //Color::Indigo,
                'success' => Color::Emerald, // Emerald
                'info' => Color::Blue, //Blue
                'danger' => Color::Rose, //Rose
                'warning' => Color::Orange, //Orange
                'gray' => Color::Gray, //Gray
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->spa()
            ->font('Poppins')
            ->maxContentWidth(Width::Full)
            // ->sidebarCollapsibleOnDesktop()
            ->sidebarFullyCollapsibleOnDesktop()
            ->sidebarWidth('17rem')
            //
            // ->topNavigation()

            ->navigationGroups([
                NavigationGroup::make()
                    ->label('User Management')
                    ->icon(Heroicon::OutlinedUsers),
                NavigationGroup::make()
                    ->label('Blog')
                    ->icon(Heroicon::OutlinedPencil),
                NavigationGroup::make()
                    ->label(fn(): string => __('navigation.settings'))
                    ->icon(Heroicon::OutlinedCog6Tooth)
                    ->collapsed(),
            ])
        ;
    }
}
