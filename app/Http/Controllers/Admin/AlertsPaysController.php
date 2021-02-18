<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AlertsPays;
use App\PaysExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class AlertsPaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = 60;

        $keyword = $request->get('search');

        if (!empty($keyword)) {
            $alerts = AlertsPays::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('level_pay', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")

                ->latest()->paginate($perPage);
        }

        else{
            $alerts= AlertsPays::all();

        }
       
      
        
            return view('Admin.Alerts.index_level', compact('alerts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $alert = AlertsPays::findOrFail($id);
        AlertsPays::destroy($id);
        return view('Admin.Alerts.create', compact('alert','id'));
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
        $requestData = $request->all();
        $alert = AlertsPays::findOrFail($id);
        $alert->update($requestData);

            return redirect('admin/alertspays');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AlertsPays::destroy($id);

        return redirect('admin/alertspays')->with('flash_message', 'User deleted!');
    }


    public function export()
    {
        
        
        return Excel::download(new PaysExport, 'pagos_pendientes.xlsx');
        return redirect('admin/alertspays');
    }
}
