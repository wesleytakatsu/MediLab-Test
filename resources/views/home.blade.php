<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Exames Médicos</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body class="bg-secondary">

    <div class="d-flex corpoflex">
        <!-- Sidebar -->
        <div class="sidebar">
            <img src="{{ asset('images/logo-anamnese.png') }}" alt="Logo">
            {{-- se não estiver logado mostra um link para /login --}}
            @if (!Auth::check())
                <button class="btn bg-dark text-white btn-sm button-auth"
                    onclick="window.location.href='{{ route('login') }}'"  style="margin-top: 20px;">Entrar</button>
            @else
                <p style="margin-top: 20px;">Bem vindo(a), <span class="text-info">{{ Auth::user()->person->nome }}</span></p>
                {{-- mostra um botão para /logout bootstrap 1 de largura auth()->logout()--}}
                <button class="btn bg-dark text-white btn-sm button-auth"
                    onclick="window.location.href='{{ route('logout') }}'" style="margin-top: 20px;">Sair</button>
            @endif
        </div>

        <!-- Main Content -->
        <div class="container">
            <h2 class="my-4">Título</h2>
            <div class="table-responsive table-wrapper" style="margin-top: 20px;">
                <div class="row">
                    <div class="col-md-2">
                        <input type="date" class="form-control" id="dateFilter" placeholder="YYYY-MM-DD">
                    </div>


                    <div class="col-md-2 input-group">
                        <select class="form-control" id="modalidadeFilter">
                            <option selected>Escolha a modalidade</option>
                            <option value="1">Modalidade 1</option>
                            <option value="2">Modalidade 2</option>
                            <option value="3">Modalidade 3</option>
                        </select>

                    </div>

                    <div class="col-md-2 input-group">
                        <select class="form-control" id="tipoExameFilter">
                            <option selected>Escolha o filtro</option>
                            <option value="MAMO">MAMO</option>
                            <option value="RX ANTEBRACO AP E PERFIL">RX ANTEBRACO AP E PERFIL</option>
                            <option value="CRANIO SEQUENCIAL ADULT">CRANIO SEQUENCIAL ADULT</option>
                            <option value="RM CRANIO">RM CRANIO</option>
                            <option value="RM COL CERVICAL C1-C7">RM COL CERVICAL C1-C7</option>
                            <option value="ABDOMEN">ABDOMEN</option>
                            <option value="SHOULDER">SHOULDER</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="searchBar" placeholder="Pesquisar...">
                            <div class="input-group-text">
                                <i class="bi bi-search"></i>
                            </div>
                        </div>
                    </div>
                </div>


                <table id="examTable" class="table table-striped table-bordered" style="margin-top: 20px;">
                    <thead>
                        <tr>
                            <th>ID Paciente</th>
                            <th>Paciente</th>
                            <th>Número</th>
                            <th>Tipo de Exame</th>
                            <th>Modalidade</th>
                            <th>Data</th>
                            <th>Visualização</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dados serão carregados via Ajax -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
