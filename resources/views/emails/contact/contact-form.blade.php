@component('mail::message')
# Thank you for Your message.

<strong>Name:</strong> {{$data['contactName']}}
<strong>Email:</strong> {{$data['contactEmail']}}
<strong>Message:</strong> {{$data['contactMessage']}}
@endcomponent
