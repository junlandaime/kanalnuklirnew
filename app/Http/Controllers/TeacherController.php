<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Person;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\DosenVerifyMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreTeacherRequest;
use Illuminate\Validation\ValidationException;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::orderBy('id', 'desc')->get();

        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function verify()
    {
        //
        return view('admin.teachers.verify');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function verifyCheck(Request $request)
    {
        //
        $validated = $request->validate([
            'email' => 'required|email'
        ]);

        $person = Person::where('email', $validated['email'])->first();

        if (!$person) {
            return back()->withErrors([
                'email' => 'Email ini Tidak Terdaftar sebagai Email Dosen'
            ]);
        }

        $user = User::where('email', $person['email'])->first();

        if ($user->hasRole('teacher')) {
            return back()->withErrors([
                'email' => 'Email ini telah terverifikasi, silahkan langsung login'
            ]);
        }
        if ($user->remember_token) {
            return back()->withErrors([
                'email' => 'Email ini telah terverifikasi, silahkan verifikasi status Dosen Anda di email tersebut'
            ]);
        }


        DB::transaction(function () use ($user, $validated) {

            $password = Str::random(8);
            $remembertoken = Str::random(20);

            $user->update([
                'password' => $password,
                'remember_token' => $remembertoken
            ]);

            // $teacher = Teacher::where('user_id', $user->id)->first();



            $validated['user_id'] = $user->id;
            $validated['is_active'] = false;
            $validated['activate_token'] = Str::random(30);

            $teacher = Teacher::create($validated);



            DB::commit();

            Mail::to($user->email)->send(new DosenVerifyMail($teacher, $password));
            $user->assignRole('student');

            return redirect(route('teacher.verify'))->with(['success' => 'Email anda terdaftar, silahkan cek email untuk verifikasi']);
        });

        return redirect()->back()->with(['error' => 'Terjadinya sebuah Error']);
    }

    public function verifyDosen($token)
    {

        $teacher = Teacher::where('activate_token', $token)->first();
        $user = User::where('id', $teacher->user_id)->first();


        DB::transaction(function () use ($teacher, $user) {

            if ($user->hasRole('student')) {
                $user->removeRole('student');
            }

            $user->update([
                'remember_token' => null
            ]);

            if ($teacher) {
                $teacher->update([
                    'activate_token' => null,
                    'is_active' => 1
                ]);

                $user->assignRole('teacher');


                return Redirect(route('dashboard'))->with(['success' => 'Verifikasi Berhasil, Silahkan Login']);
            }
        });

        return redirect(route('teacher.verify'))->with(['error' => 'Invalid Verifikasi Token']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        try {
            $teacher->delete();

            $user = User::find($teacher->user_id);
            $user->removeRole('teacher');
            $user->assignRole('student');

            return redirect()->back()->with(['success' => 'Status Dosen Dihapus!']);
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
            throw $error;
        }
    }
}
