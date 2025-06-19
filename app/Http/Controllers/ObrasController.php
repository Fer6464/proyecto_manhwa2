<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use App\Models\Capitulo;
use App\Models\CapituloImagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ObrasController extends Controller
{

    public function index()
    {
         $obras = Obra::latest()->get();
         return view('manhwa.index', compact('obras'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $query = Obra::query();

        // Si hay un término de búsqueda, aplica el filtro
        if ($searchTerm) {
            $query->where('nombre', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('autor', 'LIKE', '%' . $searchTerm . '%');
        }

        // Ordena por la última creación y obtén los resultados
        $obras = $query->latest()->get();

        // Retorna la vista con las obras filtradas (o todas si no hay búsqueda)
        return view('manhwa.search', compact('obras'));
    }

    public function create()
    {
        return view('manhwa.create');
    }

    public function createChapter($id)
    {
        $obra = Obra::find($id);
        return view('manhwa.createcap', compact('obra'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
                'nombre' => 'required|string|max:250|unique:obras,nombre',
                'autor' => 'required|string|max:60',
                'portada' => 'required|url|max:500',
                'fecha_creacion' => 'required|date',
                'fecha_finalizacion' => 'nullable|string',
                'descripcion' => 'required|string',
                'estado' => 'required|in:En emisión,Finalizado,En Hiatus,Cancelado',
                'usuarios_id' => 'nullable|exists:usuarios,id',
            ]);

        if ($request->session()->has('id')) {
            $validated['usuarios_id'] = $request->session()->get('id');
        }
        $obra = Obra::create($validated);

        if ($request->has('tags')) {
            $obra->tags()->sync($request->tags);
        }

        return redirect()->route('manhwa.show', $obra->id)
                        ->with('success', 'Obra creada correctamente');
    }

    public function storeChapter(Request $request, $id)
    {
        $request->validate([
            'numero' => 'required|numeric',
            'titulo' => 'required|string|max:255',
            'imagenes.*' => 'required|image|max:4096',
        ]);

        $capitulo = new Capitulo();
        $capitulo->obra_id = $id;
        $capitulo->numero = $request->numero;
        $capitulo->titulo = $request->titulo;
        $capitulo->save();

        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $path = $imagen->store("public/capitulos/{$capitulo->id}");
                $capitulo->imagenes()->create([
                    'url' => str_replace('public/', '/storage/', $path),
                ]);
            }
        }

        return redirect()->route('manhwa.show', $id)->with('success', 'Capítulo subido exitosamente.');
    }

    public function show($id)
    {
        $obra = Obra::with('capitulos')->find($id);

        if (!$obra) {
            abort(404, 'Obra no encontrada');
        }

        return view('manhwa.show', compact('obra'));
    }

    public function viewChapter($id)
    {
        $capitulo = Capitulo::with(['imagenes', 'obra'])->findOrFail($id);

        $anterior = Capitulo::where('obra_id', $capitulo->obra_id)
                    ->where('numero', '<', $capitulo->numero)
                    ->orderBy('numero', 'desc')
                    ->first();

        $siguiente = Capitulo::where('obra_id', $capitulo->obra_id)
                    ->where('numero', '>', $capitulo->numero)
                    ->orderBy('numero', 'asc')
                    ->first();

        return view('manhwa.chapterview', compact('capitulo', 'anterior', 'siguiente'));
    }

    public function edit($id)
    {
        $obra = Obra::find($id);
        return view('manhwa.edit', compact('obra'));
    }


    public function update(Request $request, $id)
    {
        $obra = Obra::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:250|unique:obras,nombre,' . $id,
            'autor' => 'required|string|max:60',
            'portada' => 'nullable|url|max:500',
            'fecha_creacion' => 'required|date',
            'fecha_finalizacion' => 'nullable|string',
            'descripcion' => 'required|string',
            'estado' => 'required|in:En emisión,Finalizado,En Hiatus,Cancelado',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $obra->update($request->only([
            'nombre', 'autor', 'portada', 'fecha_creacion',
            'fecha_finalizacion', 'descripcion', 'estado'
        ]));

        if ($request->has('tags')) {
            $obra->tags()->sync($request->tags);
        } else {
            $obra->tags()->detach();
        }

        return redirect()->route('manhwa.show', $obra->id)
            ->with('success', 'Obra actualizada correctamente.');

    }


    public function destroy(Obra $obra)
    {
        //
    }
}
