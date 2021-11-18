@component('mail::message')
# Your Transaction Has Been Confirmed
Hi {{ $checkout->User->name }}
<br>
Your Transactin has been confirmed, now you can enjoy the benefits <b>{{ $checkout->Camp->title }}</b>
@component('mail::button', ['url' => route('user.dashboard')])
My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
