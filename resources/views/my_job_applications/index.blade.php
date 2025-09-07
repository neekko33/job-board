<x-layout>
    <x-bread-crumbs class="mb-4" :links="['My Job Applications' => '#']"/>
    @forelse($applications as $application)
        <x-job-card :job="$application->job" class="mb-4">
            <form action="{{route('my-job-applications.destroy', $application)}}" method="POST">
                @csrf
                @method('DELETE')
                <x-button type="submit" class="w-full bg-red-600 hover:bg-red-700">
                    Withdraw Application
                </x-button>
            </form>
        </x-job-card>
    @empty
        <p class="text-center text-slate-500">You have not applied for any jobs yet.</p>
    @endforelse
</x-layout>
