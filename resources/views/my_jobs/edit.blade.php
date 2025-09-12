@php
    use App\Models\Job;
    use Illuminate\Support\Str;
@endphp
<x-layout>
    <x-bread-crumbs class="mb-4" :links="['My Jobs' => route('my-jobs.index'), 'Edit Job' => '#']" />
    <x-card>
        <form action="{{ isset($myJob) ? route('my-jobs.update', $myJob) : route('my-jobs.store') }}" method="POST">
            @csrf
            @if (isset($myJob))
                @method('PUT')
            @endif
            <div class="space-y-4 mb-4">
                <div>
                    <div class="mb-1 font-semibold">Title</div>
                    <x-text-input name="title" value="{{ $myJob->title ?? '' }}" placeholder="Job title"
                        form-ref="job-editor" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Location</div>
                    <x-text-input name="location" value="{{ $myJob->location ?? '' }}" placeholder="Job location"
                        form-ref="job-editor" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Salary</div>
                    <x-text-input name="salary" value="{{ $myJob->salary ?? '' }}" placeholder="Salary" type="number"
                        form-ref="job-editor" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experience</div>
                    <x-select name="experience" :options="array_combine(array_map('ucfirst', Job::$experienceLevels), Job::$experienceLevels)" :value="$myJob->experience ?? Job::$experienceLevels[0]" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>
                    <x-select name="category" :options="array_combine(Job::$categories, Job::$categories)" :value="$myJob->category ?? Job::$categories[0]" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Description</div>
                    <x-text-input type="textarea" name="description" placeholder="Job description" form-ref="job-editor"
                        :rows="10" value="{{ $myJob->description ?? '' }}"></x-text-input>
                </div>
                <x-button class="w-full" type="submit">
                    {{ isset($myJob) ? 'Update Job' : 'Create Job' }}
                </x-button>
            </div>
        </form>
    </x-card>
</x-layout>
