<?php

namespace App\Http\Controllers;

use App\PhoneBook;
use Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class PhoneBookController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

      $phonebook = PhoneBook::all();
      return $phonebook;
      //return json_encode($phonebook);

  }

  /*

  */
  public function store() {

    $rules = array(
        'first_name' => 'required | min:3 | max:15',
        'last_name' => 'required | min:3 | max:15',
        'phone_number' => 'required|regex:/^[0-9 -]/',
        'date_time' => 'required'
    );

    $validator = validator::make(Input::all(), $rules);

    if ($validator->fails()) {

      exit(json_encode(array(
                    'errors' => $validator->messages()
                )));

      //return response($validator->errors()->all());

    } else {

      $newPhoneUser = new PhoneBook();

      //echo 'from angular date: ' . Request::get('date') . '<hr/>';

      $convert_date = strtotime( Request::get('date_time'));

      //echo 'Convert date: ' . Request::get('date');

      $date = date("Y-m-d h:m:s", $convert_date);

      $newPhoneUser->first_name   = Request::get('first_name');
      $newPhoneUser->last_name    = Request::get('last_name');
      $newPhoneUser->phone_number = Request::get('phone_number');
      $newPhoneUser->date_time    = $date;
      //die();
      //echo $newPhoneUser->date;

      if ($newPhoneUser->save()) {
            exit(json_encode(array(
                'status' => true
            )));

        } else {
            exit(json_encode(array(
                'status' => false
            )));
        }

    }

  }

  /**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return json_encode
	 */
	public function destroy(Request $request, $id) {

		$phoneUser = PhoneBook::find($id);

    if($phoneUser->delete($id)) {
      exit(json_encode(array(
          'status' => true
      )));
    }


	}

}
