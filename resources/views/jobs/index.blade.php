<x-layout>
    @foreach($jobs as $job)
        <x-job-card :$job class="mb-4">
            <x-link-button :href="route('jobs.show', $job)">
                View Detail
            </x-link-button>
        </x-job-card>
    @endforeach
</x-layout>
