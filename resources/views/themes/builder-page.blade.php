<x-splade-modal>
    <x-slot:title>
        {{__('Edit Page Content')}}
    </x-slot:title>

    <x-splade-form class="flex flex-col space-y-4 overflow-scroll-x" action="{{route('admin.themes.page.update', $model->id)}}" method="post" :default="[
        'body' => [
            app()->getLocale() => $model->body,
        ]
    ]">
        <div>
            <x-tomato-markdown-editor name="body.{{app()->getLocale()}}" :label="__('Body') . ' [' . str(app()->getLocale())->upper() . ']'"/>
        </div>
        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button secondary type="button" @click.prevent="modal.close" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-splade-modal>
