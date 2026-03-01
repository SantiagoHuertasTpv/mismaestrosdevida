<?php

namespace App\Http\Controllers;

use App\Models\QrCancion;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use ZipArchive;

class QrCancionController extends Controller
{
    public function crearqr($id)
    {
        // 1. Buscamos la canción
        $cancion = QrCancion::findOrFail($id);
        $urlQr = "https://www.mismaestrosdevida.com/q/" . $cancion->slug;

        // 2. LIMPIEZA ABSOLUTA: Borramos cualquier eco o error previo en el servidor
        if (ob_get_length()) ob_end_clean();

        // 3. Generamos el QR
        $qrCode = QrCode::format('png')
            ->size(500)
            ->margin(1)
            ->errorCorrection('H')
            ->generate($urlQr);

        // 4. Respuesta manual para saltarnos bloqueos de Laravel
        return response($qrCode)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'attachment; filename="qr_' . $cancion->id . '_' . $cancion->nombre . '.png"');
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
                $zip->addFromString("{$cancion->id}_qr_{$cancion->nombre}.png", $qrCode);
            }

            $zip->close();
        }

        // Retornamos el ZIP y lo eliminamos del servidor tras la descarga
        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

    public function descargarZipPorCapitulo()
    {
        $zip = new ZipArchive;
        $zipFileName = 'QR_Libro_Organizado_' . date('Y-m-d') . '.zip';
        $zipPath = storage_path($zipFileName);

        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {

            // Obtenemos todas las canciones ordenadas por capítulo
            $canciones = QrCancion::orderBy('idcapitulo')->get();

            foreach ($canciones as $cancion) {
                $urlQr = "https://www.mismaestrosdevida.com/q/" . $cancion->slug;

                // Generamos el QR en alta resolución (500px)
                $qrCode = QrCode::format('png')
                    ->size(500)
                    ->margin(1)
                    ->errorCorrection('H') // Seguridad máxima para la imprenta
                    ->generate($urlQr);

                // Definimos el nombre de la carpeta basado en el ID del capítulo
                $carpeta = $cancion->idcapitulo ? "Capitulo_" . $cancion->idcapitulo : "Sin_Capitulo";

                // Añadimos el archivo al ZIP dentro de su carpeta correspondiente
                $zip->addFromString("{$carpeta}/{$cancion->id}_qr_{$cancion->nombre}.png", $qrCode);
            }

            $zip->close();
        }

        // Limpiamos buffer antes de enviar
        if (ob_get_length()) ob_end_clean();

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }
}
