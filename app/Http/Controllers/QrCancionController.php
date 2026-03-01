<?php

namespace App\Http\Controllers;

use App\Models\QrCancion;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCancionController extends Controller
{
   public function crearqr($id)
    {
        $cancion = QrCancion::findOrFail($id);
        $urlQr = "https://www.mismaestrosdevida.com/q/" . $cancion->slug;
        $fileName = "qr_" . $cancion->slug . ".png";

        return response()->streamDownload(function () use ($urlQr) {
            echo QrCode::format('png')
                ->size(500)             // Alta resolución para imprenta
                ->margin(1)             // Espacio de seguridad
                ->errorCorrection('H')  // Máxima legibilidad
                ->generate($urlQr);
        }, $fileName, ['Content-Type' => 'image/png']);
    }

    /**
     * Descarga todos los QR de la tabla en un archivo ZIP
     */
    public function descargarZip()
    {
        $zip = new ZipArchive;
        $zipFileName = 'qrs_imprenta_' . date('Y-m-d') . '.zip';
        $zipPath = storage_path($zipFileName);

        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            
            // Obtenemos todas las canciones de tu tabla 'cancions'
            $canciones = QrCancion::all();

            foreach ($canciones as $cancion) {
                $urlQr = "https://www.mismaestrosdevida.com/q/" . $cancion->slug;
                
                // Generamos el contenido del QR en alta resolución (500px / 3cm)
                $qrCode = QrCode::format('png')
                    ->size(500)
                    ->margin(1)
                    ->errorCorrection('H')
                    ->generate($urlQr);

                // Añadimos cada imagen al ZIP con un nombre descriptivo
                $zip->addFromString("qr_{$cancion->slug}.png", $qrCode);
            }

            $zip->close();
        }

        // Retornamos el ZIP y lo eliminamos del servidor tras la descarga
        return response()->download($zipPath)->deleteFileAfterSend(true);
    }
}
