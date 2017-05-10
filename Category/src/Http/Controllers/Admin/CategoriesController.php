<?php

namespace Components\Category\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Components\Category\Repositories\Category\CategoryRepository;
use Whole\Core\Logs\Facade\Logs;

class CategoriesController extends Controller
{
    protected $bootstrapslider;

    /**
     * @param BootstrapsliderRepository $bootstrapslider
     */
    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = $this->category->all();
        return view('backend::categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend::categories.create');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
		if ($this->category->saveData('create',$request->all()))
		{
			Flash::success('Başarıyla Kaydedildi');
			Logs::add('process',"Kategori Başarıyla Eklendi. \n");
			return redirect()->route('admin.category.index');
		}else
		{
			Flash::error('Bir Hata Meydana Geldi ve Kaydedilemedi');
			Logs::add('errors',"Kategori Eklerken Hata Meydana Geldi! \n");
			return redirect()->back();
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
		//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->category->find($id);
        return view('backend::categories.edit',compact('category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if ($this->category->saveData('update',$request->all(),$id))
        {
            Logs::add('process',"Kategori Başarıyla Düzenlendi \nID:{$id}");
            Flash::success('Başarıyla Düzenlendi');
            return redirect()->route('admin.category.index');
        }
        else
        {
            Logs::add('errors',"Kategori Düzenlerken Hata Meydana Geldi \nID:{$id}");
            Flash::error('Bir Hata Meydana Geldi ve Düzenlenemedi');
            return redirect()->back();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $message = $this->category->delete($id) ?
            ['success','Başarıyla Silindi'] :
            ['error','Bir Hata Meydana Geldi ve Silinemedi'];
        if($message[0]=="success")
        {
            Logs::add('process',"Kategori Başarıyla Silindi \nID:{$id}");
        }else
        {
            Logs::add('errors',"Kategori Silinemedi \nID:{$id}");
        }
        Flash::$message[0]($message[1]);
        return redirect()->route('admin.category.index');
    }

}
