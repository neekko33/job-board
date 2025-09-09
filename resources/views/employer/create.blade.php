<x-layout>
    <form action="{{ route('employer.store') }}" method="POST">
        @csrf
        <x-card>
            <div class="mb-4">
                <x-label for="company_name" :required="true">Company Name</x-label>
                <x-text-input type="text" id="company_name" name="company_name" required />
            </div>
            <x-button type="submit" class="w-full">Create Employer</x-button>
        </x-card>
    </form>
</x-layout>
