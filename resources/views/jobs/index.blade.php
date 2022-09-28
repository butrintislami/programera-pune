<x-layouts>
    @include('Partials._hero')
    @include('Partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @foreach($jobs as $job)
            <x-jobs-card :job="$job"></x-jobs-card>
        @endforeach
    </div>
    {{ $jobs->links() }}

</x-layouts>
