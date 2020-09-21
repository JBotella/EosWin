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
			/* Campos para tabla y formulario */
			'campos' => [
				'codigo' => 'Código',
				'nombre' => 'Nombre',
				'periodo' => 'Periodo',
			],
		],
		'indices_porcentajes_calculo' => [
			'nombre' => 'Índices y porcentajes de cálculo',
			'resumen' => 'Consulta y parametrización de índices correctos de I.VA., constantes y porcentajes e índices de estimación objetiva.',
		],
		'tipos_iva_igic' => [
			'nombre' => 'Tipos de IVA/IGIC',
			'resumen' => 'Permite añadir tipos de I.V.A. así como la modificación de los existentes.',
			/* Campos para tabla y formulario */
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
			/* Campos para tabla y formulario */
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
			/* Campos para tabla y formulario */
			'campos' => [
				'codigo' => 'Código',
				'descripcion' => 'Descripción',
				'ingreso-gasto' => 'Ingreso o Gasto',
				'columna-libro-registro' => 'Columna en el libro de registro',
			],
		],
		'conceptos_contables' => [
			'nombre' => 'Conceptos Contables',
			'resumen' => 'Definición de conceptos para identificar los ingresos y gastos de una forma más sencilla.',
			/* Campos para tabla y formulario */
			'campos' => [
				'codigo' => 'Código',
				'descripcion' => 'Descripción',
			],
		],
		'formas_pago_cobro' => [
			'nombre' => 'Formas de pago/cobro',
			'resumen' => 'Permite la parametrización de las distintas formas de pago y cobro (transferencias, giros bancarios, cheque, etc...).',
			/* Campos para tabla y formulario */
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
			/* Campos para tabla y formulario */
			'campos' => [
				'id' => 'Id',
				'fecha' => 'Fecha',
				'usuario' => 'Usuario',
				'servidor' => 'Servidor',
				'ordenador' => 'Ordenador',
				'proceso' => 'Proceso',
				'mensaje' => 'Mensaje',
			],
		],
	],
];
