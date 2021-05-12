<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Tests\stubs;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Resource;

class TestResource extends Resource
{
    public static string $model = TestModel::class;
    public static $title = 'title';

    /**
     * @var string[]
     */
    public static $search = [
        'id',
        'title',
    ];

    /**
     * @param Request $request
     * @return Field[]
     */
    public function fields(Request $request): array
    {
        return [
            ID::make(),
            Text::make('Title')->required(),
        ];
    }
}
