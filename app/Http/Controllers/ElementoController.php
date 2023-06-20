<?php

namespace App\Http\Controllers;

use App\Models\Elemento;
use App\Models\Image;
use App\Models\Observation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ElementoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:elementos.index')->only('index');
        $this->middleware('can:elementos.edit')->only('edit', 'update');
        $this->middleware('can:elementos.destroy')->only('destroy');
    }

    public function index()
    {
        return view('elementos.index');
    }

    public function create()
    {
        return view('elementos.show');
    }

    public function store(Request $request)
    {
           $request->validate([
            'name' => 'required',
            'type' => 'required',
            'active' => 'unique:elementos|integer|nullable|required_without_all:serial',
            'serial' => 'unique:elementos|nullable|required_without_all:active|min:6',
            'mark' => 'required',
            'transport' => 'required|string',
            'guide' => 'string|nullable',
            'observations' => 'required|max:300',
            'centro_id' => 'required',
            'zone' => 'required',
            'image' => 'image'
        ]);
        
        $activo = Elemento::create([
            'name' => $request->name,
            'type' => $request->type,
            'mark' => $request->mark,
            'active' => $request->active,
            'serial' => $request->serial,
            'transport' => $request->transport,
            'guide' => $request->guide,
            'zone' => $request->zone,
            'centro_id' => $request->centro_id,
            'user_id' => auth()->user()->id,
        ]);
        

        if ($activo) {
            $url = Storage::put('activos', $request->file('image'));
            $image = Image::create([
                'url' => $url,
                'elemento_id' => $activo->id
            ]);
            $observation = Observation::create([
                'observations' => $request->observations,
                'elemento_id' => $activo->id,
                'entrega' => now()
            ]);

            if ($image && $url && $observation) {
                  return redirect()->route('elementos.create')->with('info', 'Se agrego el activo ' . $activo->active . ' , recuerda revisar el estado y validar respuestas y entregas');
               // return redirect()->route('elementos.create')->with('info','ok');
            } else {
                return "No fue posible guardar el activo";
            }
        } else {
            return "No fue posible guardar el activo";
        }
    }

    public function edit(Elemento $elemento)
    {
        $image = Image::where('elemento_id', $elemento->id)->get();
        $obs = Observation::where('elemento_id', $elemento->id)->first();
        return view('elementos.edit', compact('elemento', 'image', 'obs'));
    }

    
    public function update(Request $request, Elemento $elemento)
    {
        $request->validate([
            'observation2' => 'required|max:300'
        ]);

        $observation2 = Observation::where('elemento_id', $elemento->id)->update([
            'observations2' => $request->observation2,
            'entrega' => now(),
            'tecnico1' => auth()->user()->name
        ]);
        $status = Elemento::where('id', $elemento->id)->update(['status' => 2]);

        if ($observation2 && $status) {
            return redirect()->route('elementos.create')->with('info', 'Acabas de confirmar que el activo  ' . $elemento->active . ' , fue recibido y ya se encuentra en revision');
        } else {
            return "No se pudo actualizar";
        }
    }

    public function destroy(Request $request, Elemento $elemento)
    {
        $validar = $request->validate([
            'observations3' => 'required|max:300',
            'image' => 'required|image'
        ]);

        if ($validar) {

            $observations3 = Observation::where('elemento_id', $elemento->id)->update([
                'observations3' => $request->observations3,
                'tecnico2' => auth()->user()->name,

            ]);
            $url = Storage::put('activos', $request->file('image'));
            $status = Elemento::where('id', $elemento->id)->update(['status' => 3]);
            $image = Image::create([
                'url' => $url,
                'elemento_id' => $elemento->id
            ]);


            if ($observations3 && $url && $image && $status) {
                return redirect()->route('elementos.create')->with('info', 'Acabas de confirmar que el activo  ' . $elemento->active . ' , fue reparado');
            } else {
                return "No se pudo actualizar la observacion";
            }
        }
    }
}
