<x-layout>
    <x-bread-crumbs class="mb-4" :links="['My Jobs' => '#']" />
    <div class="flex justify-end items-center mb-4">
        <x-link-button :href="route('my-jobs.create')">Create</x-link-button>
    </div>
    @foreach ($myJobs as $job)
        <x-job-card :job="$job" class="mb-4">
        <div class="flex space-x-2">
            <x-link-button :href="route('my-jobs.edit', $job)">Edit</x-link-button>
            <form action="{{route('my-jobs.destroy', $job)}}" method="POST">
                @csrf
                @method('DELETE')
                <x-button class="!bg-red-500 hover:!bg-red-600 text-white">Delete</x-button>
            </form>
        </div>
        </x-job-card>
    @endforeach
</x-layout>
