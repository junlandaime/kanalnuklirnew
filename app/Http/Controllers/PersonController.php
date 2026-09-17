<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeopleRequest;
use App\Http\Requests\UpdatePeopleRequest;
use App\Models\Person;
use App\Models\Subject;
use App\Models\SubjectPerson;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $people = Person::orderBy('name', 'DESC')->get();

        return view('admin.people.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.people.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePeopleRequest $request)
    {
        $subjek = json_decode($request->subjs, true);
        $hasil = [];

        foreach ($subjek as $a => $b) {
            foreach ($b as $c => $d) {
                $hasil[] = $d;
            }
        }

        DB::transaction(function () use ($request, $hasil) {
            $validated = $request->validated();

            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('fotos', 'public');
                $validated['foto'] = $fotoPath;
            } else {
                $fotoPath = 'fotos/foto-default.png';
            }

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt('123123123'),
            ]);
            $validated['slug'] = Str::slug($validated['name']);
            $validated['user_id'] = $user['id'];

            $user->assignRole('student');

            $person = Person::create($validated);

            foreach ($hasil as $sub) {
                $dataSub = Subject::where('name', $sub)->get();
                if (count($dataSub) != 0) {
                    SubjectPerson::create([
                        'subject_id' => $dataSub[0]->id,
                        'person_id' => $person->id,
                    ]);
                } else {
                    $newSub = Subject::create([
                        'name' => $sub,
                        'slug' => Str::slug($sub),
                    ]);
                    SubjectPerson::create([
                        'subject_id' => $newSub->id,
                        'person_id' => $person->id,
                    ]);
                }
            }
        });

        return redirect()->route('admin.people.index')->with(['success' => 'Person Baru Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
    }

    public function toggle(Person $person)
    {
        //
        if ($person->status) {
            $person->update([
                'status' => 0,
            ]);

            return redirect()->route('admin.people.index')->with(['error' => 'Data Person Tidak Dipublish!']);
        }

        if (! $person->status) {
            $person->update([
                'status' => 1,
            ]);

            return redirect()->route('admin.people.index')->with(['success' => 'Data Person Baru Dipublish!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        //
        return view('admin.people.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeopleRequest $request, Person $person)
    {
        $subjek = json_decode($request->subjs, true);
        $hasil = [];

        foreach ($subjek as $a => $b) {
            foreach ($b as $c => $d) {
                $hasil[] = $d;
            }
        }

        DB::transaction(function () use ($request, $person, $hasil) {

            $validated = $request->validated();

            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('fotos', 'public');
                $validated['foto'] = $fotoPath;
            }

            DB::table('users')
                ->where('id', $person->user_id)
                ->update([
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                ]);

            $validated['slug'] = Str::slug($validated['name']);

            $person->update($validated);
            $person->subjects()->detach();

            foreach ($hasil as $sub) {
                $dataSub = Subject::where('name', $sub)->get();
                if (count($dataSub) != 0) {
                    SubjectPerson::create([
                        'subject_id' => $dataSub[0]->id,
                        'person_id' => $person->id,
                    ]);
                } else {
                    $newSub = Subject::create([
                        'name' => $sub,
                        'slug' => Str::slug($sub),
                    ]);
                    SubjectPerson::create([
                        'subject_id' => $newSub->id,
                        'person_id' => $person->id,
                    ]);
                }
            }
        });

        return redirect()->route('admin.people.index')->with(['success' => 'Person Berhasil Diedit!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        DB::beginTransaction();

        try {
            $person->delete();
            DB::commit();

            return redirect()->route('admin.people.index')->with('Success', 'Person Berhasil Dihapus');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('admin.people.index')->with('error', 'terjadinya sebuah error');
        }
    }
}
