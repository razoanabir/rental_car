<x-mail::message>
## New Mail Submition

## Name : {{$name}}
## Email: {{$email}}
## subject : {{$subject}}

## Message :
    {{$message}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
