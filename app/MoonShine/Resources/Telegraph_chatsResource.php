<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Telegraph_chats;

use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Actions\FiltersAction;



class Telegraph_chatsResource extends Resource
{
	public static string $model = Telegraph_chats::class;

	public static string $title = 'Обращения';

	public function fields(): array
	{
		return [
            ID::make()->sortable(),
            Text::make('Имя пользователя', 'name')->required(),
            Text::make('Дата регистрации', 'created_at')->required(),
            Text::make('Сообщения', 'chat_id')->sortable(),


            
            // Text::make('Имя', 'name')->required(),
            // Email::make('E-mail', 'email')->required(),
            // Password::make('Пароль', 'password')->required(),
            // Text::make('Сообщение', 'mess')->required(),
        ];
	}

	public function rules(Model $item): array
	{
	    return [
             'chat_id'=>['required'],
             'name'=>['required'],
            // 'email'=>['required'],
            // 'password'=>['sometimes']
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
