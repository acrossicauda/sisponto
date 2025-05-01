
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">{{ $title ?? 'Nota Fiscal' }}</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="col-8"></div>
            <div class="col-8"></div>
            <div class="col-8">
                <label for="">Enviar Nota Fiscal</label>
                <x-buttons.upload></x-buttons.upload>
            </div>
        </div>
    </div>
</div>
