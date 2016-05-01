<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use View;
use Auth;
use App\Task;
//use Item;
use App\Item;

class ToDoListController extends Controller
{
    /**
     * Show the The ToDoList
     *
     * @return \Illuminate\Http\Response
     */
    public function getToDoList()
    {
        ini_set('xdebug.max_nesting_level', 200);

        $tasks = Task::orderBy('created_at', 'asc')->get();
        return view('toDoList.ToDoList', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Add tasks to To Do List
     *
     * @return \Illuminate\Http\Response
     */
    function postToDoList()
    {
        $validator = Validator::make(Input::all(),
            array(
                'name' => 'required|max:255',
            )
        );

        /* $validator = Validator::make($request->all(), [
             'name' => 'required|max:255',
         ]);*/

        if ($validator->fails()) {
            return redirect('/task')
                ->withInput()
                ->withErrors($validator);
        }

        // Create The Task...
        $task = new Task;
        $task->name = Input::get('name');;
        $task->save();

        return redirect('/task');
    }


    /**
     * Delete tasks from To Do List
     *
     * @return \Illuminate\Http\Response
     */
    function deleteTask(Task $task)
    {
        $task->delete();

        return redirect('/task');
    }

}
