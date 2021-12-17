<?php
if (!function_exists('package_path')) {
    function package_path(?string $path = ''): string
    {
        return sprintf('%s/%s', __DIR__, $path);
    }
}
