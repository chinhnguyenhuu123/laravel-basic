<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts=Contact::paginate(5);
        return view('admin.contact.list',compact('contacts'));
    }
    public function destroy(string $id)
    {
        
    }
}
