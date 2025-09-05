@php use App\Models\Job;use Illuminate\Support\Str; @endphp
<x-layout>
    <x-bread-crumbs class="mb-4" :links="['Jobs' => route('jobs.index')]"/>

    <x-card class="mb-4 text-sm">
        <form action="{{route('jobs.index')}}" method="GET">
            @csrf
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" value="{{request('search')}}" placeholder="Search for any text"/>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Salary</div>
                    <div class="flex gap-2">
                        <x-text-input name="min_salary" value="{{request('min_salary')}}" placeholder="From"/>
                        <x-text-input name="max_salary" value="{{request('max_salary')}}" placeholder="To"/>
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experience</div>
                    <x-radio-group :options="Job::$experienceLevels" name="experience" class="flex flex-col gap-1"></x-radio-group>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>
                    <select
                        class="w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 ring-slate-300 placeholder:text-slate-400 focus:ring-2"
                        name="category">
                        <option value="">All</option>
                        @foreach(Job::$categories as $category)
                            <option
                                value="{{$category}}"
                                @selected(request('category') === $category)>
                                {{Str::ucfirst($category)}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                </div>
            </div>
            <button type="submit" class="rounded-md px-2 py-1 border cursor-pointer">Filter</button>
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
