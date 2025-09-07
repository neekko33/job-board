<x-layout>
    <x-bread-crumbs
        class="mb-4"
        :links="['Jobs' => route('jobs.index'), $job->title => route('jobs.show', $job), 'Apply' => '#']"
    />
    <x-job-card :$job class="mb-4" />
    <x-card x-data="">
        <h2 class="mb-4 text-lg font-medium">
            Your Job Application
        </h2>
        <form x-ref="apply" action="{{route('job.application.store', $job)}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="" class="font-medium mb-2 block text-sm text-slate-900">Expected Salary</label>
                <x-text-input form-ref="apply" type="number" name="expected_salary" />
            </div>
            <x-button class="w-full">
                Apply
            </x-button>
        </form>
    </x-card>
</x-layout>
