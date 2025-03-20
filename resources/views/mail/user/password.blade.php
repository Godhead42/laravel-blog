<x-mail::message>
    @component('mail::message')
        # Ваш новый пароль

        Здравствуйте!

        Ваш новый пароль: **{{ $password }}**

        Если вы не запрашивали смену пароля, просто проигнорируйте это письмо.

        @component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
            Войти в аккаунт
        @endcomponent

        Спасибо,
        {{ config('app.name') }}
    @endcomponent

</x-mail::message>
