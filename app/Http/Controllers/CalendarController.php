<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Calendario;
use Calendar;
use Gate;
use App\User;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Calendario::all();
        $user = User::all();
        //dd($events);
        $event_list = [];
        foreach($events as $row){
            $event_list[] = Calendar::event(
                $row->evento,
                true,
                new \DateTime($row->data_inicio),
                new \DateTime($row->data_fim.'+1 day'),
                $row->id,
                    [
                        'color' => $row->cor,
                    ]
                );
        }
        $calendar = Calendar::addEvents($event_list);
        return view('calendario', compact('calendar','user'));
        //return view('calendario');
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
    public function store(Request $request, Calendario $calendar)
    {
         //dd($request);
         try
         {
            
            $calendar->create($request->all());
             return redirect()
             ->action("CalendarController@index")
             ->with("toast_success", "Registro Gravado Com Sucesso");
         } 
         catch (\Illuminate\Database\QueryException $e) 
         {
             dd($e);
             return redirect()
             ->action("CalendarController@index")
             ->with("toast_error", "Houve um erro ao gravar o registro");
         }
     }
 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $events = Calendario::all();
        return view('visual.view_eventos')->with('events',$events);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events = Calendario::find($id);
        $user = User::all();
        if(Gate::denies('view_eventos', $events)){
            return redirect()->back();
        }
        return view('edit.edit_eventos',compact('events', 'id','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,Calendario $calendario)
    {
        $dados = $calendario->find($id);
        $dados->update($request->all());
                return redirect()
            ->action("CalendarController@index")
            ->with("toast_success", "Registro Editado Com Sucesso");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Calendario $calendar)
    {
        $calendar->destroy($id);
    }
}
