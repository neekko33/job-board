<x-layout>
    <x-bread-crumbs class="mb-4" :links="['My Job Applications' => '#']"/>
    @forelse($applications as $application)
        <x-job-card :job="$application->job" class="mb-4">
            <div class="flex justify-between items-center text-sm text-slate-500">
                <div>
                    <p>Applied {{$application->job->created_at->diffForHumans()}}</p>
                    <p>Average asking salary ${{number_format($application->expected_salary)}}</p>
                    <p>
                        {{ $application->job->job_applications_count - 1 }}
                        {{ Str::plural('other applicant', $application->job->job_applications_count - 1) }}
                    </p>
                    <p>Your asking salary ${{number_format($application->job->job_applications_avg_expected_salary)}}</p>
                </div>
                <div>
                    <form action="{{route('my-job-applications.destroy', $application)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button type="submit" class="!bg-red-600 hover:!bg-red-700 text-white">
                            Withdraw
                        </x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                You haven't applied for any jobs yet.
            </div>
            <div class="text-center">
                Go find some jobs <a class="text-indigo-500 hover:underline" href="{{route('jobs.index')}}">here</a>!
            </div>
        </div>
    @endforelse
</x-layout>
