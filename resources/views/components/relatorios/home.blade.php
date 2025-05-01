<div class="container">
    <h1>Relatório de horas</h1>

    <p>Filtrar apenas o mês</p>

{{--    <div id="toolbar">--}}
{{--        <select class="form-control">--}}
{{--            <option value="">Export Basic</option>--}}
{{--            <option value="all">Export All</option>--}}
{{--            <option value="selected">Export Selected</option>--}}
{{--        </select>--}}
{{--    </div>--}}

    <div class="col-sm-12">
        <x-relatorios.filters></x-relatorios.filters>
    </div>
    <div class="col-sm-12">
        <x-relatorios.export-nf title="Nota Fiscal"></x-relatorios.export-nf>
    </div>
    <div class="col-sm-12">

        <table id="table"
               data-toggle="table"
               data-search="true"
               data-filter-control="true"
               data-show-export="true"
               data-click-to-select="true"
               data-toolbar="#toolbar"
               class="table table-responsive">
            <thead>
            <tr>
                <th data-field="state" data-checkbox="true" onclick="selectAllItems()">
                    <input name="btSelectAllItems" id="btSelectAllItems" type="checkbox">
                </th>
                <th data-field="titulo" data-filter-control="input" data-sortable="true">Titulo</th>
                <th data-field="descricao" data-filter-control="input" data-sortable="true">Descricao</th>
                <th data-field="date-inicio" data-filter-control="select" data-sortable="true">Inicio</th>
                <th data-field="date-fim" data-filter-control="select" data-sortable="true">Fim</th>
                <th data-field="categoria" data-filter-control="select" data-sortable="true">Categoria</th>
                {{--            <th data-field="cor" data-filter-control="select" data-sortable="true">cor</th>--}}
            </tr>
            </thead>
            <tbody>
            @if (!empty($calendar))
                @foreach($calendar as $k => $cal)

                    <tr>
                        <td class="bs-checkbox "><input data-index="0" class="btSelectItem" name="btSelectItem[{{ $k }}]" type="checkbox"></td>
                        <td>{{ $cal->titulo }}</td>
                        <td>{{ $cal->descricao }}</td>
                        <td>{{ date('d/m/Y', strtotime($cal->inicio_data)) }} {{ $cal->inicio_hora }}</td>
                        <td>
                            {{ is_null($cal->termino_data) ?
                                    date('d/m/Y', strtotime($cal->inicio_data)) :
                                    date('d/m/Y', strtotime($cal->termino_data)) }} {{ $cal->termino_hora }}
                        </td>
                        <td>{{ $cal->category()->first()->title }}</td>
                        {{--            <td>{{ $cal->cor }}</td>--}}
                    </tr>

                @endforeach
            @endif
            </tbody>
        </table>

    </div>

</div>


@push('scripts')
    <script src="{{ asset('js/relatorio.js') }}"></script>
@endpush
