<?php

class AdminTransponderController extends AdminController
{
    public function index()
    {

//$transponder = TvTransponder::where('id', '>', 1)->first(); 
//$satellite = TvSatellite::where('id', '=', 4)->first()->tvTransponders;

        $satellites = DB::table('tv_satellites')
            ->join('tv_transponders', 'tv_satellites.id', '=', 'tv_transponders.satellite_id')
            ->orderBy('longitude', 'asc')
            ->orderBy('frequency', 'asc')
            ->select('tv_transponders.id', 'name', 'frequency', 'sr', 'fec', 'longitude', 'polarization')
            ->get();



//var_dump($satellites); die;
//var_dump($satellites->name); die;
//$transponder->tvSatellites

        //$satellites = TvSatellite::orderBy('name')->lists('name', 'id');
        return View::make("admin.tv.transponder.index", 
            ['items' => $satellites]
        );
    }

    public function add()
    {
        $satellites = TvSatellite::orderBy('name')->lists('name', 'id');
        return View::make("admin.tv.transponder.add", ['satellites' => $satellites]);
    }

    public function postAdd()
    {
        $rules = array(
            'satellite_id' => 'required',
            'frequency' => 'required|min:4|max:5',
            'polarization' => 'required',
            'sr' => 'required|min:4|max:5',
            'fec' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            $parameters = json_decode(Input::get('parameters'));
            return Redirect::to("admin/transponder/add")
                ->withErrors($validator)
                ->withInput(Input::except(''));
        }

        $table = new TvTransponder;
        $table->satellite_id = Input::get('satellite_id');
        $table->frequency = Input::get('frequency');
        $table->polarization = Input::get('polarization');
        $table->sr = Input::get('sr');
        $table->fec = Input::get('fec');

        if ($table->save()) {
            return Redirect::to("admin/transponder")->with('success', trans("message.add"));
        }

        return Redirect::to("admin/transponder")->with('error', trans('message.error'));

    }

    public function edit($id)
    {
        return View::make("admin.tv.transponder.edit", 
            ['item' => TvTransponder::find($id)]
        );
    }

    public function postEdit($id)
    {
        $rules = array(
            'satellite_id' => 'required',
            'frequency' => 'required|min:4|max:5',
            'polarization' => 'required',
            'sr' => 'required|min:4|max:5',
            'fec' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            $tvChannels = json_decode(Input::get('tv-channels'));
            //$img = isset($parameters->name) ? $parameters->name : null;
            return Redirect::to("admin/transponder/{$id}/edit")
                //->with('uploadfile', $img)
                ->withErrors($validator)
                ->withInput(Input::except(''));
        }

        $table = TvTransponder::find($id);
        $table->satellite_id = Input::get('satellite_id');
        $table->frequency = Input::get('frequency');
        $table->polarization = Input::get('polarization');
        $table->sr = Input::get('sr');
        $table->fec = Input::get('fec');
        $table->tv_channels = Input::get('tv_channels');

        if ($table->save()) {
/*            $validator = Validator::make(Input::all(), $rules);
            $tvChannels = json_decode(Input::get('tv-channels'));

            if (!empty($tvChannels)) {
                TvChannelTransponder::where('tv_transponder_id', '=', $table->id)->delete();

                foreach ($tvChannels as $id) {
                $tvChannelTransponder = new TvChannelTransponder;
                    $tvChannelTransponder->tv_channel_id = $id;
                    $tvChannelTransponder->tv_transponder_id = $table->id;
                    $tvChannelTransponder->save();
                }
            }*/

            //var_dump($tvChannels); die;


            return Redirect::to("admin/transponder")->with('success', trans("message.adit"));
        }

        return Redirect::to("admin/transponder")->with('error', trans('message.error'));
    }

    public function postDelete()
    {
        if (Request::ajax()) {
            $id = (int) Input::get('id');

            $rules = array(
                'id' => 'required'
            );

            $validator = Validator::make(Input::all(), $rules);
            if ( $validator->fails() ) {
                return Response::json(['success' => false]);
            }

            $table = TvTransponder::find($id);
            if ($table->delete()) {
                return Response::json(['success' => true]);
            }
            return Response::json(['success' => false]);
        }
    }
}