<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Projeto Integrador 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <script src="https://kit.fontawesome.com/5bfbe55df5.js" crossorigin="anonymous"></script>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("carregando...");
                        $("#complemento").val("carregando...");
                        $("#bairro").val("carregando...");
                        $("#cidade").val("carregando...");
                        $("#uf").val("carregando...");
                        $("#estado").val("carregando...");
                        $("#regiao").val("carregando...");
                        $("#ibge").val("carregando...");
                        $("#gia").val("carregando...");
                        $("#ddd").val("carregando...");
                        $("#siafi").val("carregando...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#complemento").val(dados.complemento);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#estado").val(dados.estado);
                                $("#regiao").val(dados.regiao);
                                $("#ibge").val(dados.ibge);
                                $("#gia").val(dados.gia);
                                $("#ddd").val(dados.ddd);
                                $("#siafi").val(dados.siafi);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- Page Footer -->
        <footer class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
            @include('layouts.footer')
        </footer>
    </div>
</body>
<script>
// Função para aplicar a máscara de Data (DD/MM/AAAA)
function aplicarMascaraData(event) {
  let input = event.target;
  let value = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos
  if (value.length <= 2) {
    value = value.replace(/(\d{2})(\d*)/, '$1/$2'); // Mascara no formato DD/
  } else if (value.length <= 4) {
    value = value.replace(/(\d{2})(\d{2})(\d*)/, '$1/$2/$3'); // Mascara no formato DD/MM/
  } else {
    value = value.replace(/(\d{2})(\d{2})(\d{4})/, '$1/$2/$3'); // Mascara no formato DD/MM/AAAA
  }
  input.value = value;
}

// Função para aplicar a máscara de RG
function aplicarMascaraRG(event) {
  let input = event.target;
  let value = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos
  if (value.length <= 9) {
    value = value.replace(/(\d{1,2})(\d{1,3})(\d{1,3})/, '$1.$2.$3'); // Mascara no formato XX.XXX.XXX
  }
  input.value = value;
}

// Função para aplicar a máscara de CPF
function aplicarMascaraCPF(event) {
  let input = event.target;
  let value = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos
  if (value.length <= 11) {
    value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{1})/, '$1.$2.$3-$4'); // Mascara no formato XXX.XXX.XXX-XX
  }
  input.value = value;
}

// Função para aplicar a máscara de WhatsApp
function aplicarMascaraWhatsApp(event) {
  let input = event.target;
  let value = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos
  if (value.length <= 11) {
    value = value.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3'); // Mascara (XX) XXXXX-XXXX
  }
  input.value = value;
}

// Função para aplicar a máscara de CEP
function aplicarMascaraCEP(event) {
  let input = event.target;
  let value = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos
  if (value.length <= 5) {
    value = value.replace(/(\d{5})(\d*)/, '$1-$2'); // Mascara no formato XXXXX-XXX
  } else {
    value = value.replace(/(\d{5})(\d{3})/, '$1-$2'); // Completa a máscara
  }
  input.value = value;
}

// Função para aplicar a máscara de Telefone
function aplicarMascaraTelefone(event) {
  let input = event.target;
  let value = input.value.replace(/\D/g, ''); // Remove caracteres não numéricos
  if (value.length <= 10) {
    value = value.replace(/^(\d{2})(\d{4})(\d{4})$/, '($1) $2-$3'); // Mascara (XX) XXXX-XXXX
  } else if (value.length === 11) {
    value = value.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3'); // Mascara (XX) XXXXX-XXXX
  }
  input.value = value;
}

// Aplicando as máscaras nos inputs
document.getElementById('birthday').addEventListener('input', aplicarMascaraData);
document.getElementById('rg').addEventListener('input', aplicarMascaraRG);
document.getElementById('cpf').addEventListener('input', aplicarMascaraCPF);
document.getElementById('whatsapp').addEventListener('input', aplicarMascaraWhatsApp);
document.getElementById('cep').addEventListener('input', aplicarMascaraCEP);
document.getElementById('phonecel').addEventListener('input', aplicarMascaraTelefone);

</script>
</html>
