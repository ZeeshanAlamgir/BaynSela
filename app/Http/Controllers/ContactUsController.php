<?php

namespace App\Http\Controllers;

use App\DataTables\ContactUsDataTable;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Traits\Image;
use Exception;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use PDF;

class ContactUsController extends Controller
{
    public $image = null,$path='app-assets/images/contactimages/';
    use Image;

    public function getContacts(ContactUsDataTable $contactUsDataTable)
    {
        return $contactUsDataTable->render('app.admin-panel.home-page.contact-us.index');
    }

    public function saveContact(Request $request)
    {
        try {
            $contact = (new Contact());
            $contact->type = $request['type_of_inquiry'] ?? '';
            $contact->name = $request['name'] ?? '';
            $contact->email = $request['email'] ?? '';
            $contact->phone = $request['contact_number'] ?? '0';
            $contact->message = $request['message'] ?? '';

            if($request['contact_img'] !=null)
                $this->image = $this->imageStoreUniqueName($this->path,$request['contact_img'] ?? '');

            $contact->file = $this->image ?? '';
            $contact->save();

            return response()->json([
                'status' => true,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function deleteContact(Request $request)
    {
        $contacts = Contact::whereIn('id',$request->input('chkData'))->get();
        try
        {
            if(isset($contacts))
            {
                foreach($contacts as $contact)
                {
                    $image = 'app-assets/images/contactimages/'.$contact->file;
                    if(File::exists($image))
                        File::delete($image);
                    $contact->delete();
                }
                return redirect()->route('contacts.index')->withSuccess('Contact Deleted!');
            }
        }
        catch (\Exception $ex)
        {
            return redirect()->route('contacts.index')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function downloadFile($id)
    {
        $contact = (new Contact())->find($id);
        $file = 'app-assets/images/contactimages/'.$contact->file;
        return response()->download($file);
    }

}
