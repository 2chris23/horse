<?php

namespace App\Http\Controllers;

use PDF;
use function view;

//use Knp\Snappy\Pdf;
//use Barryvdh\Snappy\
//use  Barryvdh\Snappy\Facades\SnappyPdf as SnappyPDF;

class PdfController extends Controller
{
    //
    public function Snappy()
    {
        /*
        if ($this->VersionSo() == 32) {

            $snappy = new \Knp\Snappy\Pdf(app_path() . '/vendor/h4cc/wkhtmltopdf-i386/bin/wkhtmltopdf-i386');
        } else {
            $snappy = new \Knp\Snappy\Pdf(app_path() . '/vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64');
        }
        return $snappy;
        */

    }

    public function VersionSo()
    {
        if (2147483647 == PHP_INT_MAX) {
            $architecture = 'i386';
            return 32;
        } else {
            $architecture = 'amd64';
            return 64;
        }
    }

    Public function GenerarPdfFromHtml($html = null)
    {

        /*
         $pdf =$this->Snappy();
        $pdf->generateFromHtml('', '/tmp/out/test.pdf', ['header-html' => $header, 'footer-html' => $footerPath], true);


        //$pdf = $this->Snappy();

        //$t = $pdf->generateFromHtml($html);
        //$t = $pdf->getOutputFromHtml($html);
        return $t;
        */

    }

    public function SalidaPdf($vista, $datos)
    {
        $pdf = PDF::loadView($vista, $datos);
        $ds = $pdf->stream('file.pdf');
        return $ds;
    }

    public function SalidaMailPdf($vista, $datos)
    {
        $r = view($vista, $datos)->render();
        /*
        echo $r;
        exit();
        dd($r);
        */
        //$pdf = PDF::loadView($vista, $datos);
        $pdf = PDF::loadHTML($r);
        return $pdf->output();
    }

}
