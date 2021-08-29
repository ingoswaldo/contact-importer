<div class="col-span-6 sm:col-span-4 | my-2">
    <x-label
            for="file"
            value="CVS File" />

    <x-input
            id="file"
            class="block mt-1 w-full"
            type="file"
            name="file"
            wire:model="file"
            required />

    <x-input-error
            for="file"
            class="mt-2" />
</div>

<div class="col-span-6 sm:col-span-4 | my-2">
    <x-label
            for="name_column_name"
            value="Name of Name Column" />

    <x-input
            id="name_column_name"
            class="block mt-1 w-full"
            type="text"
            name="name_column_name"
            wire:model="nameColumnName"
            required />

    <x-input-error
            for="name_column_name"
            class="mt-2" />
</div>

<div class="col-span-6 sm:col-span-4 | my-2">
    <x-label
            for="email_column_name"
            value="Name of Email Column" />

    <x-input
            id="email_column_name"
            class="block mt-1 w-full"
            type="text"
            name="email_column_name"
            wire:model="emailColumnName"
            required />

    <x-input-error
            for="email_column_name"
            class="mt-2" />
</div>

<div class="col-span-6 sm:col-span-4 | my-2">
    <x-label
            for="birthdate"
            value="Name of Birth Of Date Column" />

    <x-input
            id="birthdate_column_name"
            class="block mt-1 w-full"
            type="text"
            name="birthdate_column_name"
            wire:model="birthdateColumnName"
            required />

    <x-input-error
            for="birthdate_column_name"
            class="mt-2" />
</div>

<div class="col-span-6 sm:col-span-4 | my-2">
    <x-label
            for="phone_column_name"
            value="Name of Phone Column" />

    <x-input
            id="phone_column_name"
            class="block mt-1 w-full"
            type="text"
            name="phone_column_name"
            wire:model="phoneColumnName"
            required />

    <x-input-error
            for="phone_column_name"
            class="mt-2" />
</div>

<div class="col-span-6 sm:col-span-4 | my-2">
    <x-label
            for="address_column_name"
            value="Name of Address Column" />

    <x-input
            id="address_column_name"
            class="block mt-1 w-full"
            type="text"
            name="address_column_name"
            wire:model="addressColumnName"
            required />

    <x-input-error
            for="address_column_name"
            class="mt-2" />
</div>

<div class="col-span-6 sm:col-span-4 | my-2">
    <x-label
            for="credit_card_column_name"
            value="Name of Credit Card Column" />

    <x-input
            id="credit_card_column_name"
            class="block mt-1 w-full"
            type="text"
            name="credit_card_column_name"
            wire:model="creditCardColumnName"
            required />

    <x-input-error
            for="credit_card_column_name"
            class="mt-2" />
</div>

<div class="col-span-6 sm:col-span-4 | my-2">
    <x-label
            for="franchise_column_name"
            value="Name of Franchise Column" />

    <x-input
            id="franchise_column_name"
            class="block mt-1 w-full"
            type="text"
            name="franchise_column_name"
            wire:model="franchiseColumnName"
            required />

    <x-input-error
            for="franchise_column_name"
            class="mt-2" />
</div>