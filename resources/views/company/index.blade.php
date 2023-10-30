<x-tailwind-header>

    <meta name="description" content="Bloom Digital Media is a Media and Communications Agency looking to partner
                    with leading brands to engineer ROI focused digital campaigns and activities
                    that attract, connect, engage, improve sales and convert Nigerian consumers online.">
</x-tailwind-header>
<x-tailwind-navbar>

</x-tailwind-navbar>

<section>
    <form action="{{ route('company.store') }}" method="post"
        class="mt-14 md:mt-24 font-semibold text-sm md:text-base mx-4 md:mx-8">
        @csrf

        <label class="form-label" for="name">Full Name</label>
        <input type="text" name="name" id="name" placeholder="Full Name" class="bg-neutral-700 w-full h-9 mb-6" />
        @if ($errors->has('name'))
        <span class=""> {{$errors->first('name')}}</span>
        @endif
        <br />

        <label class="form-label" for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Email Address"
            class="bg-neutral-700 w-full h-9 mb-6" />
        @if ($errors->has('email'))
        <span class=""> {{$errors->first('email')}}</span>
        @endif
        <br />

        <label class="form-label" for="company">Company That needs Account</label>
        <input type="text" id="company" name="company" placeholder="Company Name"
            class="bg-neutral-700 w-full h-9 mb-6" />
        @if ($errors->has('company'))
        <span class=""> {{$errors->first('company')}}</span>
        @endif
        <br />

        <label class="form-label" for="budget">Monthly Budget</label>
        <input type="number" id="budget" name="budget" placeholder="Monthly Budget"
            class="bg-neutral-700 w-full h-9 mb-6" />
        @if ($errors->has('budget'))
        <span class=""> {{$errors->first('budget')}}</span>
        @endif
        <br />

        <!-- Send Button -->
        <button type="submit"
            class="text-bloom-orange text-base md:text-xl lg:text-2xl font-bold m-4 mb-8 md:m-8 lg:m-8 py-2 lg:py-4 px-8 md:px-10 lg:px-16 bg-white hover:bg-bloom-orange">
            Send
        </button>
        <!-- /Send Button -->
    </form>
</section>