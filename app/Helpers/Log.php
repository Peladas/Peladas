<?php

namespace App\Helpers;

class Log {
    public static function info(string $message): void {
        self::logMessage('INFO', $message);
    }

    public static function error(string $message): void {
        self::logMessage('ERROR', $message);
    }

    public static function warning(string $message): void {
        self::logMessage('WARNING', $message);
    }

    private static function logMessage(string $level, string $message): void {
        $formattedMessage = '[' . date('Y-m-d H:i:s') . '] [' . $level . '] ' . $message . PHP_EOL;
        $logPath = self::getLogPath();
        file_put_contents($logPath, $formattedMessage, FILE_APPEND | LOCK_EX);
    }

    private static function getLogPath(): string
    {
        // $logConfig = $this->getConfigSection('log');
        $path = Config::getConfig('log_path');
        $file = Config::getConfig('log_file');
        return __DIR__ . '/../../' . $path . '/' . $file;
    }
}
