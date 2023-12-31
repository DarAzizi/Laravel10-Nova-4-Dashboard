<?php

namespace App\Nova;

use Faker\Provider\Text;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Http\Requests\NovaRequest;

class Product extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Product>
     */
    public static $model = \App\Models\Product::class;

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
        'id', 'name','description','sku'
    ];
    public static $tableStyle='tight';
    public static $clickAction='edit';
    public static $perPageOptions=[10,50,100];
    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Slug::make('Slug')
                ->from('name')
                ->required()
                ->hideFromIndex()
                ->textAlign('left')
                ->withMeta(['extraAttributes'=>[
                    'readonly'=> true
                ]]),

            \Laravel\Nova\Fields\Text::make('Name')
                ->required()
                ->showOnPreview()
                ->placeholder('Product Name...')
                ->textAlign('left')
                ->sortable(),

            \Laravel\Nova\Fields\Markdown::make('Description')
                ->required()
                ->showOnPreview(),
            Currency::make('Price')->required()
                ->currency('TND')
                ->showOnPreview()
                ->placeholder('Product Price...')
                ->textAlign('left')
                ->sortable(),

            \Laravel\Nova\Fields\Text::make('SKU')
                ->required()
                ->showOnPreview()
                ->placeholder('Product SKU...')
                ->textAlign('left')
                ->help('Number for traking your Product')
                ->sortable(),

            Number::make('Quantity')
                ->required()
                ->showOnPreview()
                ->placeholder('Product Quantity...')
                ->textAlign('center')
                ->sortable(),

            BelongsTo::make('Brand')
                ->required()
                ->showOnPreview(),

            Boolean::make('Status','is_published')
                ->required()
                ->showOnPreview()
                ->sortable(),


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
