<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.edit')}} {{__('Feature')}} #{{$model->id}}">
    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.features.update', $model->id)}}" method="post" :default="$model">

        <x-tomato-translation :label="__('Title')" name="title"/>
        <x-tomato-translation :label="__('Description')" name="description"/>
        <x-tomato-admin-icon :label="__('Icon')" name="icon"  :placeholder="__('Icon')" />
        <x-tomato-admin-color :label="__('Icon color')" name="icon_color"   :placeholder="__('Icon color')" />
        <x-tomato-admin-color :label="__('Icon bg color')" name="icon_bg_color"  :placeholder="__('Icon bg color')" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button danger :href="route('admin.features.destroy', $model->id)"
                                   confirm="{{trans('tomato-admin::global.crud.delete-confirm')}}"
                                   confirm-text="{{trans('tomato-admin::global.crud.delete-confirm-text')}}"
                                   confirm-button="{{trans('tomato-admin::global.crud.delete-confirm-button')}}"
                                   cancel-button="{{trans('tomato-admin::global.crud.delete-confirm-cancel-button')}}"
                                   method="delete"  label="{{__('Delete')}}" />
            <x-tomato-admin-button secondary :href="route('admin.features.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
