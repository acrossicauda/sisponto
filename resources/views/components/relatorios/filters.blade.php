<div id="toolbar">
    <form action="" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <label for="data_inicio" class="form-label">Data de Início:</label>
                <input type="date" name="data_inicio"
                       id="data_inicio"
                       class="form-control"
                       value="{{ request('data_inicio') ?? \Carbon\Carbon::now()->startOfMonth()->toDateString() }}">
            </div>

            <div class="col-md-3">
                <label for="data_fim" class="form-label">Data de Fim:</label>
                <input type="date" name="data_fim"
                       id="data_fim"
                       class="form-control"
                       value="{{ request('data_fim') ?? \Carbon\Carbon::now()->endOfMonth()->toDateString() }}">
            </div>

            <div class="col-md-2">
                <div class="row">
                    <label for="filtrar" class="form-label"></label>
                </div>
                <div class="row mt-2">
                    <button type="submit" name="filtrar" class="btn btn-primary mt-4">Filtrar</button>
                </div>
            </div>
        </div>
    </form>
</div>
