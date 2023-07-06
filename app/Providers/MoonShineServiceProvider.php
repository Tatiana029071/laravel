<?php

namespace App\Providers;





// use App\MoonShine\Resources\PostResource; 
 
// class MoonShineServiceProvider extends ServiceProvider
// {
//     //...
 
//     public function boot()
//     {
//         app(MoonShine::class)->resources([
//             new PostResource(),
//         ])  
//     }
 

 
// class MoonShineServiceProvider extends ServiceProvider
// {
//     //...
 
//     public function boot()
//     {
//         app(MoonShine::class)->resources([
//             new PostResource(),
//         ])  
//     }


use Illuminate\Support\ServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use App\MoonShine\Resources\PostResource; //new
use App\MoonShine\Resources\UserResource; //new
// use App\MoonShine\Resources\BotResource; //new
use App\MoonShine\Resources\Telegraph_chatsResource; //new
use App\MoonShine\Resources\Telegraph_botResource;



class MoonShineServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        app(MoonShine::class)->menu([
            MenuGroup::make('moonshine::ui.resource.system', [
                MenuItem::make('moonshine::ui.resource.admins_title', new MoonShineUserResource())
                    ->translatable()
                    ->icon('users'),
                    // MenuItem::make('Обращения', new PostResource()), 
                    MenuItem::make('Пользователи', new UserResource()),
                    // MenuItem::make('Пользователи бота', new BotResource()),
                     MenuItem::make('Пользователи бота', new Telegraph_chatsResource()),
                     MenuItem::make('Боты', new Telegraph_botResource()),
                    ])->translatable(),

            MenuItem::make('Documentation', 'https://laravel.com')
                ->badge(fn() => 'Check'),

                
                    // app(MoonShine::class)->resources([
                    //     new PostResource(),
                    // ])  
                

        ]);
    }
}

// namespace App\Providers;
 
// use App\MoonShine\Resources\PostResource; 
// use Illuminate\Support\ServiceProvider;
// use MoonShine\Menu\MenuItem; 
// use MoonShine\MoonShine; 
// use MoonShine\Resources\MoonShineUserResource;
// use MoonShine\Resources\MoonShineUserRoleResource;
 
// class MoonShineServiceProvider extends ServiceProvider
// {
//     //...
 
//     public function boot()
//     {
//         app(MoonShine::class)->menu([ 
//             MenuItem::make('Admins', new MoonShineUserResource()),
//             MenuItem::make('Roles', new MoonShineUserRoleResource()),
//             MenuItem::make('Posts', new PostResource()), 
//         ]); 
//     }
// }


//меню
// namespace App\Providers;
 
// use Illuminate\Support\ServiceProvider;
// use MoonShine\MoonShine;
// use MoonShine\Menu\MenuItem;
// use MoonShine\Resources\MoonShineUserResource;
 
// class MoonShineServiceProvider extends ServiceProvider
// {
//     public function boot(): void
//     {
 
//         app(MoonShine::class)->menu([
//             MenuItem::make('Admins', new MoonShineUserResource()),
//         ]);
 
//     }
// }
