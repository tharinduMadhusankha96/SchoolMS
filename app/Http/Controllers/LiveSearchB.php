<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class LiveSearchB extends Controller
{

    function index()
    {
        return view('live_search');
    }

    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('can_products')
                    ->where('productname', 'like', '%'.$query.'%')
                    ->orWhere('created_at', 'like', '%'.$query.'%')
                    ->orderBy('productname', 'desc')
                    ->get();

            }
            else
            {
                $data = DB::table('can_products')
                    ->orderBy('productname', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
        <tr>
         <td>'.$row->id.'</td>
         <td>'.$row->productname.'</td>
         <td>'.$row->qty.'</td>
         <td>'.$row->price.'</td>
         <td>'.$row->dis.'</td>
         <td>'.$row->amount.'</td>
         <td>'.$row->created_at.'</td>
        
        </tr>
        ';
                }
            }
            else
            {
                $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }

    function indexB()
    {
        return view('live_searchB');
    }

    function actionB(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('bok_products')
                    ->where('productname', 'like', '%'.$query.'%')
                    ->orWhere('created_at', 'like', '%'.$query.'%')

                    ->orderBy('productname', 'desc')
                    ->get();

            }
            else
            {
                $data = DB::table('bok_products')
                    ->orderBy('productname', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
        <tr>
         <td>'.$row->id.'</td>
         <td>'.$row->productname.'</td>
         <td>'.$row->qty.'</td>
         <td>'.$row->price.'</td>
         <td>'.$row->dis.'</td>
         <td>'.$row->amount.'</td>
         <td>'.$row->created_at.'</td>
        </tr>
        ';
                }
            }
            else
            {
                $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }
}
