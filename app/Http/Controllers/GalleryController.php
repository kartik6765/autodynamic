<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Image;

class GalleryController extends Controller
{

    public function addGallery(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            $gallery = new Gallery;
            $gallery->cat_id = $data['cat_id'];
            $gallery->status = !empty($data['status']) ? 1 : 0;

            if($request->hasFile('image')) {
                $image_tmp = $request->image;
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalName();
                    $filename = strtotime("now") . '.' . $extension;
                    $file_path = 'assets/imgs/gallery/'.$filename;
                    Image::make($image_tmp)->save($file_path);
                    $gallery->image = $filename;
                }
            }
            $gallery->save();
            return redirect('admin/view-gallery/')->with('flash_message_success','Gallery added successfully');
        }
        return view('admin.gallery.add_gallery');
    }

    public function editGallery(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            // dd($data);
            if ($request->hasFile('image')) {
                $image_tmp = $request->image;
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalName();
                    $filename = strtotime("now") . '.' . $extension;
                    $file_path = 'assets/img/gallery/' . $filename;
                    Image::make($image_tmp)->save($file_path);
                }
            } else if (!empty($data['current_image'])) {
                $filename = $data['current_image'];
            } else {
                $filename = '';
            }

            Gallery::where('id',$id)->update([    
                'cat_id' => $data['cat_id'],
                'status' => !empty($data['status']) ? 1 : 0,
            ]);
            return redirect('admin/view-gallery')->with('flash_message_success','Gallery details updated successfully');
        }
        $gallery = Gallery::where('id',$id)->first();
        return view('admin.gallery.edit_gallery')->with(compact('gallery'));
    }

    public function deleteGallery(Request $request, $id){
        Gallery::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_success','Gallery deleted successfully');
    }

    public function viewGallery(Request $request) {
        $gallery = Gallery::select('gallery.id','gallery.cat_id','gallery.status','gallery_category.name')
            ->leftJoin('gallery_category','gallery.cat_id','gallery_category.id')
            ->orderBy('gallery.id','ASC');

        if($request->cat_id){
            $gallery = $gallery->where('gallery.cat_id',$request->cat_id);
        }

        
        return view('admin.gallery.view_gallery', compact('gallery'));
    }
}
