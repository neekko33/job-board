@php use App\Models\Job;use Illuminate\Support\Str; @endphp
<x-layout>
    <x-bread-crumbs class="mb-4" :links="['Jobs' => route('jobs.index')]"/>

    <x-card class="mb-4 text-sm" x-data="">
        <form x-ref="filters" id="filtering-form" action="{{route('jobs.index')}}" method="GET">
            @csrf
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" value="{{request('search')}}" placeholder="Search for any text" form-ref="filters"/>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Salary</div>
                    <div class="flex gap-2">
                        <x-text-input name="min_salary" value="{{request('min_salary')}}" placeholder="From" form-ref="filters"/>
                        <x-text-input name="max_salary" value="{{request('max_salary')}}" placeholder="To" form-ref="filters"/>
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experience</div>
                    <x-radio-group
                        :options="array_combine(array_map('ucfirst', Job::$experienceLevels), Job::$experienceLevels)"
                        name="experience" class="flex flex-col gap-1"></x-radio-group>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>
                    <x-radio-group :options="Job::$categories" name="category"
                                   class="flex flex-col gap-1"></x-radio-group>
                </div>
                <div>
                </div>
            </div>
            <x-button class="w-full">
                Filter
            </x-button>
        </form>
    </x-card>

    @foreach($jobs as $job)
        <x-job-card :$job class="mb-4">
            <x-link-button :href="route('jobs.show', $job)">
                Show
            </x-link-button>
        </x-job-card>
    @endforeach

    <div>
        {{$jobs->withQueryString()->links()}}
    </div>
</x-layout>
