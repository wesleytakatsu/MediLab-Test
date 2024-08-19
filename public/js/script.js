$(document).ready(function () {

    var table = $('#examTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/peopleDataTable',
            data: function(d) {
                d.dateFilter = $('#dateFilter').val();
                d.tipoExameFilter = $('#tipoExameFilter').val();
            }
        },
        columns: [
            { data: 'patientID' },
            { data: 'nome' },
            { data: 'numAcesso' },
            { data: 'tipoExame' },
            { data: 'modalidade' },
            { data: 'data' },
            {
                data: null,
                render: function (data, type, row) {
                    return '<a href="view.php?id=' + data.id + '" class="btn btn-primary btn-sm">Visualizar</a>';
                }
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json"
        },
        "bFilter": false,
        "lengthChange": false,
    });

    // var table = $('#examTable').DataTable();
    $("#searchBar").on("keyup", function () {
        table.search($(this).val()).draw();
    });

    $('#dateFilter').on('keyup change', function() {
        table.draw(); // Redesenha a tabela com o filtro aplicado
    });

    $('#tipoExameFilter').on('keyup change', function() {
        table.draw(); // Redesenha a tabela com o filtro aplicado
    });
});


// $("#searchBar").on("keyup", function () {
//     $('#examTable').DataTable().search(
//         $('#searchBar').val(),
//     ).draw();
// });

