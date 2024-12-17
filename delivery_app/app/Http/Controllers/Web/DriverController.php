<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DriverController extends Controller
{
    //
    public function index()
    {
        $driver = Driver::all();
        return Inertia::render('Drivers/Index', ['drivers' => $driver]);
    }

    public function create()
    {
        return Inertia::render('Drivers/create');
    }

    public function store(Request $request)
    {
        Driver::create($request->all());
        return redirect()->route('drivers.index');
    }

    public function edit(Driver $driver) {}

    public function update(Request $request, Driver $driver)
    {

        // Validar los datos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:drivers,email,' . $driver->id,
            'password' => 'nullable|string|min:8', // Puedes hacer que la contraseña sea opcional en la actualización
            'phone_number' => 'required|string|min:7|max:15', // Asegúrate de que sea un número de teléfono válido
            'vehicle' => 'required|string|max:255',
            'placa' => 'required|string|max:20|unique:drivers,placa,' . $driver->id, // Única excepto para el propio conductor
        ]);

        // Si se proporciona una nueva contraseña, encriptarla
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        }

        // Actualizar el conductor en la base de datos
        $driver->update($validatedData);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('drivers.index')->with('success', 'Repartidor actualizado correctamente');
    }

    public function destroy(Driver $driver) {
        $driver->delete();
        return redirect()->route('drivers.index');
    }
}
