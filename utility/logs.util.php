<?php
    // фуи по созданию и просмотру логов

// проверка корректности имени файла логов
function checkLogName (string $logName) : bool {
        static $logRegExp = '/[0-9\-]{10}\.log/';
        return (bool) preg_match($logRegExp, $logName);
}
    // фуя записывающая запросы пользователся к конкретным страницам в лог
    function makesVisitLog () : bool {
        $filename = 'logs/authorise/' . date('Y-m-d') . '.log';
        $log = [
          'date' => date('H:i:s'),
          'userIP' => $_SERVER['REMOTE_ADDR'],
          'uri' => val($_SERVER['REQUEST_URI']),
          'method' => val($_SERVER['REQUEST_METHOD']),
          'referrer' => val($_SERVER['HTTP_REFERER'] ?? 'ALERT!'),
        ];
        $logStr = '';
        foreach ($log as $key => $chunk) {
            if ($key === 'referrer') {
                $logStr .= "$chunk\n";
            } else {
                $logStr .= "$chunk\t";
            }
        }
        return (bool) file_put_contents($filename, $logStr, FILE_APPEND);
    }
// cписок существующих логов в порядке от последенего по дате
    function showLogsList() : string {
        $logList = array_reverse(array_filter(scandir('logs/authorise'), 'checkLogName'));
        ob_start();
        echo '<div class="logs"><ul>';
            foreach($logList as $key => $log):
                $log = mb_substr($log, 0, 10);
                echo "<li><a href='/test/$log'>$log</a></li>";
            endforeach;
        return ob_get_clean();
    }
// содержание конкретного лога, начиная с последнего по времени запроса
    function showLogContent(string $logDate) : string {
        $logName = 'logs/authorise/' . $logDate . '.log';
        if ((bool) checkLogName($logName) and file_exists($logName)) {
            $logContent = array_reverse(file($logName));
            ob_start();
            echo '<div class="logcontent"><ol>';
            foreach ($logContent as $key => $logLine):
                    echo "<li>$logLine</li>";
            endforeach;
            echo '</ol></div><br><a href="/test">Return to logs list</a>';
            return ob_get_clean();
        } else {
            makesVisitLog();
            return 'Intruder! Your attempt was  noticed';
        }
    }
