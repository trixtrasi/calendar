<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar documento Fênix V3</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&amp;display=swap" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />
    <!-- JS -->
    <script src="public/assets/vendor/ckeditor5/build/ckeditor.js"></script>

    <link rel="stylesheet" href="calendario.css">
    <?php
    include("Calendar.php");
    ?>

</head>

<body>
    <div id="content">
        <nav>
            <div id="menu">
                <div id="logo">
                    <div class="foto"></div>
                    <div class="circle">
                        <a href="javascript:void(0)" class="closebtn" onclick="sesamo()">
                            <div>.</div>
                        </a>
                    </div>
                </div>
                <div id="sidebar">
                    <ul class="list-unstyled components">
                        <li class="dash"> <a href="public/documentos/cadastrar"><img
                                    src=" public/media/icons/plus-circle.svg" />Cadastrar</a>
                        </li>

                        <li> <a href="public" aria-expanded="false"><img
                                    src="public/media/icons/chevron-double-up.svg" />Home</a>
                        </li>
                        <p class="submenu">Seções</p>


                        <!--DOCUMENTOS DE INTELIGÊNCIA-->
                        <a href="public/documentos/recebidos">
                            <li class="documentos"> <img
                                    src="public/media/icons/file-earmark-lock2-fill.svg" />Documentos
                            </li>
                        </a>


                        <!--INTELIGÊNCIA-->
                        <li> <a href="public/inteligencia" class="dropdown-toggle"><img
                                    src="public/media/icons/key-fill.svg" />Inteligência</a>

                        </li>

                        <!--CONTRAINTELIGÊNCIA-->
                        <li> <a href="public/contrainteligencia"><img
                                    src="public/media/icons/key.svg" />Contrainteligência</a>
                        </li>

                        <!--ADMINISTRAÇÃO-->
                        <li> <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle"><img
                                    src="public/media/icons/layers-fill.svg" />Administração</a>


                            <ul class="collapse list-unstyled" id="pageSubmenu2">
                                <li><a href="#">Cadastrar Missões</a> </li>
                                <li><a href="#">Minhas Missões</a> </li>
                            </ul>
                        </li>

                        <!--ENSINO-->
                        <li><a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle"><img
                                    src="public/media/icons/book-fill.svg" />Ensino</a>
                            <ul class="collapse list-unstyled" id="pageSubmenu5">
                                <li><a href="#" target="_blanck">tutorial sinesp</a></li>
                                <li><a href="#">Meus Cursos</a></li>
                                <li><a href="#">Cursos</a></li>
                                <li><a href="#">Links de interesse</a></li>
                            </ul>
                        </li>



                        <!--TECNOLOGIA DA INFORMAÇÃO-->
                        <li><a href="#pageSubmenu9" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle"><img
                                    src="public/media/icons/tablet-fill.svg" />T.I</a>
                            <ul class="collapse list-unstyled" id="pageSubmenu9">
                                <li><a href="">Abrir chamado</a></li>
                            </ul>
                        </li>

                        <!--ASSUNTOS CORRENTES-->
                        <li> <a href="public/racs/geral"><img
                                    src="public/media/icons/chevron-double-up.svg" />Assuntos
                                Correntes</a>
                        </li>

                        <!--GESTÃO ESTRATÉGICA-->
                        <li> <a href="#pageSubmenu12" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle"><img
                                    src="public/media/icons/bar-chart.svg" />Gestão
                                estratégica</a>
                            <ul class="collapse list-unstyled" id="pageSubmenu12">
                                <li><a href="#">Dashboard</a> </li>
                            </ul>
                        </li>

                        <!--PERFIL DO USUÁRIO-->
                        <p class="submenu">Interface do usuário</p>
                        <li><a href="#pageSubmenu6" data-toggle="collapse" aria-expanded="false"
                                class="dropdown-toggle"><img
                                    src="public/media/icons/person-fill.svg" />Usuário</a>
                            <ul class="collapse list-unstyled" id="pageSubmenu6">
                                <li><a href="#">Dados Cadastrais</a> </li>
                                <li><a href="#">Alteração de Senha</a></li>
                                <li><a href="#">Sair</a></li>
                            </ul>
                        </li>

                    </ul>
                    <div>
                    </div>
        </nav>
        <section id="main">
            <header id="navigation">
                <div style="display: flex">
                    <div class="circle2">
                        <a href="javascript:void(0)" class="closebtn" onclick="sesamo()">
                            <div>.</div>
                        </a>
                    </div>
                    <img width="25" src="public/media/icons/search.svg" />
                    <div class="flex-grow-1" style="flex-grow: 1!important;"></div>
                    <!-- Authentication -->
                    <form method="POST" action="public/logout">
                        <input type="hidden" name="_token" value="NmsJ2YQlhfMX1AzPWm8tlunf01HO6ACOuRaje6fg"> <a
                            class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                            href="public/logout" onclick="event.preventDefault();
                                                        this.closest('form').submit();"><img width="25"
                                src="public/media/icons/logout.svg" /></a>
                    </form>
                    <!-- Authentication -->
                </div>

            </header>
            <div id="section">

                <div id="MenuDocs" class="col1">
                    <ul>
                        <a href="public/documentos/cadastrar/81">
                            <li class="cad">Cadastrar Evento</li>
                        </a>
                        <a href="public/inteligencia/eventos">
                            <li class="cad">Eventos</li>
                        </a>
                        <a href="public/inteligencia/eventos/calendario">
                            <li class="cad">Calendário</li>
                        </a>
                    </ul>


                    <section id="conteudo">
                        <div class="row">
                            <!--CALENDÁRIO-->
                            <div class="calendar text-center col-lg-8" id="calendar">

                            </div>
                            <!--LISTA DE EVENTOS-->
                            <div class="event-list border-left col-lg-4" id="calendar-list">


                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
        <footer>
            Diretoria de Inteligência - PMPR - Todos os direitos Reservados - 2023
        </footer>
    </div>

    <script>
        const API_URL = 'calendar-handler.php';
        const calendarElement = document.getElementById('calendar');
        const eventListElement = document.getElementById('calendar-list');

        // Função genérica para realizar requisições POST
        async function postData(action, data = {}) {
            const formData = new FormData();
            formData.append('action', action);

            Object.entries(data).forEach(([key, value]) => {
                formData.append(key, value);
            });

            try {
                const response = await fetch(API_URL, {
                    method: 'POST',
                    body: formData,
                });

                if (!response.ok) {
                    throw new Error(`Erro na requisição: ${response.status}`);
                }

                return response.text();
            } catch (error) {
                console.error(`Erro ao processar a ação "${action}":`, error);
                return null;
            }
        }

        // Carregar calendário
        async function loadCalendar(year = null, month = null) {
            const data = {};
            if (year) data.year = year;
            if (month) data.month = month;

            const html = await postData('caledar', data);
            if (html) calendarElement.innerHTML = html;
        }

        // Carregar lista de eventos
        async function loadEventList(fullDate = getTodayDate()) {
            const html = await postData('list', {
                date: fullDate
            });
            if (html) eventListElement.innerHTML = html;
        }

        // Obter data de hoje formatada como "YYYY-MM-DD"
        function getTodayDate() {
            return new Date().toISOString().split('T')[0];
        }

        // Navegar por ano
        function navigateYear(direction, month) {
            loadCalendar(direction, month);
        }

        // Navegar por mês
        function navigateMonth(year, month) {
            loadCalendar(year, month);
        }

        // Inicializar o calendário na carga da página
        document.addEventListener('DOMContentLoaded', () => {
            loadCalendar(); // Carrega o calendário padrão
            loadEventList(getTodayDate()); // Carrega os eventos do dia atual
        });
    </script>

</body>

</html>
