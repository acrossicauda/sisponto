@push('styles')
    <!-- FullCalendar -->
    <link href='{{ asset('css/fullcalendar.css') }}' rel='stylesheet' />
    <link href='{{ asset('css/fullcalendar.print.min.css') }}' rel='stylesheet' media='print' />

    <!-- Custom CSS Calendario -->
    <link href='{{ asset('css/calendar.css') }}' rel='stylesheet' />
    <!-- Custom CSS Calendario -->
{{--    <link href='{{ asset('css/bootrstrap.min.css') }}' rel='stylesheet' />--}}
    <link href='{{ asset('css/custom.css') }}' rel='stylesheet' />


@endpush
@push('scripts')

    <!-- jQuery Version 1.11.1 -->
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- Bootstrap CORE JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- FullCalendar -->
    <script src='{{ asset('js/moment.min.js') }}'></script>
    <script src='{{ asset('js/fullcalendar.min.js') }}'></script>
    <script src='{{ asset('locale/pt-br.js') }}'></script>


@endpush
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Calendario') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-calendar-comp :calendar="$calendar"></x-calendar-comp>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
