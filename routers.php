<?php 
	global  $routes;

	$routes = array();

	$routes['/loja/{slug}'] = "/brands_view/view_visit/:slug";
	$routes['/about_view/{slug}'] = "/brands_view/about_brand_visit/:slug";
	$routes['/contact_view/{slug}'] = "/brands_view/contact_brand_visit/:slug";