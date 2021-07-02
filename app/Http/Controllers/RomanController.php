<?php
 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Roman;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use Validator,DB;
use App\Http\Controllers\Controller;


class RomanController extends Controller
{
    public function __construct(){
        $this->data=array();
        $this->model=new Roman;
    }

    public function create()
    {
        $this->data['romandata']=\DB::select("SELECT romen.* FROM `romen` ORDER BY
        roman_conversion_id DESC limit 10");
        //dd($this->data);
        return view('roman.form',$this->data);
    }
   
    
    function getintegerToRoman($integer){
        // Convert the integer into an integer (just to make sure)
        $integer = intval($integer);
        $result = '';
 
        // Create a lookup array that contains all of the Roman numerals.
        $lookup = array('M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1);
        
        foreach($lookup as $roman => $value){
        // Determine the number of matches
        $matches = intval($integer/$value);
        
        // Add the same number of characters to the string
        $result .= str_repeat($roman,$matches);
        
        // Set the integer to be the remainder of the integer and the value
        $integer = $integer % $value;
        }
 
            // The Roman numeral should be built, return it
            return $result;
       }


    public function store(Request $request) {
        $integer = $request->integer_value;
        $roman_value = $this->getintegerToRoman($integer);
//        print($roman_value);exit;
        Roman::create([
          'integer_value' => $request->integer_value,
          'roman_letter' => $roman_value
        ]);
        
        return response()->json(['success'=>'Form is successfully submitted!']);
  
      }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
