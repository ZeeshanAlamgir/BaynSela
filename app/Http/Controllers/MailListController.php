<?php

namespace App\Http\Controllers;

use App\DataTables\MailingDataTable;
use App\Models\MailingList;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MailListController extends Controller
{
    public function addMail(Request $request)
    {
            (new MailingList())->create([
                'email' => $request->email
            ]);
            return response()->json(['status'=>200]);
    }

    public function allMails(MailingDataTable $mailingDataTable)
    {
        return $mailingDataTable->render('app.admin-panel.mailing-list.index');
    }

    public function deleteMail(Request $request)
    {
        $mails = MailingList::whereIn('id',$request->input('chkData'))->get();
        try
        {
            if(isset($mails))
            {
                foreach($mails as $mail)
                    $mail->delete();
            }
            return redirect()->route('mailing-list')->withSuccess('Mail Deleted!');
        }
        catch (\Exception $ex)
        {
            return redirect()->route('mailing-list')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }
}
