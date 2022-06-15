<form autocomplete='off' class='form'>
    <div class='control'>
        <h1>
            Sign In
        </h1>
    </div>

    <div class='control block-cube block-input'>
        <input wire:model="phone" placeholder='Phone' type='text'>
        <div class='bg-top'>
            <div class='bg-inner'></div>
        </div>
        <div class='bg-right'>
            <div class='bg-inner'></div>
        </div>
        <div class='bg'>
            <div class='bg-inner'></div>
        </div>

    </div>
    <div class='control block-cube block-input'>
        <input wire:model="password" placeholder='Password' type='password'>
        <div class='bg-top'>
            <div class='bg-inner'></div>
        </div>
        <div class='bg-right'>
            <div class='bg-inner'></div>
        </div>
        <div class='bg'>
            <div class='bg-inner'></div>
        </div>
    </div>
    <button class='btn block-cube block-cube-hover' wire:click="login" type='button'>
        <div class='bg-top'>
            <div class='bg-inner'></div>
        </div>
        <div class='bg-right'>
            <div class='bg-inner'></div>
        </div>
        <div class='bg'>
            <div class='bg-inner'></div>
        </div>
        <div class='text'>
            Log In
        </div>
    </button>

    <small style="color: red;margin-top: 3rem ; display: inline-block;">
        @error('phone') <span class=" text-danger d-flex mt-0 ">{{ $message }}</span> @enderror <br>
        @error('password') <span class=" text-danger d-flex mt-0 ">{{ $message }}</span> @enderror
    </small>
    <div class='credits'>

        dont try

    </div>
</form>
