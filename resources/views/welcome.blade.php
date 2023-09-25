<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css','resources/js/app.js'])
    @filamentStyles
</head>
<body class="antialiased p-20">

<div class="mt-10">
    <h1 class="text-2xl">Multiple hint action margin issue</h1>
    @livewire('hint-action-margin-issue')
</div>



<div class="mt-10">
    <h1 class="text-2xl">Create Option Modal Issue</h1>
    @livewire('create-option-modal-issue')
</div>

<div class="mt-10">
    <h1 class="text-2xl">Live Components don't Work on an Action when using
        <code>steps()</code>
        method
    </h1>
    @livewire('live-components-dont-work-on-wizard')
</div>

<div class="mt-10">
    <h1 class="text-2xl">Get Option Label From Record Using Issue
    </h1>
    @livewire('get-option-label-from-record-using-issue')
</div>


<div class="mt-10">
    <h1 class="text-2xl">Action Group Doesn't show Label
    </h1>
    @livewire('action-group-label-not-display-issue')
</div>


@filamentScripts
</body>
</html>
