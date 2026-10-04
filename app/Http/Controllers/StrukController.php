<?php

namespace App\Http\Controllers;

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class StrukController extends Controller
{
    /**
     * Cetak struk transaksi
     */
    public function struk()
    {
        $printerName = config('app.printer_name', env('POS_PRINTER_NAME', 'POS-58'));

        if (! $this->printerExists($printerName)) {
            return response()->json([
                'success' => false,
                'message' => "Printer '{$printerName}' tidak terpasang atau tidak terdeteksi di sistem. Pastikan printer sudah terinstall dan nama printer benar.",
            ], 500);
        }

        try {
            // 1. Koneksi ke Printer Windows
            $connector = new WindowsPrintConnector($printerName);
            $printer = new Printer($connector);

            // 2. Ambil Data Item
            $items = $this->getItems();

            // 3. Hitung Total
            $grandTotal = 0;

            foreach ($items as $item) {
                $grandTotal += $item['qty'] * $item['price'];
            }

            // 4. Header Toko
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->setEmphasis(true);

            $printer->text(strtoupper((string) config('app.name', 'SABU JAYA MART'))."\n");

            $printer->setEmphasis(false);
            $printer->text("Jl. Mastrip No. 164, Jember\n");
            $printer->text("Telp. 0812-3456-7890\n");
            $printer->text("--------------------------------\n");

            // 5. Informasi Transaksi
            $printer->setJustification(Printer::JUSTIFY_LEFT);

            $printer->text("No : TRX-20260916-001\n");
            $printer->text("Kasir: David\n");
            $printer->text("Tgl : " . date('d-m-Y H:i') . "\n");
            $printer->text("--------------------------------\n");

            // 6. Detail Barang
            foreach ($items as $item) {

                $subtotal = $item['qty'] * $item['price'];

                $printer->text($item['name'] . "\n");

                $printer->text(
                    $item['qty'] . " x " .
                    number_format($item['price'], 0, ',', '.')
                );

                $printer->text(
                    " = " .
                    number_format($subtotal, 0, ',', '.') .
                    "\n"
                );
            }

            // 7. Total
            $printer->text("--------------------------------\n");

            $printer->setEmphasis(true);

            $printer->text(
                "TOTAL : Rp " .
                number_format($grandTotal, 0, ',', '.') .
                "\n"
            );

            $printer->setEmphasis(false);

            // 8. Pembayaran
            $bayar = 100000;
            $kembalian = $bayar - $grandTotal;

            $printer->text(
                "BAYAR : Rp " .
                number_format($bayar, 0, ',', '.') .
                "\n"
            );

            $printer->text(
                "KEMBALI: Rp " .
                number_format($kembalian, 0, ',', '.') .
                "\n"
            );

            // 9. Footer
            $printer->text("--------------------------------\n");

            $printer->setJustification(Printer::JUSTIFY_CENTER);

            $printer->text("Terima Kasih Atas Kunjungan Anda\n");
            $printer->text("Selamat Berbelanja Kembali\n");

            // 10. Feed
            $printer->feed(3);

            // 11. Potong Kertas
            $printer->cut();

            // 12. Tutup Printer
            $printer->close();

            return "Struk berhasil dicetak.";

        } catch (\Exception $e) {

            return "Gagal mencetak struk: " . $e->getMessage();
        }
    }

    /**
     * Cek apakah printer sudah terpasang di Windows.
     */
    private function printerExists(string $printerName): bool
    {
        if (stripos(PHP_OS, 'WIN') !== 0) {
            return false;
        }

        $output = [];
        $result = 0;

        exec('wmic printer get name 2>NUL', $output, $result);

        if ($result !== 0 || empty($output)) {
            return false;
        }

        foreach ($output as $line) {
            $line = trim($line);

            if ($line === '' || stripos($line, 'Name') === 0) {
                continue;
            }

            if (strcasecmp(trim($line), trim($printerName)) === 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * Mengambil data item transaksi
     */
    private function getItems()
    {
        return [

            [
                'name' => 'Indomie Goreng',
                'qty' => 2,
                'price' => 3500,
            ],

            [
                'name' => 'Aqua 600ml',
                'qty' => 2,
                'price' => 4000,
            ],

            [
                'name' => 'Roti Coklat',
                'qty' => 1,
                'price' => 7500,
            ],

            [
                'name' => 'Teh Botol Sosro',
                'qty' => 2,
                'price' => 5000,
            ],

        ];
    }
}