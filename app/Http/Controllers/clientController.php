<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class clientController extends Controller
{
    // Display all clients.
    public function index()
    {
        $file_name = 'clients.csv';
        // Check if file exists.
        if(!file_exists($file_name)){
            // Create file with heading and save.
            $file = fopen($file_name, 'w');
            fputcsv($file, array('id','name','gender','phone','email','address','nationality','dob','education','contact_mode'));
            fclose($file);
            return json_encode('No clients added yet');
        }

        $rows   = array_map('str_getcsv', file($file_name, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)); // CSV to array
        $header = array_shift($rows); // Removes first row of array and shifts index
        $clients    = array();
        foreach($rows as $row) {
            $clients[] = array_combine($header, $row); // Combines two array as key value pair
        }
        return ($clients);
    }

    // Store a new client data.
    public function store(Request $request)
    {
        $file_name = 'clients.csv';
        // Check if file exists.
        if(!file_exists($file_name)){
            // Create file with heading and save.
            $file = fopen($file_name, 'w');
            fputcsv($file, array('id','name','gender','phone','email','address','nationality','dob','education','contact_mode'));
            fclose($file);
        }
        $file = fopen($file_name, 'a');
        $id = count(file($file_name));
        if ($id > 1) {
            $id = ($id -1) +1;
        }
        $form_data = array(
            'id' => $id,
            'name' => $request->client['name'],
            'gender' => $request->client['gender'],
            'phone' => $request->client['phone'],
            'email' => $request->client['email'],
            'address' => $request->client['address'],
            'nationality' => $request->client['nationality'],
            'dob' => $request->client['dob'],
            'education' => $request->client['education'],
            'contact_mode' => $request->client['contact_mode']
        );
        fputcsv($file, $form_data);
        fclose($file);
        return json_encode('Client added!');
    }

    // Display specific client data.
    public function show($id)
    {
        $file_name = 'clients.csv';
        if(file_exists($file_name)) {
            $rows   = array_map('str_getcsv', file($file_name, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)); // CSV to array
            $header = array_shift($rows); // Removes first row of array and shifts index
            $client = array();
            if($id > 0 && $id <= count($rows)) {
                $client[] = array_combine($header, $rows[$id-1]); // Combines two array as key value pair
                return ($client);
            }
            return json_encode("Client doesn't exist");
        }
        return json_encode('No clients added yet');
    }
}
