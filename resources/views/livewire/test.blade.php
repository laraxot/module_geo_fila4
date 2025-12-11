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
<div>
{{ Theme::add('https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js') }}
    {{ __FILE__ }}{{ __LINE__ }}
    <form wire:submit.prevent="createAddress">
    <div class="form-group" >
        <x-geo::google-address-lookup wire:model.lazy="lookup" />
    </div>
    <div class="form-group">
        <button
            type="submit"
            class="btn btn-outline-secondary"
            wire:submit.prevent="createAddress">{{__('Add Address')}}</button>
    </div>
    </form>
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
