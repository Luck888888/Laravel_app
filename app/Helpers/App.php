<?php

if (!function_exists("get_pagination_meta")) {
    /**
     * @param $object
     * @return array
     */
    function get_pagination_meta($object): array
    {
        return [
            'current_page' => $object->currentPage(),
            'from'         => $object->firstItem(),
            'to'           => $object->lastItem(),
            'last_page'    => $object->lastPage(),
            'path'         => $object->path(),
            'per_page'     => (int) $object->perPage(),
            "total"        => $object->total()
        ];
    }
}

