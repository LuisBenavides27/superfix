<?php

namespace App\Http\Controllers;

use App\Models\Observation;
use App\Models\Elemento;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ObservationController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:reportes.index')->only('index');
        $this->middleware('can:reportes.edit')->only('edit', 'update');
        $this->middleware('can:reportes.destroy')->only('destroy');
    }

    public function index()
    {
        return view('reportes.index');
    }

    /* public function create(Request $request)
    {
        if (auth()->user()->hasRole('Tecnico')) {
            $activos = Elemento::select(
                'elementos.id',
                'elementos.name',
                'elementos.type',
                'elementos.mark',
                'elementos.active',
                'elementos.serial',
                'elementos.status',
                'elementos.centro_id',
                'elementos.zone',
                'elementos.user_id',
                'observations.observations',
                'observations.observations2',
                'observations.observations3',
                'observations.tecnico1',
                'observations.tecnico2',
                'observations.created_at',
                'observations.updated_at',
                'observations.entrega',

            )
                ->join('observations', 'elementos.id', '=', 'observations.elemento_id')
                ->where('elementos.status', 3)
                ->where('elementos.zone', auth()->user()->zone)
                ->whereRaw('DATE(observations.updated_at) >= ?', [$request->fecha_inicial])
                ->whereRaw('DATE(observations.updated_at) <= ?', [$request->fecha_final])
                ->orderBy('observations.created_at', 'desc')
                ->get();

            if ($activos->count()) {
                $images = Image::all();
                $pdf = Pdf::loadView('reportes.pdf', ['activos' => $activos, 'fechas' => $request, 'images' => $images]);
                return $pdf->stream();
            } else {
                return redirect()->route('reportes.index')->with('danger', 'No fue posible generar el reporte, al parecer no hay activos reparados entre el ' . $request->fecha_inicial . ' y el ' . $request->fecha_final);
            }
        } else {
            $activos = Elemento::select(
                'elementos.id',
                'elementos.name',
                'elementos.type',
                'elementos.mark',
                'elementos.active',
                'elementos.serial',
                'elementos.status',
                'elementos.centro_id',
                'elementos.zone',
                'elementos.user_id',
                'observations.observations',
                'observations.observations2',
                'observations.observations3',
                'observations.tecnico1',
                'observations.tecnico2',
                'observations.created_at',
                'observations.updated_at',
                'observations.entrega'
            )
                ->join('observations', 'elementos.id', '=', 'observations.elemento_id')
                ->where('elementos.status', 3)
                ->where('elementos.user_id', auth()->user()->id)
                ->whereRaw('DATE(observations.updated_at) >= ?', [$request->fecha_inicial])
                ->whereRaw('DATE(observations.updated_at) <= ?', [$request->fecha_final])
                ->orderBy('observations.created_at', 'asc')
                ->get();
            if ($activos->count()) {
                $images = Image::all();
                $pdf = Pdf::loadView('reportes.pdf', ['activos' => $activos, 'fechas' => $request, 'images' => $images]);
                return $pdf->stream();
            } else {
                return redirect()->route('reportes.index')->with('danger', 'No fue posible generar el reporte, al parecer no hay activos reparados entre el 
                ' . $request->fecha_inicial . ' y el ' . $request->fecha_final . ' revisa las fechas y vuelve a generar el reporte');
            }
        }
    } */

    public function create(Request $request)
    {
        $user = auth()->user();

        $activos = Elemento::select(
            'elementos.id',
            'elementos.name',
            'elementos.type',
            'elementos.mark',
            'elementos.active',
            'elementos.serial',
            'elementos.status',
            'elementos.centro_id',
            'elementos.zone',
            'elementos.user_id',
            'observations.observations',
            'observations.observations2',
            'observations.observations3',
            'observations.tecnico1',
            'observations.tecnico2',
            'observations.created_at',
            'observations.updated_at',
            'observations.entrega'
        )
            ->join('observations', 'elementos.id', '=', 'observations.elemento_id')
            ->where('elementos.status', 3);

        if ($user->hasRole('Tecnico')) {
            $activos->where('elementos.zone', $user->zone);
        } else {
            $activos->where('elementos.user_id', $user->id);
        }

        $activos = $activos
            ->whereRaw('DATE(observations.updated_at) >= ?', [$request->fecha_inicial])
            ->whereRaw('DATE(observations.updated_at) <= ?', [$request->fecha_final])
            ->orderBy('observations.created_at', $user->hasRole('Tecnico') ? 'desc' : 'asc')
            ->get();

        if ($activos->count()) {
            $images = Image::all();
            $pdf = Pdf::loadView('reportes.pdf', ['activos' => $activos, 'fechas' => $request, 'images' => $images]);
            return $pdf->stream();
        } else {
            $message = $user->hasRole('Tecnico') ?
                'No fue posible generar el reporte, al parecer no hay activos reparados entre el ' . $request->fecha_inicial . ' y el ' . $request->fecha_final :
                'No fue posible generar el reporte, al parecer no hay activos reparados entre el ' . $request->fecha_inicial . ' y el ' . $request->fecha_final . '. Revisa las fechas y vuelve a generar el reporte';

            return redirect()->route('reportes.index')->with('danger', $message);
        }
    }

    public function show(Observation $observation)
    {
        return view('reportes.users');
    }

    public function edit($user)
    {
        $users = User::find($user);
        $roles = Role::all();
        return view('reportes.rol', compact('users', 'roles'));
    }

    public function update(Request $request, $users)
    {
        $users = User::find($users);

      //  return $request;
        $users->roles()->sync($request->roles);

        return redirect()->route('reportes.users')->with('info', 'Se realiza asignacion de nuevo Rol al usuario ' . $users->name);
    }

    public function users()
    {
        return view('reportes.users');
    }

    public function reset(User $user)
    {
        $pass = Hash::make('SSN2023*');
        $reset = User::where('id', $user->id)->update(['password' => $pass]);

        $mensaje = $reset ? 'Se ha realizado cambio de contraseña, el usuario: ' . $user->email . ' ahora ingresa con la contraseña: SSN2023*' : '¡¡¡ ALGO SALIO MAL !!! No se pudo resetear contraseña de ' . $user->name;

        return redirect()->route('reportes.users')->with($reset ? 'info' : 'danger', $mensaje);
    }

    public function actualizar(User $user)
    {
        return view('reportes.actualizar', compact('user'));
    }

    public function modificar(Request $request, $users)
    {
        $request->validate([
            'name' => 'required',
            'cargo' => 'required',
            'zone' => 'required',
            'email' => 'required|unique:users,email,' . $users
        ]);

        $user = DB::table('users')->where('id', $users)->update([
            'name' => $request->name,
            'cargo' => $request->cargo,
            'zone' => $request->zone,
            'email' => $request->email
        ]);

        $mensaje = $user ? 'Se han actualizado los datos del usuario: ' . $request->name : '¡¡¡ ALGO SALIO MAL !!! No se pudo actualizar datos de ' . $request->name;

        return redirect()->route('reportes.users')->with($user ? 'info' : 'danger', $mensaje);
    }

    public function nuevo()
    {
        return view('reportes.nuevo');
    }

    public function agregar(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cargo' => 'required',
            'zone' => 'required',
            'email' => 'required|unique:users'
        ]);

        $user = User::create([
            'name' => $request->name,
            'cargo' => $request->cargo,
            'zone' => $request->zone,
            'email' => $request->email,
            'password' => '$2y$10$FCmZ.jduzrt3x.1GAR809ebakSvePDlQe8mAJSqO0cZNt.wE/aPDy'
        ]);

        $mensaje = $user ? 'Se ha creado al usuario, ahora debes asignar un rol a ' . $request->name : '¡¡¡ ALGO SALIO MAL !!! No se pudo crear al usuario ' . $request->name;

        return redirect()->route('reportes.users')->with($user ? 'info' : 'danger', $mensaje);
    }
}