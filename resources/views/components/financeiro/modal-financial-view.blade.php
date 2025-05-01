
<button type="button"
        onclick="openModal({{ $id }})"
        data-toggle="modal"
        data-target="#visualizar-financeiro"><i class="fa fa-eye"></i></button>

<div class="modal fade bd-example-modal-lg" id="visualizar-financeiro"
     tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="container-fluid">

                <div class="col-8 mt-2">
                    <div class="row">
                        <label class="col-sm-2 control-label">Detalhes Financeiro #<span id="num_financeiro"></span> - <span id="title_financeiro"></span></label>
                    </div>
                </div>

                <div class="col-8">
                    <div class="row">
                        <label for="titulo" class="col-sm-2 control-label">Titulo</label>
                    </div>
                    <div class="row">
                        <div class="col-sm-10">
                            <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Titulo" required>
                        </div>
                    </div>
                </div>

                <div class="col-8 mt-3">
                    <div class="row">
                        <label for="descricao" class="col-sm-2 control-label">Descrição</label>
                    </div>
                    <div class="row">
                        <div class="col-sm-10">
                            <textarea type="text" name="descricao" class="form-control" id="descricao" placeholder="Descrição"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-8 mt-3">
                    <div class="row">
                        <label for="inicio_data" class="col-sm-6 control-label">Data de Pagamento</label>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="date" name="pagamento_data" class="form-control" id="pagamento-data" required>
                        </div>
                        <div class="col-sm-3">
                            <input type="time" name="pagamento_hora" class="form-control" id="pagamento-hora" required>
                        </div>
                    </div>
                </div>
                <div class="col-8 mt-3">
                    <div class="row">
                        <label for="inicio_data" class="col-sm-6 control-label">Notificar</label>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="date" name="notification_data" class="form-control" id="notification-data" required>
                        </div>
                        <div class="col-sm-3">
                            <input type="time" name="notification_hora" class="form-control" id="notification-hora" required>
                        </div>
                    </div>
                </div>

                <div class="col-8 mt-3">
                    <div class="row">
                        <label for="status" class="col-sm-2 control-label">Status</label>
                    </div>
                    <div class="row">
                        <div class="col-sm-1">
                            <input type="checkbox" name="status" class="form-control" id="status"
                                   checked
                                   placeholder="Status">
                        </div>
                    </div>
                </div>
                <div class="col-8 mt-3">
                    <div class="row">
                        <label for="recorrencia" class="col-sm-2 control-label">Recorrência</label>
                    </div>
                    <div class="row">
                        <div class="col-sm-1">
                            <input type="checkbox" name="recorrencia"
                                   class="form-control"
                                   id="recorrencia"
                                   placeholder="Recorrência">
                        </div>
                    </div>
                </div>

                <div class="col-8 mt-3">
                    <button class="btn btn-danger">Fechar</button>
                </div>

            </div>

        </div>
    </div>
</div>
