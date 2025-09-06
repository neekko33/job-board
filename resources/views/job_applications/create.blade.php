<x-layout>
    <x-bread-crumbs
        class="mb-4"
        :links="['Jobs' => route('jobs.index'), $job->title => route('jobs.show', $job), 'Apply' => '#']"
    />
    <x-job-card :$job class="mb-4" />
    <x-card>
        Apply for a Job
    </x-card>
</x-layout>
