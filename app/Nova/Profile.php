<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Color;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Profile extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Profile>
     */
    public static $model = \App\Models\Profile::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    public function subtitle()
    {
        return "Profile Owner: {$this->user->name} ({$this->user->id})";
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'userId', 'name', 'balance', 'xp',
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
            Text::make('Emoji', 'emoji')
                ->required(),

            Text::make('Profile Name', 'name')
                ->required(),

            ID::make('Profile ID', 'id')->sortable(),

            Color::make('Color', 'color')
                ->required(),

//            Text::make('Balance', 'balance')
//                ->sortable(),

            Number::make('Balance', 'balance')
                ->sortable(),

            Number::make('XP', 'xp')
                ->sortable(),

//            Number::make('XP', 'xp', function () {
//                return !is_null($this->xp) ? number_format($this->xp, 0, '.', ',') : 0;
//            })
//                ->sortable(),
//        Number::make('XP', 'xp', function () {
//                return !is_null($this->xp) ? number_format($this->xp, 0, '.', ',') : 0;
//            })
//                ->sortable(),

            Text::make('Prestige', 'prestige')
                ->required(),

            BelongsTo::make('User', 'user', User::class),
            HasMany::make('Fish Inventory', 'fish', FishInventory::class),
            HasMany::make('Item Inventory', 'items', ItemInventory::class),
            HasMany::make('Stats', 'stats'),
            HasMany::make('Cooldowns', 'cooldowns'),

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
