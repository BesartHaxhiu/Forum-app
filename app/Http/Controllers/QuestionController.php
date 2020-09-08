<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpFoundation\Response;
use App\Model\Question;
use Illuminate\Http\Request;
use App\Http\Resources\QuestionResource;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return QuestionResource::collection(Question::latest()->get()); //This line gets all the latest questions
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //auth()->user()->question()->create($request->all());
        Question::create($request->all()); // we use this when we write manually the user_id p.s(user_id = 1) in postman
                                            //otherwise we have to use the "auth()->user" to get the id of user dynamically 
        return response('Created', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question) // the show part requires an id (default)
    {
        //Show function does Route Model Binding, is the simple way of telling that this
        // function provides the id of the question by default
        return new QuestionResource($question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return response('Updated', Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question) // the route model binding is in parameters
    //-> Question $question <- here is the model binding that binds the question controller
    // with model controller.
    {
        $question->delete();
        return response(null, Response::HTTP_NO_CONTENT); //201 is the status code generated on postman when
                                            // the api is deleted. 
    }
}
