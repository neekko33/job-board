<x-layout>
    <x-bread-crumbs class="mb-4" :links="['My Jobs' => '#']" />
    <div class="flex justify-end items-center mb-4">
        <x-link-button :href="route('my-jobs.create')">Add New</x-link-button>
    </div>
    @forelse ($myJobs as $job)
        <x-job-card :job="$job" class="mb-4">
            <div class="mb-4">
                <p class="text-sm text-slate-500 mb-4">{!! nl2br(e($job->description)) !!}</p>
            </div>
            <div class="mb-4">
                <div>
                    <h3 class="font-medium mb-2">Applications ({{ $job->jobApplications->count() }})</h3>
                </div>
                @forelse ($job->jobApplications as $application)
                    <div
                        class="mb-2 flex justify-between items-center text-sm text-slate-500 gap-2 border-b border-slate-200 pb-2">
                        <div>
                            <div>{{ $application->user->name }}</div>
                            <div>Applied {{ $application->created_at->diffForHumans() }}</div>
                            <div>Expected Salary: ${{ number_format($application->expected_salary) }}</div>
                        </div>
                        <x-button class="my-2 text-xs">Download CV</x-button>
                    </div>
                @empty
                    <div class="text-sm text-slate-500">No applications yet.</div>
                @endforelse
            </div>
            <div class="flex space-x-2 justify-end">
                <x-link-button :href="route('my-jobs.edit', $job)">Edit</x-link-button>
                <form action="{{ route('my-jobs.destroy', $job) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button class="!bg-red-500 hover:!bg-red-600 text-white">Delete</x-button>
                </form>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                You haven't posted any jobs yet.
            </div>
            <div>
                <div class="text-center">
                    Post your first job <a class="text-indigo-500 hover:underline"
                        href="{{ route('my-jobs.create') }}">here</a>!
                </div>
            </div>
        </div>
    @endforelse
</x-layout>
