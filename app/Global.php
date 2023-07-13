<?php

function fullUrl() {
	if (strpos(env('APP_URL'), 'https://') !== false)
        return str_replace('http://', 'https://', request()->fullUrl());
    else
    	return request()->fullUrl();
}

function previousUrl() {
	if (strpos(env('APP_URL'), 'https://') !== false)
        return str_replace('http://', 'https://', url()->previous());
    else
    	return url()->previous();
}

function laratables($className, $queryFn = null) {
    if(!$queryFn) {
        $queryFn = function($q) {return $q;};
    }

    $isDatatableAjax = request()->has('columns') && request()->has('order') && request()->has('search');
    if($isDatatableAjax) {
        $datatable = \Freshbitsweb\Laratables\Laratables::recordsOf($className, $queryFn);

        response($datatable, 200)
            ->header('Content-Type', 'application/json')
            ->send();

        // Stop execution after laratables response has been sent
        die();
    }
}
