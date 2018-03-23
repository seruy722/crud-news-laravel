<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use ValidatesRequests;

    public function index()
    {
        return view('news.index', ['lastNews' => News::orderBy('id', 'desc')->paginate(5)]);
    }

    public function view($id)
    {
        return view('news.view', ['one' => News::find($id)]);
    }

    public function create()
    {
        return view('news.create');
    }

    public function show()
    {
        return view('news.show', ['all' => News::orderBy('created_at', 'desc')->paginate(10)]);
    }

    public function edit($id)
    {
        return view('news.edit', ['one' => News::findOrFail($id)]);
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
        News::where('id', $id)->update($arr);
        return redirect()->route('news.show');
    }

    public function destroy($id)
    {
        $res = News::find($id);
        $imageField = $res->image_name;
        if ($imageField != 'nofoto.jpg') {
            unlink(public_path() . '/images/' . $imageField);
        }
        News::destroy($id);
        return redirect()->route('news.show');
    }

    public function delete(Request $request)
    {
        $arrID = $request->only('check');
        $res = News::find($arrID['check']);
        if ($res) {
            foreach ($res as $item) {
                $imageField = $item->image_name;
                if ($imageField != 'nofoto.jpg') {
                    unlink(public_path() . '/images/' . $imageField);
                }
            }
            News::destroy($arrID['check']); 
        }
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
        News::create($arr);
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
            'title' => 'required|min:2|max:200|unique:news,title,' . $id,
            'description' => 'required|string|max:5000|min:2',
            'file' => 'image',
        ], [
            'title.required' => 'Поле Заголовок незаполнено.',
            'title.min' => 'Поле Заголовок не может быть меньше 2 символов.',
            'title.max' => 'Поле Заголовок не может быть больше 200 символов.',
            'title.unique' => 'Новость с таким названием уже существует',
            'description.required' => 'Поле Текст незаполнено.',
            'description.max' => 'Поле Текст не может быть больше 5000 символов.',
            'description.min' => 'Поле Текст не может быть меньше 2 символов.',
            'file.image' => 'Файл должен быть изображением',
        ]);
    }

}
