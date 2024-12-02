<?php
require_once 'Calendar.php';

function configuraData($alfa = null, $omega = null)
{
    $alfa = (!is_null($alfa)) ? date('H:i', strtotime($alfa)) : 'error';
    $omega = (!is_null($omega)) ? " até " . date('H:i', strtotime($omega)) : null;

    return $alfa . $omega;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? null;

    if ($action === 'caledar') {
        $year = $_POST['year'] ?? date('Y');
        $month = $_POST['month'] ?? date('n');
        $calendar = new Calendar($year, $month);
        echo $calendar->render();
    }

    if ($action === 'list') {
        $date = $_POST['date'] ?? null;

        if ($date) {
            // Simula eventos para a data fornecida
            $calendar = new Calendar();
            $eventList = $calendar->getEventsOfTheDay($date);

            $diaSeman_mes = date('d/m/Y', strtotime($date));
            echo "
             <h1 class='pl-0'>{$diaSeman_mes}</h1>
                <div class='table-responsive'>
                    <table>
                        <tr>
                            <td colspan='2'>
                                <a href='eventos/cadastro/{$date}' onclick='blackoutPag()' class='adicionar'>Adicionar Evento</a>
                            </td>
                        </tr>";

            if (!empty($eventList)) {
                foreach ($eventList as $event) {
                    echo "
                        <tr>
                            <th>" . configuraData($event['dataInicio'], $event['dataFim']) . "</th>
                            <td><a class='text-dark text-sm'>{$event['titulo']}</a></td>
                            <td class='icons_doc center'>
                                <div>
                                    <a href='eventos/{$event['id']}'>
                                        <img class='threeDotsIcon' width='20'>
                                    </a>
                                </div>
                            </td>
                        </tr>";
                }
            } else {
                echo '<tr ><td colspan="100%" class="text-center">Nenhum evento encontrado</td></tr>';
            }
            echo '</table></div>';
        }
    }
}
