<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$courses = Course::paginate(12);
		return view('course.index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
		return view('course.show', ['course' => $course]);
    }

	public function showLesson(Course $course, Lesson $lesson)
	{
		# code...
		return view('course.lesson.show', ['course' => $course, 'lesson' => $lesson]);
	}

	public function createLesson(Course $course)
	{
		# code...
		return view('course.lesson.create', compact('course'));
	}

	public function storeLesson(Course $course, Request $request)
	{
		# code...
		$lesson = $course->lessons()->create([
			'title' => $request->title,
			'description' => $request->description,
			'duration' => $request->duration,
			'episode' => $request->episode
		]);

		if($request->hasFile('cover_file')) {
			$cover_path = Storage::putFileAs('courses/' . $course->id . '/lessons/' . $lesson->id . '/cover' , new File($request->file('cover_file')), $request->file('cover_file')->getClientOriginalName());
			// dd($cover_path);
			$lesson->cover_url = $cover_path;
		}
		
		if($request->hasFile('video_file')) {
			$video_path = Storage::putFileAs('courses/' . $course->id . '/lessons/' . $lesson->id . '/videos' , new File($request->file('video_file')), $request->file('video_file')->getClientOriginalName());
			$lesson->video_url = $video_path;
		}

		$lesson->update();

		toast('Lesson created successfully','success','top-right');

		return redirect()->route('courses.lesson', ['course' => $course->id, 'lesson' => $lesson->id]);
	}

	public function editLesson(Course $course, Lesson $lesson)
	{
		# code...
		return view('course.lesson.edit', compact('course','lesson'));
	}

	public function updateLesson(Course $course, Lesson $lesson, Request $request)
	{
		# code...		
		// dd($request->all());

		$lesson->fill($request->except(['cover_file','video_file']));

		if($request->hasFile('cover_file')) {
			$cover_path = Storage::putFileAs('courses/{$course->id}/lessons/{$lesson->id}/cover' , new File($request->file('cover_file')), $request->file('cover_file')->getClientOriginalName());
			// dd($cover_path);
			$lesson->cover_url = $cover_path;
		}
		
		if($request->hasFile('video_file')) {
			$video_path = Storage::putFileAs('courses/{$course->id}/lessons/{$lesson->id}/videos' , new File($request->file('video_file')), $request->file('video_file')->getClientOriginalName());
			$lesson->video_url = $video_path;
		}
		
		$lesson->update();

		toast('Lesson Updated successfully!', 'success', 'top-right');

		return redirect()->back();
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
