<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use MoonShine\Resources\Resource;
//поля
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\email;
use MoonShine\Fields\password;
use MoonShine\Fields\mess;
use MoonShine\Actions\FiltersAction;


class UserResource extends Resource
{
	public static string $model = User::class;

	public static string $title = 'Пользователи';

	public function fields(): array
	{
		return [
		    ID::make()->sortable(),
            Text::make('Имя', 'name')->required(),
            Email::make('E-mail', 'email')->required(),
            Password::make('Пароль', 'password')->required(),
            Text::make('Сообщение', 'mess')->required(),
        ];
	}

	public function rules(Model $item): array
	{
	    return [
            'name'=>['required'],
            'email'=>['required'],
            'password'=>['sometimes']
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
