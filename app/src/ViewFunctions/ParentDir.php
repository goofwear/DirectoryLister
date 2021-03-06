<?php

namespace App\ViewFunctions;

use Tightenco\Collect\Support\Collection;

class ParentDir extends ViewFunction
{
    /** @var string The function name */
    protected $name = 'parent_dir';

    /**
     * Get the parent directory for a given path.
     *
     * @param string $path
     *
     * @return string
     */
    public function __invoke(string $path)
    {
        $parentDir = dirname($_SERVER['SCRIPT_NAME']) . '/' . Collection::make(
            explode('/', $path)
        )->filter()->slice(0, -1)->implode('/');

        return '/' . ltrim($parentDir, '/');
    }
}
