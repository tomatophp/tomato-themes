<x-tomato-admin-layout>
    <x-slot name="header">
        Create New Theme
    </x-slot>
    <x-slot name="headerBody">
        <x-splade-link href="{{route('admin.themes.index')}}" class="disabled:bg-gray-600 disabled:hover:bg-gray-500 filament-button inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset dark:focus:ring-offset-0 min-h-[2rem] px-3 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700">
            Back
        </x-splade-link>
    </x-slot>


    <div class="my-4">
        <x-splade-form  method="POST" action="{{route('admin.themes.store')}}">
            <div class="flex flex-col space-y-4">
                <x-splade-input name="name" label="Theme Name" placeholder="Theme Name" />
                <x-splade-textarea name="description" label="Theme Description" placeholder="Theme Description" />
                <x-splade-submit>Create</x-splade-submit>
            </div>
        </x-splade-form>
    </div>
</x-tomato-admin-layout>
