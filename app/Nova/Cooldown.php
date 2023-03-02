<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Ramsey\Uuid\Uuid;

class Cooldown extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Cooldown>
     */
    public static $model = \App\Models\Cooldown::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'profileId';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            BelongsTo::make('Profile', 'profile', Profile::class),

            Hidden::make('uuid', 'uuid')
                ->default(function ($request) {
                    return Uuid::uuid4();
                }),

            Text::make('Cooldown ID', 'id')
                ->sortable()
                ->required(),

            Number::make('Streak', 'streak')
                ->sortable()
                ->textAlign('left')
                ->required(),

            DateTime::make('Date', 'date')
                ->displayUsing(fn ($value) => $value ? $value->format('D d/m/Y, g:ia') : '')
                ->sortable()
                ->required(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
