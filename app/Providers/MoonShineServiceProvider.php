<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Resources\ReviewResource;
use App\MoonShine\Resources\SiteResource;
use App\MoonShine\Resources\UserResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuItem::make(
                static fn() => __('Админы'),
                new MoonShineUserResource(),
                'heroicons.user'
            ),
            MenuItem::make(
                static fn() => __('Роли'),
                new MoonShineUserRoleResource(),
                'heroicons.bookmark'
            ),
            MenuItem::make(
                static fn() => __('Пользователи'),
                new UserResource(),
                'heroicons.user-group'
            ),
            MenuItem::make(
                static fn() => __('Страницы'),
                new SiteResource(),
                'heroicons.command-line'
            ),

            MenuItem::make(
                static fn() => __('Отзывы'),
                new ReviewResource(),
                'heroicons.chat-bubble-bottom-center-text'
            ),
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
