<?php


namespace App\Support;


use Illuminate\Support\Collection;

class SpecToOpenApi
{
    public function __invoke(Spec $spec): array
    {
        return [
            'openapi' => '3.0.0',
            'info' => [
                'title' => $spec->title,
                'version' => $spec->version,
            ],
            'servers' => [
                [
                    'url' => $spec->server
                ],
            ],
            'paths' => collect($spec->paths)
                ->groupBy(fn(Path $path) => $path->path)
                ->mapWithKeys(
                    fn(Collection $pathGroup, $key) => [str_replace("//","/",'/' . $key) => $pathGroup->mapWithKeys(
                        fn(Path $path) => [$path->method => $this->pathToArray($path)]
                    )]
                )
                ->toArray()
        ];
    }

    public function pathToArray(Path $path)
    {
        return [
            'tags' => [$path->group],
            'summary' => $path->summary,
            'description' => $path->description,
            'parameters' => $this->formatParams($path),
            'responses' => $this->formatResponses($path)
        ];
    }

    protected function normalizeType($type)
    {
        if ($type === 'file') {
            return 'string';
        }

        return $type;
    }

    /**
     * @param Path $path
     * @return Collection
     */
    protected function formatResponses(Path $path): Collection
    {
        return collect($path->responses)->mapWithKeys(fn(Response $response) => [$response->code => [
            'description' => $response->description,
            'content' => [
                'application/json' => [
                    'example' => $response->example
                ]
            ]
        ]]);
    }

    /**
     * @param Path $path
     * @return Collection
     */
    protected function formatParams(Path $path): Collection
    {
        return collect($path->parameters)->map(
            fn(Parameter $parameter) => [
                    'name' => $parameter->name,
                    'in' => $parameter->in,
                    'description' => $parameter->description,
                    'required' => $parameter->required,
                    'schema' => [
                        'type' => $this->normalizeType($parameter->type),
                        'example' => $parameter->example,
                    ]
                ] + ($parameter->in !== 'path' ? ['style' => 'form'] : [])
        );
    }
}
