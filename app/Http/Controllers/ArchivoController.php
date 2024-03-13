<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use ZipArchive;
use App\Models\InfoPersonal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */

	public function create(Request $request, $id)
	{
		return view('archivo.create', ['expediente_id' => $id]);
	}	

	public function descargarArchivos(Request $request)
    {
        // Obtener el ID del expediente de la solicitud
        $expedienteId = $request->input('expediente_id');

        // Obtener las rutas de los archivos PDF asociados al expediente
        $archivos = Storage::files('public/archivos/expediente' . $expedienteId);

        // Crear un archivo ZIP para almacenar los archivos
        $zipFileName = 'archivos_expediente_' . $expedienteId . '.zip';
        $zip = new ZipArchive;
        $zip->open(storage_path($zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE);

        // Agregar cada archivo al archivo ZIP
        foreach ($archivos as $archivo) {
            if (pathinfo($archivo, PATHINFO_EXTENSION) == 'pdf') {
                $archivoNombre = basename($archivo);
                $archivoContenido = Storage::get($archivo);
                $zip->addFromString($archivoNombre, $archivoContenido);
            }
        }

        // Cerrar el archivo ZIP
        $zip->close();

        // Devolver el archivo ZIP para su descarga
        return response()->download(storage_path($zipFileName))->deleteFileAfterSend(true);
    }
	
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InfoPersonal $infoPersonal)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
	public function edit($id)
	{
		return view('archivo.edit', ['expediente_id' => $id]);
	}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
