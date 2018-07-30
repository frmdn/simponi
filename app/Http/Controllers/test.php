<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class test extends Controller
{
    public function gen() {
        // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $section = $phpWord->addSection();

        $section->addText(
            '"Learn from yesterday, live for today, hope for tomorrow. '
            . 'The important thing is not to stop questioning." '
            . '(Albert Einstein)'
        );

        $section->addText(
            '"Great achievement is usually born of great sacrifice, '
            . 'and is never the result of selfishness." '
            . '(Napoleon Hill)',
            array('name' => 'Tahoma', 'size' => 10)
        );

        // Adding Text element with font customized using named font style...
        $fontStyleName = 'oneUserDefinedStyle';
        $phpWord->addFontStyle(
            $fontStyleName,
            array('name' => 'Tahoma', 'size' => 10, 'color' => '1B2232', 'bold' => true)
        );
        $section->addText(
            '"The greatest accomplishment is not in never falling, '
            . 'but in rising again after you fall." '
            . '(Vince Lombardi)',
            $fontStyleName
        );

        // Adding Text element with font customized using explicitly created font style object...
        $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Tahoma');
        $fontStyle->setSize(13);
        $myTextElement = $section->addText('"Believe you can and you\'re halfway there." (Theodor Roosevelt)');
        $myTextElement->setFontStyle($fontStyle);

        // Saving the document as OOXML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(storage_path('HelloGAn.docx'));
    }

    public function PrinCoy() {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->createSection();
        $section->addText('Hello World!');
        $file = 'HelloWorld.docx';
        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $xmlWriter->save("php://output");
    }

    public function PrintOpini($id) {

        $data = \App\Models\PengajuanOpini::select("daftar_pengajuan.*","badan_usaha.nama as namabadanusaha","cabang.nama_lokasi as namacabang","tuj_pengajuan_opini.nama as namatujuan")
        ->join('badan_usaha','badan_usaha.id','=','daftar_pengajuan.badan_usaha')
        ->join('cabang','cabang.id','=','daftar_pengajuan.cabang')
        ->join('tuj_pengajuan_opini','tuj_pengajuan_opini.id','=','daftar_pengajuan.tujuan_opini')
        ->where('daftar_pengajuan.id',$id)->get();
        $data = json_decode($data);
        // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $section = $phpWord->addSection();

        //$section->addText(" Data Opini ");



        // Adding Text element with font customized using explicitly created font style object...
        $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Tahoma');
        $fontStyle->setSize(13);
        $myTextElement = $section->addText('Data Opini');
        $myTextElement->setFontStyle($fontStyle);

        $label = array(
            'Maker',
            'Nama Nasabah',
            'Badan Usaha',
            'Cabang',
            'Nama AO/PIC',
            'Nama Supervisi',
            'Plafond',
            'Tujuan Opini',
            'No Memo Pengajuan',
            'Tanggal Pengajuan',
            'Jam Memo Diterima',
            'Tanggal Disposisi',
            'Jam Disposisi',
            'Tanggal Lengkap',
            'Jam Lengkap',
            'Status'
        );
        $values = array(
            $data[0]->maker, 
            $data[0]->nama_nasabah, 
            $data[0]->badan_usaha, 
            $data[0]->namacabang, 
            $data[0]->nama_ao_pic,
            $data[0]->nama_supervisi, 
            number_format($data[0]->plafond,2), 
            $data[0]->namatujuan, 
            $data[0]->no_memo_pengajuan, 
            $data[0]->tgl_masuk_pengajuan, 
            $data[0]->jam_memo_diterima, 
            $data[0]->tgl_disposisi, 
            $data[0]->jam_disposisi, 
            $data[0]->tgl_lengkap, 
            $data[0]->jam_lengkap, 
            $data[0]->status, 
        );
        $rows = count($label);
        $tableStyle = array('borderSize' => 1, 'borderColor' => '000000');
        $phpWord->addTableStyle(null, $tableStyle);
        $table = $section->addTable();
        for ($r=0; $r < $rows; $r++) { 
            $table->addRow();
            $table->addCell(1750)->addText($label[$r]); 
            $table->addCell(1750)->addText($values[$r]); 
        }

        // Saving the document as OOXML file...

        $file = 'File_'.$data[0]->maker.'-'.date('YmdHis').'.docx';
        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $xmlWriter->save("php://output");

    }
}