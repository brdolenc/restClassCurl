<?php

	include 'rest.class.php';
	$api = new restCurl("user_key","pass_key");
	
	//METHO GET
	$get = $api::get('URL/api/get');
	var_dump($get);

	//METHO POST
	$obj_cadastro_post = '{
							    "search_int": 2,
							    "search_char": "Categoria",
							    "fields" : {
							    	"nome": "Meu nome",
							    	"sexo": "Masculino",
							    	"Idade": "Idade"
							    }
						    }';

	$post = $api::post('URL/api/post', $obj_cadastro_post);
	var_dump($post);

	//METHO PUT
	$obj_cadastro_put = '{
						    "search_int": 1,
						    "search_char": "Categoria nova",
						    "fields" : {
						    	"nome": "Meu nome novo",
						    	"sexo": "Masculino"
						    }
					    }';

	$put = $api::put('URL/api/put/id/1', $obj_cadastro_put);
	var_dump($put);

	//METHO DELETE
	$del = $api::delete('URL/api/del/id/1');
	var_dump($del);

	














































