<?php
/* -----|||||----- * Textos Catalán * -----|||||----- */
return [
/* -*****- Utilidades -*****- */
	'utilidades' => 'Utilitats',
	'sistema'  => [
		'sistema' => 'Sistema',
		'actividades_empresariales' => [
			'nombre' => 'Activitats empresarials',
			'resumen' => 'Permet la definició de les diferents activitats empresarials en estimació directa, directa simplificada i estimació objectiva.',
			/* Campos */
			'campos' => [
				'id' => 'Id',
				'clave' => 'Clau',
				'tipoActividad' => 'Tipus d\'Activitat',
				'epigrafe' => 'Epígraf',
				'descripcion' => 'Descripció',
			],
		],
		'modulos_tributacion' => [
			'nombre' => 'Mòduls de Tributació',
			'resumen' => 'Consulta dels mòduls de tributació per exercici per a IVA. i IRPF Ens permet l\'accés a la consulta i modificació dels paràmetres legals.',
			/* Campos */
			'campos' => [
				'codigo' => 'Codi',
				'nombre' => 'Nom',
				'periodo' => 'Període',
			],
		],
		'indices_porcentajes_calculo' => [
			'nombre' => 'Índexs i percentatges de càlcul',
			'resumen' => 'Consulta i parametrització d\'índexs correctes d\'I.va., constants i percentatges i índexs d\'estimació objectiva.',
			/* Campos y Categorías */
			'categorias' => [
				'constantes_porcentajes' => 'Constants i Percentatges',
				'est_objetiva_modulos' => 'Estimació Objectiva Mòduls',
				'est_directa_simplificada' => 'Estimació Directa Simplificada',
				'est_directa_est_directa_simplificada' => 'Est Directa i Est Directa Simplificada',
				'indices_estimacion_objetiva' => 'Índexs Estimació Objectiva',
				'declaracion_anual_modelo_347' => 'Declaració anual model 347',
				'indices_correctores_iva' => 'Índexs Correctors IVA',
				'poblacion_mas_100000' => 'Població amb més de 100.000 habitants',
				'poblacion_entre_10000_100000' => 'Població entre 10.000 i 100.000 habitants',
				'poblacion_menos_10000' => 'Població amb menys de 10.000 habitants',
			],
			'campos' => [
				'indice1' => 'Percentatge sobre dades basi any',
				'indice2' => 'Percentatge sobre vendes trimestre',
				'indice3' => '% Despeses Fabric. Min. Constr',
				'indice4' => '% Despeses Comerc. Serv Agrar',
				'indice5' => '% Despeses Activ Professionals',
				'indice6' => '% Ingressos-Despeses deduïbles',
				'indice7' => 'Agricultors % Vendes trimestre',
				'indice8' => '% Despeses *dif *justif. *ED Professionals',
				'indice9' => 'Activitats incloses grups A i B',
				'indice10' => 'Activ exclusivament en grup A',
				'indice11' => 'Activ exclusivament en grup B',
				'indice12' => 'Acte-taxis poblac < 10.000 hbts',
				'indice13' => 'Acte-taxis poblac 10 - 10.000 hbts',
				'indice14' => 'Activitats fins a 2 mesos tempor',
				'indice15' => 'Activitats fins a 4 mesos tempor',
				'indice16' => 'Activitats fins a 6 mesos tempor',
				'indice17' => 'Índex corrector excés quantitats',
				'indice18' => 'A partir d\'Euros',
				'indice19' => 'Calles 1a i 2a categoria',
				'indice20' => 'Calles 3a i 4a categoria',
				'indice21' => 'Resta de carrers',
				'indice22' => 'Calles 1a i 2a categoria',
				'indice23' => 'Resta de carrers',
				'indice24' => 'Calles 1a i 2a categoria',
				'indice25' => 'Resta de carrers',
			],
		],
		'tipos_iva_igic' => [
			'nombre' => 'Tipus d\'IVA/IGIC',
			'resumen' => 'Permet afegir tipus d\'IVA així com la modificació dels existents.',
			/* Campos */
			'campos' => [
				'codigo' => 'Tipus',
				'nombre' => 'Descripció',
				'porcentajeIva' => '% IVA',
				'porcentajeRe' => '% RE',
				'adonIva' => 'A',
			],
		],
		'tipos_irpf' => [
			'nombre' => 'Tipus d\'IRPF',
			'resumen' => 'Permet afegir tipus d\'IRPF així com la modificació dels existents.',
			/* Campos */
			'campos' => [
				'codigo' => 'Tipus',
				'nombre' => 'Descripció',
				'porcentajeIrpf' => '% IRPF',
				'adonIva' => 'A',
			],
		],
		'operaciones_contables' => [
			'nombre' => 'Operacions Comptables',
			'resumen' => 'Definició d\'operacions comptables per a la distribució de despeses i ingressos. Permet afegir, modificar i eliminar tipus d\'ingressos i despeses i associar-los a les diferents columnes dels llibres registres.',
			/* Campos */
			'campos' => [
				'codigo' => 'Codi',
				'descripcion' => 'Descripció',
				'ingresoGasto' => 'Ingrés o Despesa',
				'columnaLibroRegistro' => 'Columna en el llibre de registre',
				'opcionesCalculoImpuestos' => 'Opcions càlcul impostos',
				'incluirEnModelo340' => 'Incloure en model 340',
				'incluirEnModelo347' => 'Incloure en model 347',
			],
		],
		'conceptos_contables' => [
			'nombre' => 'Conceptes Comptables',
			'resumen' => 'Definició de conceptes per a identificar els ingressos i despeses d\'una forma més senzilla.',
			/* Campos */
			'campos' => [
				'codigo' => 'Codi',
				'descripcion' => 'Descripció',
				'variables' => 'Variables',
			],
		],
		'formas_pago_cobro' => [
			'nombre' => 'Formes de pagament/cobrament',
			'resumen' => 'Permet la parametrització de les diferents formes de pagament i cobrament (transferències, girs bancaris, xec, etc...).',
			/* Campos */
			'campos' => [
				'codigo' => 'Codi',
				'descripcion' => 'Descripció',
			],
		],
	],
	'herramientas'  => [
		'herramientas' => 'Eines',
		'remuneracion_asientos' => [
			'nombre' => 'Remuneració de seients.',
			'resumen' => 'Assistent per a la remuneració de seients de vendes i compres. Li permetrà seleccionar el número inicial per a les factures emeses i rebudes i remunerarà els seients per data i document.',
		],
		'importacion_asientos_excel' => [
			'nombre' => 'Importació de seients des d\'Excel',
			'resumen' => 'Assistent per a la importació d\'anotacions al sistema des de fitxers Excel. Es requereix el format especificat per MICROAREA. Pots descarregar el model fent clic en aquest vincle.',
		],
		'asistente_copia_seguridad' => [
			'nombre' => 'Assistent de còpia de seguretat',
			'resumen' => 'Executa l\'assistent de còpia o restauració de dades de l\'aplicació.',
		],
		'comprobacion_nif_terceros' => [
			'nombre' => 'Comprovació NIF de tercers.',
			'resumen' => 'La finalitat d\'aquest servei és possibilitar la validació de les dades identificatives a efectes censals dels contribuents i facilitar així el correcte compliment de les obligacions tributàries.',
		],
		'seguimiento_lopd' => [
			'nombre' => 'Seguiment LOPD',
			'resumen' => 'Seguiment de les accions derivades de la GDPR imposada per la Unió Europea.',
			/* Campos */
			'campos' => [
				'id' => 'Id',
				'fecha' => 'Data',
				'usuario' => 'Usuari',
				'servidor' => 'Servidor',
				'ordenador' => 'Ordinador',
				'proceso' => 'Procés',
				'accion' => 'Acció',
				'mensaje' => 'Missatge',
			],
		],
	],
];
