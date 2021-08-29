<div>
    <x-action-message
            class="my-3"
            on="uploaded">
        The CVS file has been uploaded and it's been processing...
    </x-action-message>

    <x-button
            class="ml-3"
            wire:click="showUploadFileModal">
        Upload File
    </x-button>

    <form wire:submit.prevent="upload">
        <x-dialog-modal wire:model="uploadingFile">
            <x-slot name="title">
                Upload File
            </x-slot>

            <x-slot name="content">
                @include('upload-files.fields')
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button
                        wire:click="hideUploadFileModal"
                        wire:loading.attr="disabled"
                        @class="py-4">
                    Cancel
                </x-secondary-button>

                <x-button wire:loading.attr="disabled">
                    Upload
                </x-button>
            </x-slot>
        </x-dialog-modal>
    </form>
</div>