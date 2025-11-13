<?php

namespace App\Observers;

use App\Models\Restaurante;
use Illuminate\Support\Facades\Storage;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

class RestauranteObserver
{
    public function created(Restaurante $restaurante)
    {
        $this->generarQr($restaurante);
    }

    public function updated(Restaurante $restaurante)
    {
        $this->generarQr($restaurante);
    }

    protected function generarQr(Restaurante $restaurante)
    {
        if (!$restaurante->slug) return;

        $url = config('app.frontend_url') . "/carta/{$restaurante->slug}";
        $fileName = "qrs/{$restaurante->slug}.png";

        // Genera el QR en PNG usando Endroid QR Code
        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($url)
            ->size(300)
            ->margin(10)
            ->build();

        // Guarda en storage/public/qrs
        Storage::disk('public')->put($fileName, $result->getString());

        // Guarda la URL pública en el campo qr
        $restaurante->qr = asset("storage/{$fileName}");
        $restaurante->saveQuietly(); // evita loop infinito
    }
}
