<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <h1 class="text-lg font-semibold mb-6">Our Stations</h1>
       <small>Click on open map to see the station on the map</small>

        @livewire('list-station', ['filter' => request()->query('filter', 'all')])
    </div>

</x-app-layout>

