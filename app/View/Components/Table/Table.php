<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Table extends Component
{
    public array $headers;
    /**
     * Create a new component instance.
     */
    public function __construct(array $headers)
    {
        // dd($this->formatHeaders($headers));
        $this->headers = $this->formatHeaders($headers);
    }

    private function formatHeaders(array $headers): array
    {   
        // dd($headers);
        return array_map(function ($header) {
            $name  = is_array($header) ? $header['name'] : $header;

            return [
                'name' =>  $name,
                'align' => $this->textAlignClasses($header['align'] ?? 'left'),
            ];
        },$headers);
    }

    private function textAlignClasses($align): string
    {
        return
            [
                'left' => 'text-left',
                'right' => 'text-right',
                'center' => 'text-center',
            ][$align] ?? 'text-left';
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.table');
    }
}
