<?php

if (!function_exists('getLocation')) {
    function getLocation($id)
    {
        return \App\Models\StateCity::find($id)['name'];
    }
}
