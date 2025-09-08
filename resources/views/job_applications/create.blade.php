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
        <form x-ref="apply" action="{{route('job.application.store', $job)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="expected_salary" class="font-medium mb-2 block text-sm text-slate-900">Expected Salary</label>
                <x-text-input form-ref="apply" type="number" name="expected_salary" />
            </div>
            <div class="mb-4">
                <label for="cv" class="font-medium mb-2 block text-sm text-slate-900">Upload CV</label>
                <x-text-input type="file" name="cv" />
            </div>
            <x-button class="w-full">
                Apply
            </x-button>
        </form>
    </x-card>
</x-layout>
