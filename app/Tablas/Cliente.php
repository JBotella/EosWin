<?php
namespace App\Tablas;
use Illuminate\Database\Eloquent\Model;
use DB;

class Cliente extends Model
{
	protected $connection= 'sqlsrv2';
    protected $table = 'ClientesTabla';
	//protected $primaryKey = 'CliCodigo';
	public $timestamps = false;
	
	/*protected $fillable = [
        'CliCodigo', 'CliNombre', 
    ];*/
	/* Permitir la creación masiva sin especificar los campos en $fillable */
	protected $guarded = [];
	
	public function listadoCompleto($variables = NULL){
		$filtroConsulta = '';
		/* Variables de filtro */
		if(isset($variables)){
			$variables = json_decode($variables);
			if(isset($variables->busqueda)){
				$busqueda = $variables->busqueda;
				$filtroConsulta .= " WHERE (CliCodigo LIKE '%".$busqueda."%' OR CliNombre LIKE '%".$busqueda."%' OR CliCif LIKE '%".$busqueda."%' OR CliEMail LIKE '%".$busqueda."%') ";
			}
			if(isset($variables->orden) and isset($variables->direccion)){
				$orden = $variables->orden;
				$direccion = $variables->direccion;
				$filtroConsulta .= " ORDER BY '".$orden."' ".$direccion." ";
			}
		}
		/* ... */
		$clienteCompleto = DB::connection($this->connection)->select("SELECT *, (SELECT TOP 1 TELETELEFONO FROM [TELEFON] WHERE TELECODIGO = ClientesTabla.CliCodigo) AS Telefono FROM ClientesTabla ".$filtroConsulta." ;");
		return $clienteCompleto;
	}
	public function listadoReporte(){
		/* Subconsulta para Teléfono en el caso de contener dicha columna */
		$telefono = "(SELECT TOP 1 TELETELEFONO FROM [TELEFON] WHERE TELECODIGO = ClientesTabla.CliCodigo) AS 'Telefono'";
		/* Columnas activas para configurar el Select */
		$columnasSelect = " *, ".$telefono;
		$clienteReporte = DB::connection($this->connection)->select("SELECT ".$columnasSelect." FROM ClientesTabla ;");
		return $clienteReporte;
	}
	public function datos($CliCodigo){
		$cliente = Cliente::where('CliCodigo',$CliCodigo)->first();
		return $cliente;
	}
	public function telefonos(){
		$telefonos = DB::connection($this->connection)->table('TELEFON');
		return $telefonos;
	}
	public function telefonosCliente($CliCodigo){
		$telefonos = $this->telefonos()->where('TELECODIGO',$CliCodigo);
		return $telefonos;
	}
	public function guarda($id = null,$request){
		/* Asignarles valor = '' a los nulos */
		$camposRequestComunes = [
			'CliNombre' => $request->nombre,
			'CliApellido1' => $request->apellido1 ?? '',
			'CliApellido2' => $request->apellido2 ?? '',
			'CliNomComercial' => $request->organizacion ?? '',
			'CliCif' => $request->nif,
			'CliEMail' => $request->email,
			'CliTipoVia' => $request->tipoVia,
			'CliDireccion' => $request->direccion,
			'CliDireccionNumero' => $request->numero ?? '',
			'CliDireccionPiso' => $request->piso ?? '',
			'CliDireccionPuerta' => $request->puerta ?? '',
			'CliCodPostal' => $request->cp,
			'CliCodPostalLocali' => $request->localidad,
			'CliCodPostalProvin' => $request->provincia,
			'CliCodPostalPais' => $request->pais,
		];
		if(isset($id)){
			// Update
			$this->where("CliCodigo",$id)->update($camposRequestComunes);
			$cliente = $id;
			/* Modificar Telefonos */
			$this->grabaTelefonos('update',$cliente,$request->telefono,$request->tipoTelefono);
		}else{
			// Calcular el último CliCodigo para sumarle 1
			$lastId = $this->orderBy('CliCodigo', 'desc')->first()->CliCodigo;
			$nextId = str_pad(intval($lastId)+1, 10, '0', STR_PAD_LEFT);
			// Insert
			$camposRequestComunes += ['CliCodigo' => $nextId];
			$this->create($camposRequestComunes);
			$cliente = $nextId;
		}
		/* Crear Telefonos */
		if($request->nuevoTelefono){
			$this->grabaTelefonos('insert',$cliente,$request->nuevoTelefono,$request->nuevoTipoTelefono);
		}
	}
	public function grabaTelefonos($accion,$cliente,$numerosTelefono,$tiposTelefono){
		$arrayCreaTelefonos = [];
		foreach($numerosTelefono as $item => $telefono){
			if(array_key_exists($item,$tiposTelefono)){
				$tipoTelefono = $tiposTelefono[$item];
			}else{
				$tipoTelefono = '';
			}
			array_push($arrayCreaTelefonos,[
				'TELECODIGO' => $cliente,
				'TELEFAX' => $tipoTelefono,
				'TELETELEFONO' => $telefono,
			]);
			if($accion == 'update'){
				$telefonos = $this->telefonos();
				$arrayModificaTelefono = [
					'TELEFAX' => $tipoTelefono,
					'TELETELEFONO' => $telefono,
				];
				$telefonos->where("ID",$item)->update($arrayModificaTelefono);
			}
		}
		if($accion == 'insert'){
			$telefonos = $this->telefonos();
			$telefonos->insert($arrayCreaTelefonos);
		}
	}
	public function borra($lineas){
		$this->whereIn('CliCodigo', $lineas)->delete();
	}
}
