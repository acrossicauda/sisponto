//exporte les données sélectionnées
var $table = $('#table');
$(function () {
    $('#toolbar').find('select').change(function () {
        $table.bootstrapTable('refreshOptions', {
            exportDataType: $(this).val()
        });
    });
})

var trBoldBlue = $("table");

$(trBoldBlue).on("click", "tr", function (){
    $(this).toggleClass("bold-blue");
});

function selectAllItems() {
    let btSelectAllItems = $('#btSelectAllItems').prop('checked') ?? false;
    $('.btSelectItem').prop('checked', btSelectAllItems)
}

function setFinanceiro(data) {
    $('#num_financeiro').val(data)
}

function openModal(id) {
    let csrf = document.querySelector('meta[name=csrf-token]').content
    fetch(`/api/financeiro/${id}`, {
        method: 'GET',
        dataType: 'json',
        Accept: 'application/json',
        headers: { 'X-CSRF-TOKEN': csrf }
    })
        .then((res) => {
            console.log(res)
        })
        .then((res) => {
            console.log(res)
        })
        .catch((error) => {
            console.error(error)
        })
}
