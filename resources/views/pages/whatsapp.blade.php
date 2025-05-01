<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Whatsapp') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="post" action="{{ route('whatsapp.send') }}">
                        @csrf
                        <div class="row">
                            Phone: <i class="fa fa-phone"></i><input type="text" name="phone" required>
                        </div>
                        <div class="row">
                            Texto: <i class="fa fa-file-text"></i><input type="text" name="message" required>
                        </div>
                        <div class="row">
                            <input type="submit" class="btn btn-success">
                        </div>
                    </form>

                    @if(!empty($whatsapp) && ($whatsapp->count() > 0))
                        @foreach($whatsapp as $wapp)
                            <form method="post" action="{{ route('whatsapp.send') }}">
                                @csrf
                                <div class="row">
                                    Phone: <i class="fa fa-phone"></i><input type="text" name="phone" value="{{ $wapp['phone'] }}" required>
                                    Texto: <i class="fa fa-file-text"></i><input type="text" name="message" value="{{ $wapp['message'] }}" required>
                                    <input type="submit" class="btn btn-success" value="Reenviar">
                                </div>
                            </form>
                        @endforeach

                    @endif

                    {{ $whatsapp->links() }}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
