@component('mail::message')

<p>Hello,</p>
<p>It seems like you forgot your Username!</p>
<p>The Username linked to this Email is <strong>{{$username}}</strong></p>
<p>Best wishes,</p>
<p>{{ config('app.name') }}</p>
@endcomponent
