<?php

namespace App\Nova;

use Laravel\Nova\Fields\Avatar;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\User>
     */
    public static $model = \App\Models\User::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'rank',
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
            Avatar::make('Avatar')
                ->thumbnail(fn()=>$this->avatar)
                ->preview(fn()=>$this->avatar)
                ->textAlign('left')
                ->disableDownload(),

            Text::make('Name')
                ->sortable()
                ->required(),

            ID::make('ID', 'id')
                ->placeholder('Users Discord ID')
                ->required(),

            Text::make('Active Profile', 'activeProfile'),

            Select::make('Rank', 'rank')
                ->options([
                    'USER', 'VIP', 'ADMIN'
                ])
                ->hideFromIndex()
                ->hideFromDetail()
                ->required(),

            Badge::make('Rank', 'rank')
                ->map([
                    'USER' => 'info',
                    'VIP' => 'success',
                    'ADMIN' => 'warning',
                ])
                ->sortable()
                ->required(),

            DateTime::make('Updated At', 'updatedAt')
                ->displayUsing(fn ($value) => $value ? $value->format('D d/m/Y, g:ia') : '')
                ->hideFromIndex()
                ->sortable(),

            DateTime::make('Created At', 'createdAt')
                ->displayUsing(fn ($value) => $value ? $value->format('D d/m/Y, g:ia') : '')
                ->sortable(),

            HasMany::make('Profiles', 'profiles' )

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
