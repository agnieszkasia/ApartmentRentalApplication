<?php

namespace App\Http\Controllers;

use App\Flat;
use App\Photo;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function index()
    {
        //
    }

    public function upload(Request $request, Photo $photoTable, Flat $flat)
    {
        $flat_id = $request->input('flat_id');
        if ($request->hasFile('img'))
        {
            $photo_array = $request->file('img');
            $array_length = count($photo_array);
            echo $array_length;

            for ($i=0; $i<$array_length;$i++)
            {
                $photo_ext = $photo_array[$i]->getClientOriginalExtension();
                $new_photo_name = rand(123456,999999).".".$photo_ext;
                $destination_path = public_path('/images/photos');
                $photo_array[$i]->move($destination_path, $new_photo_name);

                $table = new $photoTable;
                $table->photo_name = $new_photo_name;
                $table->flat_id = $flat_id;
                $table->save();


            }
            return back()->with('msg', 'Zdjęcia zostały dodane');

        }
        else
        {
            return back()->with('msg', 'Nie wybrano żadnego pliku, wybierz zdjęcia do dodania');
        }
    }
}
