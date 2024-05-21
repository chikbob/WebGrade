<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\Text;
use Illuminate\Database\Eloquent\Model;
use App\Models\Site;

use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Site>
 */
class SiteResource extends ModelResource
{
    protected string $model = Site::class;

    protected string $title = 'Sites';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Name', 'name'),
                Text::make('Url', 'url'),
            ]),
        ];
    }

    /**
     * @param Site $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
