<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ mix('js/page.js') }}"></script>
</head>
<body class="font-sans antialiased">
<x-jet-banner/>
<div class="min-h-screen bg-gray-100">
    <div class=" w-full z-20" >
        @if(@$guest !== null)
            @livewire('navigation-guest')
        @else
            @livewire('navigation-menu')
        @endif
    </div>
    <!-- Page Heading -->
    <div class="">
        @if (@$header)
            <header class="bg-white shadow " id="navigation-title">
                <div class=" mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @else
            <div id="navigation-title"></div>
        @endif
    </div>

    <!-- Page Content -->
    <main class="z-30">
        {{ $slot }}
    </main>
</div>

@stack('modals')
@livewireScripts
<x-alert/>
@stack('js')
<script>
    function dropdown(value, data_value = "") {
        return {
            options: [],
            selected: [],
            show: false,
            open() {
                this.show = true
            },
            close() {
                this.show = false
            },
            search() {
                console.log(this.input.value())
            },
            isOpen() {
                return this.show === true
            },
            select(index, event) {
                if (!this.options[index].selected) {
                    console.log(event.target,)
                    this.options[index].selected = true;
                    // this.options[index].element = event.target;
                    this.selected.push(index);
                } else {
                    this.selected.splice(this.selected.lastIndexOf(index), 1);
                    this.options[index].selected = false
                }
                let select_value = document.getElementById('select-value-' + value);
                select_value.value = this.selected.map((option) => {
                    return this.options[option].value;
                }).toString()
                select_value.dispatchEvent(new Event('input'));
            },
            remove(index, option) {

                this.options[option].selected = false;
                this.selected.splice(index, 1);

                let select_value = document.getElementById('select-value-' + value);
                select_value.value = this.selected.map((option) => {
                    return this.options[option].value;
                }).toString()
                select_value.dispatchEvent(new Event('input'));


            },
            loadOptions() {
                const options = document.getElementById('select-' + value).options;
                for (let i = 0; i < options.length; i++) {

                    this.options.push({
                        value: options[i].value,
                        text: options[i].innerText,
                        selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
                    });
                    if (data_value.includes(options[i].innerText)) {
                        this.options[i].selected = true;
                        this.selected.push(i);
                    }
                }
            },
            selectedValues() {
                return this.selected.map((option) => {
                    return this.options[option].value;
                }).toString()
            }
        }
    }
    window.onscroll = changePos;

    function changePos() {
        var header = document.getElementById("header");
        var navigation = document.getElementById("navigation-title");
        if (window.pageYOffset > 70) {
            header.style.position = "fixed";
            header.style.top = "0";
            header.style.zIndex = 100;
            navigation.style.marginTop = "4.45rem";
            navigation.style.position = "relative";
        } else {
            header.style.position = "";
            header.style.top = "";

            navigation.style.marginTop = "";
            navigation.style.position = "";
        }
    }

</script>
</body>
</html>
