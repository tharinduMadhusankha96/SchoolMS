<?php

namespace App\Http\Controllers;
use DB;
use PDF;
use Illuminate\Http\Request;

class DynamicPDFCController extends Controller
{
    function index()
    {
        $customer_data = $this->get_customer_data();
        return view('dynamic_pdfc')->with('customer_data', $customer_data);
    }

    function get_customer_data()
    {
        $customer_data = DB::table('can_products')
            ->limit(10)
            ->get();
        return $customer_data;
    }

    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html());
        return $pdf->stream();
    }

    function convert_customer_data_to_html()
    {
        $customer_data = $this->get_customer_data();
        $output = '
     <h3 align="center">Product Details</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Product Name</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Quantity</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Price</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Discount Code</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Amount</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Date</th>
   </tr>
     ';
        foreach($customer_data as $customer)
        {
            $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$customer->productname.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->qty.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->price.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->dis.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->amount.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->created_at.'</td>
      </tr>
      ';
        }
        $output .= '</table>';
        return $output;
    }
}
