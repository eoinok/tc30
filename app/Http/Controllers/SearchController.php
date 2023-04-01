<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class SearchController extends  Controller
{  
    public function search(Request $request)
    {
        if($request->ajax()) {
            //return Response("Good");
            $output="";
            $members=DB::table('member')->where('firstname','LIKE','%'.$request->search."%")->get();
            if($members) {
                foreach ($members as $member) {
                    $output.='<tr>'.
                    '<td>'.$member->id.'</td>'.
                    '<td>'.$member->firstname.'</td>'.
                    '<td>'.$member->surname.'</td>'.
                    '<td>'.$member->membertype.'</td>'.
                    '</tr>';
                }
                return Response($output);
            }
            return Response("No Match");
        }
        else {
            return Response("error");
        }
        
        
    }
    
    public function searchform()
    {
        //echo "hello";
        return view('members.search');
    }
}