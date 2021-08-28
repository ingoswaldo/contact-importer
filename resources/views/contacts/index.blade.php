<x-app-layout>
    <div class="mx-4 my-1">
        <p class="text-2xl | font-black">Contacts List</p>
    </div>

    <div class="mx-4 my-4 | px-4 py-4 | bg-white | rounded-lg | shadow-lg">
        <livewire:contacts.table  per-page="50"  />
    </div>
</x-app-layout>
