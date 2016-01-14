<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ProjectsController extends Controller
{

    protected $rules = [
      'name' => ['required','min:1','max:15','alpha_dash'],
        'slug'=>['required','alpha_dash','min:1','max:15'],
        'description' => ['required','min:3','max:50'],
    ];





    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    // Ici on va faire en sorte d'afficher les taches des gens qui les ont créé , on vérifie ca grace a leur email
        // comme ca jean pourra pas voir ce que claude a fait par exemple

        $email = Auth::user();
        $projects = Project::all()->where('mail',$email->email);
        return view('pages.showProjects', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.projectCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,$this->rules);
        $input = Input::all();
        $input['mail'] = Auth::user()->email;
        Project::create($input);
        return Redirect::route('projects')->with('message', 'Liste de tache ajoutée.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('pages.showTask', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('pages.projectEdit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project, Request $request)
    {



        $this->validate($request, $this->rules);

        $input = array_except(Input::all(),'_method');
        $project->update($input);

        return Redirect::route('projects',$project->slug)->with('message', 'Liste de tache modifiée.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return Redirect::route('projects')->with('message', 'Project deleted.');
    }
}
