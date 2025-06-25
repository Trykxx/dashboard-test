@php
    function sort_link($column, $label)
    {
        $sort = request('sort', 'id');
        $direction = request('direction', 'asc');
        $icon = '';

        if ($sort === $column) {
            $direction = $direction === 'asc' ? 'desc' : 'asc';
            $icon = $direction === 'asc' ? '↑' : '↓';
        } else {
            $direction = 'asc';
        }
        $url = request()->fullUrlWithQuery([
            'sort' => $column,
            'direction' => $direction,
        ]);
        return '<a href="' . $url . '">' . $label . ' ' . $icon . '</a>';
    }
@endphp
