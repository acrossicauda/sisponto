<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <p class="lead"></p>
            <div id="calendar" class="col-centered">
            </div>
        </div>
    </div>
    <!-- /.row -->

    <!-- Valida data dos Modals -->
    <script type="text/javascript">
        function validaForm(erro) {
            if(erro.inicio_hora.value>erro.termino_hora.value){
                alert('Data de Inicio deve ser menor ou igual a de termino.');
                return false;
            }else if(erro.inicio_hora.value==erro.termino_hora.value){
                alert('Defina um horario de inicio e termino.(24h)');
                return false;
            }
        }
    </script>


    <!-- Modal Adicionar Evento -->
    @include('components.calendar.evento.modal.modalAdd')


    <!-- Modal Editar/Mostrar/Deletar Evento -->
    @include('components.calendar.evento.modal.modalEdit')

</div>

<!-- jQuery Version 1.11.1 -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- FullCalendar -->
<script src='js/moment.min.js'></script>
<script src='js/fullcalendar.min.js'></script>
<script src='locale/pt-br.js'></script>

<script>

    let id = '';
    let title = '';
    let description = '';
    let start = '';
    let end = '';
    let color = '';
    let id_usuario = '';
    let status = '';

    let eventData = [];


    @if(!isset($calendar))
        eventData = {{ json_encode($calendar) }};
    @endif



    function modalShow() {
        $('#modalShow').modal('show');
    }

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listYear'
            },
            defaultView: 'month',
            defaultDate:'{{ date('Y-m-d') }}',
            editable: true,
            navLinks: true,
            eventLimit: true,
            selectable: true,
            selectHelper: true,
            select: function(start, end) {

                $('#ModalAdd #inicio-data').val(moment(start).format('YYYY-MM-DD'));
                $('#ModalAdd #inicio-hora').val(moment(start).format('HH:mm'));

                $('#ModalAdd #termino-data').val(moment(end).format('YYYY-MM-DD'));
                $('#ModalAdd #termino-hora').val(moment(end).format('HH:mm'));

                $('#qtdhora').blur(function (el) {
                    let hourInitial = $('#ModalAdd #inicio-hora');
                    let elHourFinal = $('#ModalAdd #termino-hora');
                    let qtdHoras = $('#qtdhora').val();

                    let newFinalDate = moment(hourInitial.val(), 'hh:mm').add(qtdHoras, 'hours').format('HH:mm')
                    elHourFinal.val(newFinalDate)

                });

                $('#ModalAdd').modal('show');
            },
            eventRender: function(event, element) {
                element.bind('click', function() {
                    $('#ModalEdit #id_evento').val(event.id);
                    $('#ModalEdit #titulo').val(event.title);
                    $('#ModalEdit #descricao').val(event.description);
                    $('#ModalEdit #cor').val(event.color);
                    $('#ModalEdit #convidado').val(event.fk_id_destinatario);
                    $('#ModalEdit #remetente').val(event.fk_id_remetente);
                    $('#ModalEdit #status').val(event.status);
                    $('#ModalEdit #inicio-data').val(event.start.format('YYYY-MM-DD'));
                    $('#ModalEdit #inicio-hora').val(event.start.format('HH:mm:ss'));
                    $('#ModalEdit #termino-data').val(event.end.format('YYYY-MM-DD'));
                    $('#ModalEdit #termino-hora').val(event.end.format('HH:mm:ss'));
                    $('#ModalEdit').modal('show');
                });
            },
            eventDrop: function(event, delta, revertFunc) {
                edit(event);
            },

            eventResize: function(event,dayDelta,minuteDelta,revertFunc) {
                edit(event);
            },

            {{--events: {!! json_encode($calendar) !!},--}}
            events: function(start, end, timezone, callback) {
                // Aqui vamos fazer a requisição AJAX sempre que o calendário for carregado ou a visualização mudar
                $.ajax({
                    {{--url: {{ route('calendar.getCalendar') }}, // URL para obter os eventos--}}
                    url: 'getEvents',
                    data: {
                        start: start.format(), // Data de início da visualização (formato ISO 8601)
                        end: end.format(), // Data de término da visualização (formato ISO 8601)
                    },
                    dataType: 'json',
                    success: function(data) {
                        callback(data); // Passa os dados para o FullCalendar
                    }
                });
            },
            // Quando a visualização mudar, ou o mês/semana for alterado
            viewRender: function(view, element) {
                // Recarrega os eventos sempre que a visualização mudar
                console.log('A visualização foi alterada para:', view.name);
            }
        });

        function edit(event){
            start = event.start.format('DD-MM-YYYY HH:mm:ss');
            if(event.end){
                end = event.end.format('DD-MM-YYYY HH:mm:ss');
            }else{
                end = start;
            }

            id_evento =  event.id;

            Event = [];
            Event[0] = id_evento;
            Event[1] = start;
            Event[2] = end;

            $.ajax({
                url: 'evento/action/eventoEditData.php',
                type: "POST",
                data: {Event:Event},
                success: function(rep) {
                    if(rep == 'OK'){
                        alert('Modificação Salva!');
                    }else{
                        alert('Falha ao salvar, tente novamente!');
                    }
                }
            });
        }
    });

</script>

