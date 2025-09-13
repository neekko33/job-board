<x-layout>
    <x-bread-crumbs class="mb-4" :links="['My Jobs' => '#']" />
    <div class="flex justify-end items-center mb-4">
        <x-link-button :href="route('my-jobs.create')">Create</x-link-button>
    </div>
    @forelse ($myJobs as $job)
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
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">
                You haven't posted any jobs yet.
            </div>
        </div>
    @endforelse
</x-layout>
