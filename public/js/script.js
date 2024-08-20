$(document).ready(function () {

    var table = $('#examTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/peopleDataTable',
            data: function (d) {
                d.dateFilter = $('#dateFilter').val();
                d.tipoExameFilter = $('#tipoExameFilter').val();
                d.modalidadeFilter = $('#modalidadeFilter').val();
                d.searchBar = $('#searchBar').val();
            }
        },
        columns: [
            { data: 'patientID' },
            { data: 'nome' },
            { data: 'numAcesso' },
            { data: 'tipoExame' },
            { data: 'modalidade' },
            {
                data: 'data',
                render: function (data, type, row) {
                    if (data) {
                        var date = new Date(data);
                        var day = String(date.getDate()).padStart(2, '0');
                        var month = String(date.getMonth() + 1).padStart(2, '0'); // Mês em JavaScript é 0-11
                        var year = date.getFullYear();

                        if (type === 'display' || type === 'filter') {
                            return `${day}/${month}/${year}`;
                        } else {
                            return data; // Retorna a data em seu formato original para ordenação
                        }
                    }
                    return data;
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                    return '<a href="view.php?id=' + data.id + '" class="primary">Responder questionário</a>';
                }
            }
        ],
        "language": {
            "url": "js/Portuguese-Brasil.json",
            "paginate": {
                "previous": "teste",
                "next": "Próximo"
            },
        },
        "bFilter": false,
        "lengthChange": false,
    });


    $("#searchBar").on("keyup", function () {
        table.search(this.value).draw();
    });

    $('#dateFilter').on('keyup change', function () {
        table.draw();
    });

    $('#tipoExameFilter').on('keyup change', function () {
        table.search($(this).val()).draw();
    });

    $('#modalidadeFilter').on('keyup change', function () {
        table.search($(this).val()).draw();
    });
});

