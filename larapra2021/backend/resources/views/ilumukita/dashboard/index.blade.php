<x-ilumukita.dashboards.layout>
    <x-slot name="title">This is dashboard</x-slot>
    <x-slot name="breadcrumbs"> breadcrumbs </x-slot>

    <div class="row">
        <div class="col-md-12">
            <h2>Select</h2> {{ Auth::user()->ilumukita_user->name}}
        </div>
    </div>
</x-ilumukita.dashboards.layout>