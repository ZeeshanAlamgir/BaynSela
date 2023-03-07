<?php

namespace App\Http\Controllers\OurNumber;
use App\Http\Controllers\Controller;
use App\Models\OurClient;
use App\Models\OurClientImage;
use App\Models\OurNumber;
use App\Models\Partner;
use App\Models\PartnerImage;
use App\Models\Project;
use App\Models\TemporaryFile;
use App\Services\OurNumberService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OurNumberController extends Controller
{
    public $numberServ = null;
    public function __construct(OurNumberService $numberServ)
    {
        $this->numberServ = $numberServ;
    }

    public function numberView()
    {
        $number_section = (new OurNumber())->find(1);
        return view('app.admin-panel.OurNumbers.index',compact('number_section'));
    }

    public function updateNumberBannerSection(Request $request)
    {
        return response()->json([$this->numberServ->updateOurNumberBannerSection($request->all()),'status'=>200]);
    }

    public function ourPartners()
    {
        $our_partners = (new Partner())->find(1);
        $partner_images = (new PartnerImage())->get();
        return view('app.admin-panel.OurNumbers.partners',compact('our_partners','partner_images'));
    }

    public function updateOurNumberPartnerSection(Request $request)
    {
        return response()->json([$this->numberServ->updateOurNumberPartnerSection($request->all()),'status'=>200]);
    }

    public function ourClientsView()
    {
        $path = public_path('app-assets/images/temporaryfiles');
        // dd(file_exists($path));
        // File::deleteDirectory(public_path('app-assets/images/temporaryfiles'));
        if(!file_exists($path))
        {
            File::makeDirectory(public_path('app-assets/images/temporaryfiles'));
        }
        $our_client_images = (new OurClientImage())->orderBy('id','asc')->get();
        $our_client= (new OurClient())->find(1);
        return view('app.admin-panel.OurNumbers.clients',compact('our_client_images','our_client'));
    }

    public function updateOurNumberClientSection(Request $request)
    {
        try {
            $this->numberServ->updateOurNumberClientSection($request->all());
            return redirect()->route('our-numbers.ourClientsView')->withSuccess('Updated!');
        } catch (Exception $ex) {
            return redirect()->route('our-numbers.ourClientsView')->withDanger('Something went wrong!' . ' ' . $ex->getMessage());
        }
    }

    public function projectView()
    {
        $project_data = (new Project())->find(1);
        return view('app.admin-panel.OurNumbers.projects',compact('project_data'));
    }

    public function updateprojectSection(Request $request)
    {
        return response()->json([$this->numberServ->updateProjectSection($request->all()),'status'=>200]);
    }
}
