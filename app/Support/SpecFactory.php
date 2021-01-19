<?php


namespace App\Support;


use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class SpecFactory
{

    public static function make(string $input)
    {
        $input = (array)Yaml::parse($input);

        return static::makeSpec($input ?? []);
    }

    public static function makeSpec(array $input)
    {
        $spec = Spec::make()->set([
            'title' => $input['title'] ?? $input['ti'] ?? '—',
            'version' => $input['version'] ?? $input['ve'] ?? '—',
            'server' => $input['server'] ?? $input['se'] ?? '—',
            'paths' => static::makePaths($input['paths'] ?? $input['pa'] ?? [])
        ]);

        return $spec;
    }

    public static function makePaths(array $paths): array
    {
        return collect($paths)->map(fn($path) => Path::make()->set([
            'method' => $path['method'] ?? $path['me'] ?? 'get',
            'path' => $path['path'] ?? $path['pa']  ?? '—',
            'group' => $path['group'] ?? $path['gr'] ?? 'base',
            'summary' => $path['summary'] ?? $path['su'] ?? '—',
            'description' => $path['description'] ?? $path['de'] ?? '—',
            'responses' => static::makeResponses($path['responses'] ?? $path['re'] ?? []),
            'parameters' => static::makeParameters($path['parameters'] ?? $path['pa'] ?? [])
        ]))->toArray();
    }

    public static function makeParameters(array $parameters): array
    {
        return collect($parameters)->map(fn($param) => Parameter::make()->set([
            'required' => $param['required'] ?? $param['re'] ?? true,
            'name' => $param['name'] ?? $param['na'] ?? '—',
            'description' => $param['description'] ?? $param['de'] ?? '—',
            'type' => $param['type'] ?? $param['ty'] ?? 'string',
            'example' => $param['example'] ?? $param['ex'] ?? null,
            'in' => $param['in'] ?? 'query',
        ]))->toArray();
    }

    public static function makeResponses(array $responses): array
    {
        return collect($responses)->map(fn($param) => Response::make()->set([
            'code' => $param['code'] ?? $param['co'] ?? 200,
            'description' => $param['description'] ?? $param['de'] ?? '—',
            'example' => $param['example'] ?? $param['ex'] ?? null,
        ]))->toArray();
    }
}
