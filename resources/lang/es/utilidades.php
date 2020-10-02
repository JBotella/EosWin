<?php
/* -----|||||----- * Textos Español * -----|||||----- */
return [
/* -*****- Utilidades -*****- */
	'utilidades' => 'Utilidades',
	'sistema'  => [
		'sistema' => 'Sistema',
		'actividades_empresariales' => [
			'nombre' => 'Actividades empresariales',
			'resumen' => 'Permite la definición de las distintas actividades empresariales en estimación directa, directa simplificada y estimación objetiva.',
		],
		'modulos_tributacion' => [
			'nombre' => 'Módulos de Tributación',
			'resumen' => 'Consulta de los módulos de tributación por ejercicio para IVA. e IRPF Nos permite el acceso a la consulta y modificación de los parámetros legales.',
			/* Campos */
			'campos' => [
				'codigo' => 'Código',
				'nombre' => 'Nombre',
				'periodo' => 'Periodo',
			],
		],
		'indices_porcentajes_calculo' => [
			'nombre' => 'Índices y porcentajes de cálculo',
			'resumen' => 'Consulta y parametrización de índices correctos de I.VA., constantes y porcentajes e índices de estimación objetiva.',
			/* Campos y Categorías */
			'categorias' => [
				'constantes_porcentajes' => 'Constantes y Porcentajes',
				'est_objetiva_modulos' => 'Estimación Objetiva Módulos',
				'est_directa_simplificada' => 'Estimación Directa Simplificada',
				'est_directa_est_directa_simplificada' => 'Est Directa y Est Directa Simplificada',
				'indices_estimacion_objetiva' => 'Índices Estimación Objetiva',
				'declaracion_anual_modelo_347' => 'Declaración anual modelo 347',
				'indices_correctores_iva' => 'Índices Correctores IVA',
				'poblacion_mas_100000' => 'Población con más de 100.000 habitantes',
				'poblacion_entre_10000_100000' => 'Población entre 10.000 y 100.000 habitantes',
				'poblacion_menos_10000' => 'Población con menos de 10.000 habitantes',
			],
			'campos' => [
				'indice1' => 'Porcentaje sobre datos base año',
				'indice2' => 'Porcentaje sobre ventas trimestre',
				'indice3' => '% Gastos Fabric. Min. Constr',
				'indice4' => '% Gastos Comerc. Serv Agrar',
				'indice5' => '% Gastos Activ Profesionales',
				'indice6' => '% Ingresos-Gastos deducibles',
				'indice7' => 'Agricultores % s/Ventas trimestre',
				'indice8' => '% Gastos dif justif. ED Profesionales',
				'indice9' => 'Actividades incluidas grupos A y B',
				'indice10' => 'Activ exclusivamente en grupo A',
				'indice11' => 'Activ exclusivamente en grupo B',
				'indice12' => 'Auto-taxis poblac < 10.000 hbts',
				'indice13' => 'Auto-taxis poblac 10 - 10.000 hbts',
				'indice14' => 'Actividades hasta 2 meses tempor',
				'indice15' => 'Actividades hasta 4 meses tempor',
				'indice16' => 'Actividades hasta 6 meses tempor',
				'indice17' => 'Índice corrector exceso cantidades',
				'indice18' => 'A partir de Euros',
				'indice19' => 'Calles 1ª y 2ª categoría',
				'indice20' => 'Calles 3ª y 4ª categoría',
				'indice21' => 'Resto calles',
				'indice22' => 'Calles 1ª y 2ª categoría',
				'indice23' => 'Resto calles',
				'indice24' => 'Calles 1ª y 2ª categoría',
				'indice25' => 'Resto calles',
			],
		],
		'tipos_iva_igic' => [
			'nombre' => 'Tipos de IVA/IGIC',
			'resumen' => 'Permite añadir tipos de I.V.A. así como la modificación de los existentes.',
			/* Campos */
			'campos' => [
				'codigo' => 'Tipo',
				'nombre' => 'Descripción',
				'porcentajeIva' => '% IVA',
				'porcentajeRe' => '% RE',
				'adonIva' => 'A',
			],
		],
		'tipos_irpf' => [
			'nombre' => 'Tipos de IRPF',
			'resumen' => 'Permite añadir tipos de I.R.P.F. así como la modificación de los existentes.',
			/* Campos */
			'campos' => [
				'codigo' => 'Tipo',
				'nombre' => 'Descripción',
				'porcentajeIrpf' => '% IRPF',
				'adonIva' => 'A',
			],
		],
		'operaciones_contables' => [
			'nombre' => 'Operaciones Contables',
			'resumen' => 'Definición de operaciones contables para la distribución de gastos e ingresos. Permite añadir, modificar y eliminar tipos de ingresos y gastos y asociarlos a las distintas columnas de los libros registros.',
			/* Campos */
			'campos' => [
				'codigo' => 'Código',
				'descripcion' => 'Descripción',
				'ingresoGasto' => 'Ingreso o Gasto',
				'columnaLibroRegistro' => 'Columna en el libro de registro',
				'opcionesCalculoImpuestos' => 'Columna en el libro de registro',
				'opcionesCalculoImpuestos' => 'Columna en el libro de registro',
				'incluirEnModelo340' => 'Incluir en modelo 340',
				'incluirEnModelo347' => 'Incluir en modelo 347',
			],
		],
		'conceptos_contables' => [
			'nombre' => 'Conceptos Contables',
			'resumen' => 'Definición de conceptos para identificar los ingresos y gastos de una forma más sencilla.',
			/* Campos */
			'campos' => [
				'codigo' => 'Código',
				'descripcion' => 'Descripción',
				'variables' => 'Variables',
			],
		],
		'formas_pago_cobro' => [
			'nombre' => 'Formas de pago/cobro',
			'resumen' => 'Permite la parametrización de las distintas formas de pago y cobro (transferencias, giros bancarios, cheque, etc...).',
			/* Campos */
			'campos' => [
				'codigo' => 'Código',
				'descripcion' => 'Descripción',
			],
		],
	],
	'herramientas'  => [
		'herramientas' => 'Herramientas',
		'remuneracion_asientos' => [
			'nombre' => 'Remuneración de asientos',
			'resumen' => 'Asistente para la remuneración de asientos de ventas y compras. Le permitirá seleccionar el número inicial para las facturas emitidas y recibidas y remunerará los asientos por fecha y documento.',
		],
		'importacion_asientos_excel' => [
			'nombre' => 'Importación de asientos desde Excel',
			'resumen' => 'Asistente para la importación de apuntes al sistema desde ficheros Excel. Se requiere el formato especificado por MICROAREA. Puedes descargar el modelo haciendo clic en este vínculo.',
		],
		'asistente_copia_seguridad' => [
			'nombre' => 'Asistente de copia de seguridad',
			'resumen' => 'Ejecuta el asistente de copia o restauración de datos de la aplicación.',
		],
		'comprobacion_nif_terceros' => [
			'nombre' => 'Comprobación NIF de terceros',
			'resumen' => 'La finalidad de este servicio es posibilitar la validación de los datos identificativos a efectos censales de los contribuyentes y facilitar así el correcto cumplimiento de las obligaciones tributarias.',
		],
		'seguimiento_lopd' => [
			'nombre' => 'Seguimiento LOPD',
			'resumen' => 'Seguimiento de las acciones derivadas de la GDPR impuesta por la Unión Europea.',
			/* Campos */
			'campos' => [
				'id' => 'Id',
				'fecha' => 'Fecha',
				'usuario' => 'Usuario',
				'servidor' => 'Servidor',
				'ordenador' => 'Ordenador',
				'accion' => 'Acción',
				'proceso' => 'Proceso',
				'mensaje' => 'Mensaje',
			],
		],
	],
];
