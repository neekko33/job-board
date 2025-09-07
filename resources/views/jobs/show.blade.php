<x-layout>
    <x-bread-crumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => '#']"/>
    <x-job-card :$job class="mb-4">
        <p class="text-sm text-slate-500 mb-4">{!! nl2br(e($job->description)) !!}</p>
        @can('apply', $job)
            <x-link-button :href="route('job.application.create', $job)">Apply</x-link-button>
        @else
            <p class="text-sm text-slate-500 text-center font-medium">You have already applied for this job.</p>
        @endcan
    </x-job-card>

    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">More {{$job->employer->company_name}} Jobs</h2>
        @foreach($job->employer->jobs as $otherJob)
            @if($job->id !== $otherJob->id)
                <div class="mb-4 flex justify-between">
                    <div>
                        <div class="text-slate-700 hover:text-slate-500">
                            <a href="{{route('jobs.show', $otherJob)}}">{{$otherJob->title}}</a>
                        </div>
                        <div class="text-xs">
                            {{$otherJob->created_at->diffForHumans()}}
                        </div>
                    </div>
                    <div class="text-xs">
                        ${{number_format($otherJob->salary)}}
                    </div>
                </div>
            @endif
        @endforeach
    </x-card>
</x-layout>
