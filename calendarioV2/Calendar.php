<?php
date_default_timezone_set('America/Sao_Paulo');

class Calendar
{
    private $year;
    private $month;

    private const WEEK_DAYS = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];

    public function __construct($year = null, $month = null)
    {
        $this->year = $year ?? date('Y');
        $this->month = $month ?? date('n');
    }

    /**
     * Obtém a quantidade de eventos por data
     */
    private function getNumberOfEventsByDate(): array
    {
        /**
         * ATENÇÃO
         * SUBSTITUA `$events` POR A PESQUISA NO dB
         */

        $events = [
            "2024-12-01" => 2,
            "2024-12-03" => 1,
            "2024-11-01" => 1,
            "2024-12-25" => 9,
        ];

        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);
        $eventCounts = [];

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $dateKey = sprintf("%04d-%02d-%02d", $this->year, $this->month, $day);
            $eventCounts[$day] = $events[$dateKey] ?? 0;
        }

        return $eventCounts;
    }

    public function getEventsOfTheDay($date)
    {
        //BUSCA EVENTOS DO DIA
        //SUBSTITUIR tudo POR QUERY AO DB
        //get $date eventes here

        $eventOfDb = [
            '2024-12-01' => [
                ['id' => 3, 'titulo' => 'Vidas negras importam', 'dataInicio' => '2024-11-01T09:00:00', 'dataFim' => '2024-11-01T12:23:00'],
                ['id' => 1, 'titulo' => 'protesto indigena', 'dataInicio' => '2024-11-01T02:00:00', 'dataFim' => '2024-11-01T03:00:00']
            ],

            '2024-12-03' => [
                ['id' => 2, 'titulo' => 'Fim da corrupção', 'dataInicio' => '2024-11-01T03:32:00', 'dataFim' => null]
            ],

            '2024-11-01' => [
                ['id' => 4, 'titulo' => 'Bruno Mars', 'dataInicio' => '2024-11-01T22:00:00', 'dataFim' => '2024-11-01T23:00:00']
            ],

            '2024-12-25' => [
                ['id' => 5, 'titulo' => 'Chegada do papai noel no shoping palladium', 'dataInicio' => '2024-12-25T02:00:00', 'dataFim' => '2024-12-25T03:00:00'],
                ['id' => 4, 'titulo' => 'Protesto do MST`', 'dataInicio' => '2024-12-25T03:00:00', 'dataFim' => '2024-12-25T03:30:00'],
                ['id' => 4, 'titulo' => 'Caminhada pela paz', 'dataInicio' => '2024-12-25T04:00:00', 'dataFim' => '2024-12-25T05:00:00'],
                ['id' => 4, 'titulo' => 'Troca de comando do 20°BPM', 'dataInicio' => '2024-12-25T05:50:00', 'dataFim' => '2024-12-25T07:00:00'],
                ['id' => 4, 'titulo' => 'Show do ElectricC"allBoys na pedreira paulo leminsky', 'dataInicio' => '2024-12-25T06:00:00', 'dataFim' => '2024-12-25T08:00:00'],
                ['id' => 4, 'titulo' => 'Pare de procastinar. Palestra motivacional', 'dataInicio' => '2024-12-25T12:40:00', 'dataFim' => '2024-12-25T15:00:00'],
                ['id' => 4, 'titulo' => 'Lorem ipsum dolor sit amenos', 'dataInicio' => '2024-12-25T16:00:00', 'dataFim' => '2024-12-25T17:00:00'],
                ['id' => 4, 'titulo' => 'Entrega de Viaturas e equipamentos militares aos necessitados', 'dataInicio' => '2024-12-25T17:00:00', 'dataFim' => '2024-12-25T19:40:00'],
                ['id' => 4, 'titulo' => 'Teste de mudanca de UNICODE', 'dataInicio' => '2024-12-25T22:30:00', 'dataFim' => '2024-11-01T23:00:00']
            ]
        ];

        if (array_key_exists($date, $eventOfDb)) {
            $event = $eventOfDb[$date];
            return $event; // Exibe os detalhes do evento correspondente à data
        }
        return null;
    }

    /**
     * Renderiza os dias da semana
     */
    private function renderWeekDays(): string
    {
        return implode('', array_map(fn($day) => "<div>{$day}</div>", self::WEEK_DAYS));
    }

    /**
     * Renderiza os dias do mês
     */
    private function renderDaysOfMonth(array $eventCounts, int $firstWeekday, int $daysInMonth): string
    {
        $output = str_repeat("<div class='empty'></div>", $firstWeekday);

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $dayLeadingZero = sprintf('%02d', $day);
            $fullDate = "{$this->year}-{$this->month}-{$dayLeadingZero}";
            $isToday = date('Y-m-d') === $fullDate ? 'id="today"' : '';
            $eventsBadge = $eventCounts[$day] > 0
                ? "<span class='events-badge events-badge-orangered'>{$eventCounts[$day]}</span>"
                : '';

            $output .= <<<HTML
                <a onclick="loadEventList('{$fullDate}')">
                    <div class="days" {$isToday}>
                        <span>{$day}</span>
                        {$eventsBadge}
                    </div>
                </a>
            HTML;
        }

        return $output;
    }

    /**
     * Renderiza o calendário
     */
    public function render(): string
    {
        $firstDayOfMonth = new DateTime("{$this->year}-{$this->month}-01");
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);
        $firstWeekday = $firstDayOfMonth->format('w');
        $eventCounts = $this->getNumberOfEventsByDate();

        ob_start();
?>

        <div id="calendar">
            <!-- Cabeçalho -->
            <header class="anos">
                <button class="ano" onclick="navigateYear(<?= ($this->year - 1) . ',' . $this->month ?>)">&#171;</button>
                <button class="ano thisYear"><?= $this->year ?></button>
                <button class="ano" onclick="navigateYear(<?= ($this->year + 1) . ',' . $this->month ?>)">&#187;</button>
            </header>

            <!-- Meses -->
            <div class="mesesDoAno">
                <?php for ($i = 1; $i <= 12; $i++): ?>
                    <button class="meses <?= $i == $this->month ? 'active' : '' ?>"
                        onclick="navigateMonth(<?= $this->year ?>, <?= $i ?>)">
                        <?= date('M', mktime(0, 0, 0, $i, 1, $this->year)) ?>
                    </button>
                <?php endfor; ?>
            </div>

            <!-- Dias da semana -->
            <div class="diasDaSemana">
                <?= $this->renderWeekDays() ?>
            </div>

            <!-- Dias do mês -->
            <div class="diasDoMes">
                <?= $this->renderDaysOfMonth($eventCounts, $firstWeekday, $daysInMonth) ?>
            </div>
        </div>

<?php
        return ob_get_clean();
    }
}
