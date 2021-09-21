@component('mail::message')

Your invoice has been paid!
<br>
{!! QrCode::size(250)->generate($url); !!}
Thanks,<br>

