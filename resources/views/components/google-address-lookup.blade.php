<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> f0b4f5c (.)
<?php

declare(strict_types=1);

?>
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
<div class="input-group"
    wire:ignore
    x-data={lookup:{}}
    x-init="() => {
        new AddressAutocomplete('.google-address-lookup', (result, raw) => {
            @this.set('lookup', result)
        });
    }"
    {{ $attributes }}
    >
    <input
        x-data
        x-on:address:list:refresh.window="$('.google-address-lookup').val('')"
        x-on:keydown.enter.prevent
        wire:ignore.self
        wire:loading.attr="readonly"
        autocomplete="google-lookup"
        class="form-control google-address-lookup"
        required
        type="search"
    >
<<<<<<< HEAD
</div>
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
</div>
=======
</div>
>>>>>>> a12f125f4a (.)
=======
</div>
>>>>>>> b93ef594b4 (.)
=======
</div>
>>>>>>> origin/develop
>>>>>>> f0b4f5c (.)
