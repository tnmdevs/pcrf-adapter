<?php
if (!function_exists('pcrf_package_path')) {
    function pcrf_package_path(?string $path = ''): string
    {
        return sprintf('%s/%s', __DIR__, $path);
    }
}
