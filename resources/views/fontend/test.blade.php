@extends('layouts.app')

@section('master_content')

<div class="container">
    <x-modal>
        <x-slot name="title">
            Custom Title
        </x-slot>
        @foreach ($tasks as $task)
        <h3>{{ $task['name'] }}</h3>
        @endforeach
    </x-modal>
</div>

@endsection