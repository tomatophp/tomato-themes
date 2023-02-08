<x-splade-modal class="font-main">
    <h1 class="text-2xl font-bold mb-4">Upload New Theme File</h1>

    <x-splade-form class="flex flex-col space-y-4" method="POST" action="{{route('admin.themes.upload.new')}}">
        <x-splade-file filepond preview accept="application/zip, application/octet-stream " name="theme" label="Theme ZIP file" placeholder="you can upload your theme file here" />
        <x-splade-submit label="Upload"></x-splade-submit>
    </x-splade-form>
</x-splade-modal>
