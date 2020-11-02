<?php
    include_once ('utility/config.util.php');
    // фуи по созданию и просмотру логов
    // $GLOBALS['logRegExp'] = '/[0-9\-]{10}\.log$/'; // глобаль для проверки имен файлов с логами

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

    function checkLogName (string $logName) : bool {
        static $logRegExp = '/[0-9\-]{10}\.log$/';
        // return (bool) preg_match($GLOBALS['logRegExp'], $logName);
        return (bool) preg_match($logRegExp, $logName);
    }
// cписок существующих логов в порядке от последенего по дате
    function showLogsList() : string {
        $logList = array_reverse(array_filter(scandir('logs/authorise'), 'checkLogName'));
        ob_start();
        echo '<div class="logs"><ul>';
            foreach($logList as $key => $log):
                // echo "<li><a href='index.php?point=logs&datelog=$log'>$log</a></li>";
                echo "<li><a href='index.php?point=logs&datelog=$log'>$log</a></li>";
            endforeach;
        echo '</ul></div><br><a href="/">Return to main page</a>';
        return ob_get_clean();
    }
// содержание конкретного лога, начиная с последнего по времени запроса
    function showLogContent(string $logName) : string {
        if ((bool) checkLogName($logName) and file_exists($logName)) {
            $logContent = array_reverse(file($logName));
            ob_start();
            echo '<div class="logcontent"><ol>';
            foreach ($logContent as $key => $logLine):
                if ((bool) preg_match('@\t[\w/]+\.php(\?id=\d{1,9})?\t(GET|POST)\t@', $logLine)) {
                    echo "<li>$logLine</li>";
                } else {
                    echo "<li style='background-color: crimson'>$logLine</li>";
                }
            endforeach;
            // echo '</ol></div><br><a href="index.php?point=logs">Return to logs list</a>';
            echo '</ol></div><br><a href="index.php?point=logs">Return to logs list</a>';
            return ob_get_clean();
        } else {
            makesVisitLog();
            return 'Intruder! Your attempt was  noticed';
        }
    }
