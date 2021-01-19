<?php


namespace App\Support;


use Illuminate\Support\Arr;

class OpenApiToSpec
{
    public function __invoke(array $input)
    {
        return [
            'title' => Arr::get($input, 'info.title'),
            'version' => Arr::get($input, 'info.version'),
            'server' => Arr::get($input, 'servers.0.url'),
            'paths' => $this->getPaths($input['paths'] ?? []),
        ];
    }

    protected function getPaths(array $paths)
    {
        return collect($paths)->reduceWithKeys(function ($carry, $paths, $url) {
            $paths = collect($paths)->map(function ($path, $method) use ($url) {
                return [
                    'path' => $url,
                    'method' => $method,
                    'group' => Arr::get($path, 'tags.0'),
                    'summary' => Arr::get($path, 'summary'),
                    'description' => Arr::get($path, 'description'),
                    'parameters' => $this->getParameters($path['parameters'] ?? []),
                    'responses' => $this->getResponses($path['responses'] ?? []),
                ];
            })->values()->toArray();
            return [...$carry, ...$paths];
        }, []);
    }

    protected function getParameters(array $params)
    {
        return collect($params)->map(fn($param) => [
            'name' => $param['name'],
            'in' => $param['in'],
            'description' => $param['description'],
            'required' => $param['required'],
            'type' => Arr::get($param, 'schema.type', 'string'),
            'example' => Arr::get($param, 'schema.example', 'string'),
        ])->values()->toArray();
    }

    protected function getResponses(array $responses)
    {
        return collect($responses)->map(fn($resp,$code) => [
            'code' => $code,
            'description' => $resp['description'],
            'example' => Arr::get($resp,'content.application/json.example')
        ])->values()->toArray();
    }

}
