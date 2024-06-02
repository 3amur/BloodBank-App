<x-mail::message>

<h1>Hello : {{ $client->name }}</h1> 

Blood Bank Reset Password.

<p> Your PinCode is : {{ $client->bin_code }}</p>

Thanks Mr : {{ $client->name }},<br>
{{ config('app.name') }}
</x-mail::message>
