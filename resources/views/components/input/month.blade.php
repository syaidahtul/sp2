<div x-data="datepicker(@entangle($attributes->wire('model')))" class="relative">
    <div class="flex flex-col">
        <div class="flex items-center gap-2">
            <input type="text" x-ref="myDatepicker" x-model="value">
            <span class="underline cursor-pointer" x-on:click="reset">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
            </span>
        </div>
    </div>
</div>

@once
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script type="text/javascript" src="{{ URL::asset('js/monthSelectPlugin.js') }}"></script>
    
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('datepicker', (model) => ({
                value: model,
                init() {
                    this.pickr = flatpickr(this.$refs.myDatepicker, {
                        plugins: [
                            new monthSelectPlugin({
                                shorthand: true, //defaults to false
                                dateFormat: "m-Y", //defaults to "F Y"
                                altFormat: "F Y", //defaults to "F Y"
                                theme: "dark" // defaults to "light"
                            })
                        ]
                    })
                    this.$watch('value', function(newValue) {
                        this.pickr.setDate(newValue);
                    }.bind(this));
                },
                reset() {
                    this.value = null;
                }
            }))
        })
    </script>
    
@endonce
