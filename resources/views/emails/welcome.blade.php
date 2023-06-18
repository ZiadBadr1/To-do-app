<x-mail::message>

# Hello : {{$user->name}}

You add task : {{$task->title}}
<br>
with comment : {{$task->comment}}


<x-mail::button :url="'www.google.com'">
Home
</x-mail::button>

Thanks,<br>
{{ "Ziad Badr"}}
</x-mail::message>
