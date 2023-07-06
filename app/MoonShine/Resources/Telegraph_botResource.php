<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Telegraph_bot;

use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\created_at;
use MoonShine\Actions\FiltersAction;

class Telegraph_botResource extends Resource
{
	public static string $model = Telegraph_bot::class;

	public static string $title = 'Телеграмм боты';

	public function fields(): array
	{
		return [
		    ID::make()->sortable(),
            Text::make('Имя', 'name')->required(),
            Text::make('Дата регистрации', 'created_at')->required()
        ];
	}

	public function rules(Model $item): array
	{
	    return [
            'name'=>['required'],
            'created_at'=>['required']  
        ];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
