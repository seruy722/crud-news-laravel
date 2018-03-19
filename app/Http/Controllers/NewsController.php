<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\DateModel;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use ValidatesRequests;

    public function index()
    {
        return view('news.index', ['lastNews' => (new News)->countElem('id','desc',5)]);
    }

    public function view($id)
    {
        return view('news.view', ['one' => (new News)->one($id)]);
    }

    public function create()
    {
        return view('news.create');
    }

    public function show()
    {
        return view('news.show', ['all' => (new News)->all()]);
    }

    public function edit($id)
    {
        return view('news.edit', ['one' => (new News)->one($id)]);
    }

    public function update(Request $request, $id)
    {
        $this->validFields($request, $id);
        $file = $this->saveUploadFile('image', $request, $id);
        $arr = $request->all();
        if (is_string($file)) {
            $arr['image_name'] = $file;
        } else {
            $arr = $file;
        }
        unset($arr['_token'], $arr['image']);
        (new News)->update($id, $arr);
        return redirect()->route('news.show');
    }

    public function destroy($id)
    {
        $imgName = (new News)->one($id);
        $file= $imgName->image_name;
        unlink(public_path() . '/images/'.$file);
        (new News)->destroy($id);
        return redirect()->route('news.show');
    }

    public function add(Request $request)
    {
        $this->validFields($request);

        $file = $this->saveUploadFile('image', $request);
        $arr = $request->all();
        unset($arr['_token'], $arr['image']);
        if (is_string($file)) {
            $arr['image_name'] = $file;
        } else {
            $arr = $file;
        }
        (new News)->save($arr);
        return redirect()->route('news.index');
    }

    public function saveUploadFile($file, $req, $id = null)
    {

        if ($req->hasFile($file)) {
            $image = $req->file($file);
            $fileName = 'IMG-' . md5(microtime() . rand()) . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $fileName);
        }
        if ($id) {
            if ($req->hasFile($file)) {
                return $fileName;
            } else {
                return $arr = $req->except('image');
            }
        } else {
            if ($req->hasFile($file)) {
                return $fileName;
            } else {
                return 'nofoto.jpg';
            }
        }
    }

    public function validFields($req, $id = '')
    {
        $this->validate($req, [
            'title' => 'required|min:2|max:500|unique:news,title,' . $id,
            'text' => 'required|string|max:100|min:2',
            'file' => 'image',
        ], [
            'title.required' => 'Поле Фамилия незаполнено.',
            'title.min' => 'Поле Фамилия не может быть меньше 2 символов.',
            'title.max' => 'Поле Фамилия не может быть больше 100 символов.',
            'text.required' => 'Поле Имя незаполнено.',
            'text.max' => 'Поле Имя не может быть больше 100 символов.',
            'text.min' => 'Поле Имя не может быть меньше 2 символов.',
            'file.image' => 'Файл должен быть изображением',
            'title.unique' => 'Заголовок с таком именем уже существует',
        ]);
    }

}
