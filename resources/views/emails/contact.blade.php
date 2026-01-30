<x-mail::message>
# New Contact Message

**From:** {{ $data['name'] }} ({{ $data['email'] }})
**Subject:** {{ $data['subject'] }}

**Message:**
{{ $data['message'] }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
