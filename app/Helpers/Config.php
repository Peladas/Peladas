<?php

namespace App\Helpers;
use \Exception;

final class Config
{
    public static function getConfig(string $name, ?string $section = null): string
    {
        $configs = self::loadConfigs();

        $configValue = null;

        foreach ($configs as $firstLevelKey => $firstLevelValue) {
            if ($firstLevelKey === $name) {
                $configValue = $firstLevelValue;
                break;
            }

            if (gettype($firstLevelValue) === 'array') {
                foreach($firstLevelValue as $key => $value) {
                    if ($key === $name) {
                        $configValue = $value;
                        break 2;
                    }
                }
            }
        }

        if (!$configValue) {
            throw new Exception('Config not found');
        }

        return $configValue;
    }

    public static function getSection(string $section): array
    {
        return self::loadConfigs($section);
    }

    private static function loadConfigs(?string $section = null): array
    {
        $configs = parse_ini_file(__DIR__ . '/../../config/app.ini', true);

        if (!$section) return $configs;

        if (!isset($configs[$section])) {
            throw new Exception('Config section not found');
        }

        return $configs[$section];
    }
}
