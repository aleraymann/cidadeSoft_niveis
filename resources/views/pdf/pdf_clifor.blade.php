<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cli_For.pdf</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        h2,
        h3,
        h4 {
            text-align: center;
        }

        label {
            margin-top: 10px;
            float: right;
        }

    </style>
</head>

<body>
    <div>
        <div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>
                                <h2>Cidadesoft_</h2>
                            </th>
                            <th>
                                <label>
                                    Data: {{ date('d/m/Y') }}<br>
                                    Hora: {{ date('H:i:s') }}</label> </th>
                        </tr>
                        <tr>
                            <th colspan="2">
                                {{ Auth::user()->name }} / {{ Auth::user()->email }}
                            </th>
                        </tr>
                    </thead>
                </table><br>
                <table>
                    <thead>
                        <tr>
                            <th>
                                <h3>Clientes e/ou Fornecedores Cadastrados no Sistema</h3>
                            </th>

                        </tr>
                    </thead>
                </table>
            </div>
            <div>

                <div>
                    <table>
                        <thead>
                            <tr>
                                <th class="">Cod</th>
                                <th class="">Nome Fantasia</th>
                                <th class="">Situação</th>
                                <th class="">Cadastro</th>
                                <th class="">Cliente/Fornecedor</th>
                                <th class="">Cod Admin</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($clifor as $cf)
                            @can('view_clifor', $cf)
                                <tr>
                                    <td> {{ $cf->Codigo }} </td>
                                    <td> {{ $cf->Nome_Fantasia }} </td>
                                    <td> {{ $cf->Ativo==1? "Ativo":"Inativo" }}
                                    </td>
                                    <td> {{ $cf->Data_Cadastro }} </td>
                                    @if( $cf->Tip=="C")
                                        <td> {{ $cf->Tip = "Cliente" }} </td>
                                    @elseif( $cf->Tip=="F")
                                        <td> {{ $cf->Tip = "Fornecedor" }} </td>
                                    @else
                                        <td> {{ $cf->Tip = "Ambos" }} </td>
                                    @endif
                                    <td> {{ $cf->user_id }} </td>
                                </tr>
                                @endcan
                            @endforeach
                        </tbody>
                    </table><br>
                    <table>
                        <tfoot>
                        <tr>
                            
                            <th>
                            <h4>
                            CIDADESOFT LTDA <br>CNPJ 09.324.429/0001-09
                            </h4>
                            </th>
                            <th>
                           <h4>
                           R. Brg. Rocha, 3028 - Bonsucesso, Guarapuava - PR, CEP: 85035-270
                           </h4> 
                            </th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>
</body>

</html>
