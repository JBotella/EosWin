<?php
/* -----|||||----- * Textos Inglés * -----|||||----- */
return [
/* -*****- Utilidades -*****- */
	'utilidades' => 'Utilities',
	'sistema'  => [
		'sistema' => 'System',
		'actividades_empresariales' => [
			'nombre' => 'Business activities',
			'resumen' => 'It allows the definition of the different business activities in direct estimation, simplified direct and objective estimation.',
			/* Campos */
			'campos' => [
				'id' => 'Id',
				'clave' => 'Key',
				'tipoActividad' => 'Type of Activity',
				'epigrafe' => 'Epigraph',
				'descripcion' => 'Description',
			],
		],
		'modulos_tributacion' => [
			'nombre' => 'Taxation Modules',
			'resumen' => 'Consultation of the taxation modules by fiscal year for VAT. and Personal Income Tax It allows us access to the consultation and modification of the legal parameters.',
			/* Campos */
			'campos' => [
				'codigo' => 'Code',
				'nombre' => 'Name',
				'periodo' => 'Period',
			],
		],
		'indices_porcentajes_calculo' => [
			'nombre' => 'Indices and calculation percentages',
			'resumen' => 'Query and parameterization of correct I.VA. indices, constants and percentages and objective estimation indices.',
			/* Campos y Categorías */
			'categorias' => [
				'constantes_porcentajes' => 'Constants and Percentages',
				'est_objetiva_modulos' => 'Objective Estimation Modules',
				'est_directa_simplificada' => 'Simplified Direct Estimation',
				'est_directa_est_directa_simplificada' => 'Direct Estimation and Simplified Direct Estimation',
				'indices_estimacion_objetiva' => 'Objective Estimation Indices',
				'declaracion_anual_modelo_347' => 'Annual return model 347',
				'indices_correctores_iva' => 'VAT Corrective Indices',
				'poblacion_mas_100000' => 'Population with more than 100.000 inhabitants',
				'poblacion_entre_10000_100000' => 'Population between 10.000 and 100.000 inhabitants',
				'poblacion_menos_10000' => 'Population with less than 10.000 inhabitants',
			],
			'campos' => [
				'indice1' => 'Percentage on base year data',
				'indice2' => 'Percentage of quarter sales',
				'indice3' => '% Fabric Expenses. Min. Constr',
				'indice4' => '% Commercial Expenses Serv Agrar',
				'indice5' => '% Professional Activ Expenses',
				'indice6' => '% Income-Deductible expenses',
				'indice7' => 'Farmers % Sales quarter',
				'indice8' => '% Expenses diff justif. ED Professionals',
				'indice9' => 'Activities included groups A and B',
				'indice10' => 'Activ exclusively in group A',
				'indice11' => 'Activated exclusively in group B',
				'indice12' => 'Auto-taxis population <10.000 hbts',
				'indice13' => 'Auto-taxis population 10 - 10.000 hbts',
				'indice14' => 'Activities up to 2 months temp',
				'indice15' => 'Activities up to 4 months temp',
				'indice16' => 'Activities up to 6 months temp',
				'indice17' => 'Corrective index excess amounts',
				'indice18' => 'From Euros',
				'indice19' => '1st and 2nd category streets',
				'indice20' => '3rd and 4th category streets',
				'indice21' => 'Rest of streets',
				'indice22' => '1st and 2nd category streets',
				'indice23' => 'Rest of streets',
				'indice24' => '1st and 2nd category streets',
				'indice25' => 'Rest of streets',
			],
		],
		'tipos_iva_igic' => [
			'nombre' => 'VAT/IGIC rates',
			'resumen' => 'Allows adding types of VAT. as well as the modification of existing ones.',
			/* Campos */
			'campos' => [
				'codigo' => 'Type',
				'nombre' => 'Description',
				'porcentajeIva' => '% VAT',
				'porcentajeRe' => '% RE',
				'adonIva' => 'A',
			],
		],
		'tipos_irpf' => [
			'nombre' => 'Personal income tax types',
			'resumen' => 'Allows you to add types of personal income tax as well as the modification of existing ones.',
			/* Campos */
			'campos' => [
				'codigo' => 'Type',
				'nombre' => 'Description',
				'porcentajeIrpf' => '% IRPF',
				'adonIva' => 'A',
			],
		],
		'operaciones_contables' => [
			'nombre' => 'Accounting Operations',
			'resumen' => 'Definition of accounting operations for the distribution of expenses and income. It allows adding, modifying and eliminating types of income and expenses and associating them to the different columns of the record books.',
			/* Campos */
			'campos' => [
				'codigo' => 'Code',
				'descripcion' => 'Description',
				'ingresoGasto' => 'Income or Expense',
				'columnaLibroRegistro' => 'Column in the registry book',
				'opcionesCalculoImpuestos' => 'Options calculation taxes',
				'incluirEnModelo340' => 'Include in model 340',
				'incluirEnModelo347' => 'Include in model 347',
			],
		],
		'conceptos_contables' => [
			'nombre' => 'Accounting Concepts',
			'resumen' => 'Definition of concepts to identify income and expenses in a simpler way.',
			/* Campos */
			'campos' => [
				'codigo' => 'Code',
				'descripcion' => 'Description',
				'variables' => 'Variables',
			],
		],
		'formas_pago_cobro' => [
			'nombre' => 'Payment/collection methods',
			'resumen' => 'Allows the parameterization of the different forms of payment and collection (transfers, bank drafts, check, etc ...).',
			/* Campos */
			'campos' => [
				'codigo' => 'Code',
				'descripcion' => 'Description',
			],
		],
	],
	'herramientas'  => [
		'herramientas' => 'Tools',
		'remuneracion_asientos' => [
			'nombre' => 'Remuneration of entries',
			'resumen' => 'Assistant for the remuneration of sales and purchases entries. It will allow you to select the initial number for the invoices issued and received and will remunerate the entries by date and document.',
		],
		'importacion_asientos_excel' => [
			'nombre' => 'Import of entries from Excel',
			'resumen' => 'Wizard for importing notes to the system from Excel files. The format specified by MICROAREA is required. You can download the model by clicking this link.',
		],
		'asistente_copia_seguridad' => [
			'nombre' => 'Backup Wizard',
			'resumen' => 'Run the application data copy or restore wizard.',
		],
		'comprobacion_nif_terceros' => [
			'nombre' => 'Third party NIF verification',
			'resumen' => 'The purpose of this service is to enable the validation of the identification data for taxpayer census purposes and thus facilitate the correct compliance with tax obligations.',
		],
		'seguimiento_lopd' => [
			'nombre' => 'LOPD monitoring',
			'resumen' => 'Monitoring of actions derived from the GDPR imposed by the European Union.',
			/* Campos */
			'campos' => [
				'id' => 'Id',
				'fecha' => 'Date',
				'usuario' => 'User',
				'servidor' => 'Server',
				'ordenador' => 'Computer',
				'accion' => 'Action',
				'proceso' => 'Process',
				'mensaje' => 'Message',
			],
		],
	],
];
