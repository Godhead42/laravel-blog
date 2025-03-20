<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Карта прослушивателей событий приложения.
     *
     * @var array
     */
    protected $listen = [
        // Пример события и слушателя
        // 'App\Events\SomeEvent' => [
        //     'App\Listeners\SomeEventListener',
        // ],
    ];

    /**
     * Регистрация любых событий для приложения.
     */
    public function boot()
    {
        parent::boot();

        // Можно зарегистрировать кастомные события
        // Event::listen(SomeEvent::class, SomeEventListener::class);
    }
}
