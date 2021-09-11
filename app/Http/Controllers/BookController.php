<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Invoice;
use Carbon\Carbon;
use App;
use \stdClass;

class BookController extends Controller
{
    protected  $borrowing;

    public function index()
    { 
        $books = Book::orderBy('updated_at','asc')
        ->get();
        
        return response()->json($books);
        
    }

    public function calculateDeliveryDate($paramUserType, $paramBorrowingDate){
        
        $date = Carbon::createFromFormat('d/m/Y', $paramBorrowingDate);
        
        switch ($paramUserType){
            case 'Professor':
                $daysToAdd = 10;
                break; 
            case 'Aluno':
                $daysToAdd = 3; 
                break;
        }
        
        $date = $date->addDays($daysToAdd);
        
        return $date->format('d/m/Y');
    }

    public function printReceipt(Request $request)
    { 
        $this->borrowing = new stdClass();
        $this->borrowing->userType = $request->user_type;
        $this->borrowing->borrowingDate = $request->date;
        $this->borrowing->bookName = $request->book['name'];
        $this->borrowing->deliveryDate = $this->calculateDeliveryDate($this->borrowing->userType, $this->borrowing->borrowingDate);
        
        $pdf = $this->generatePDF($this->borrowing);
        
        return response()->json($pdf);


    }

    public function generatePDF($data){

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1><b>Recibo</b></h1>
                        <b>Data de empréstimo:</b> '. $data->borrowingDate. '<br>
                        <b>Livro:</b> '. $data->bookName. '<br>
                        <b>Tipo de usuário:</b> '. $data->userType.'<br><br>
                        <b>Data de devolução:</b> '. $data->deliveryDate
                    );

        $filename = 'storage\recibo'.$this->getDateToReceipt().'.pdf';
        $pdf->save($filename);

        return $filename;
    }

    public function getDateToReceipt(){
        return Carbon::now()->format('dmYHis');
    }
    
}
