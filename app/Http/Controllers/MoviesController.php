<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use App\Http\Requests\MoviesRequest;
use Intervention\Image\ImageManager;
use App\Movies;
use App\MoviesCategories;

class MoviesController extends Controller
{
    
    private $movie;
    private $filesystem;
    private $imageManager;
    
        public function __construct(Movies $movie, Filesystem $filesystem, ImageManager $imageManager)
        {
            $this->movie = $movie;
            $this->filesystem = $filesystem;
            $this->imageManager = $imageManager;
           
        } 
        
        public function index()
        {
           $movies = $this->movie->orderBy('id', 'DESC')->paginate(6);
    
            return view('movies.index', compact('movies'));
        }

        public function admin()
        {
           $movies = $this->movie->orderBy('id', 'DESC')->paginate(6);
    
            return view('movies.admin', compact('movies'));
        }
        
        public function create()
        {
            $categories = moviesCategories::all();
            
            return view('movies.create', compact('categories'));
        }
    
        public function store(MoviesRequest $request)
        {
            // dapetin data inputan kecuali photo
            $movie = $request->except("photo");
    
            // Cek Mengupload photo
            if($request->hasFile('photo')) {
                $movie['photo'] = $this->generatePhoto($request->file('photo'), $request->except('photo'));
            }
            $this->movie->create($movie);
    
            session()->flash('succses_message', 'Data udah tercreate C4hKuPlUk!');
            return redirect('/admin');  // --> untuk memindahkan nya ke movie
    
            // dd($request->all());  // --> sama fungsinya dengan echo
        }


        // SEARCH
        public function search(Request $request)
        {
    
            $keyword = $request->input('keyword');
            
    
            $movies =  $this->movie->where('title', 'LIKE', "%$keyword%")
                        ->orWhere('id', 'LIKE', "%$keyword%")
                        ->orWhere('year', 'LIKE', "%$keyword%")
                        ->orWhere('description', 'LIKE', "%$keyword%")
                        ->orderBy('id', 'DESC')->paginate(10); 
                        
            $movies->appends(['keyword' => $keyword]); //--> masukin ke parameternya
            //--> mencari kata yang mirip,
            // % = mencari di awal kata atau di akhr kata, teganrung pada penempatannya
    
            return view('movies.search', compact('movies'));
               
        }


        public function detail($id)
        {
            $movies = $this->movie->find($id);
            
            return view('movies.detail', compact('movies'));
        }

        public function destroy($id)
        {
    
            $movie = $this->movie->find($id);
    
            if($movie) {
                $movie->delete();
            }
    
            return redirect()->back();
        }
    

        public function edit($id)
        {
            $movies = $this->movie->find($id);
            $categories = moviesCategories::all();
            
            return view('movies.edit', compact(['movies', 'categories']));
        }
        public function update($id, MoviesRequest $request)
        {
            $movieForm = $request->except('photo');
            if($request->hasFile('photo')) {
               
               $movieForm['photo'] = $this->generatePhoto($request->file('photo'), $movieForm);
            }
    
            $movie = $this->movie->find($id);
    
            if($movie) {
                $movie->update($movieForm);
            }
    
            session()->flash('succses_message', 'Data udah terupdate C4hKuPlUk!');
    
            return redirect('/admin');
        }
    

        private function generatePhoto($photo, $data)
        {   
            // --> snake_case = otomatis membuat underscor di namanya!!
            // ex : "muamar kadapi" = muamar_kadapi
            $filename = date('YmdHiS').'-'.snake_case($data['title']).".".$this->filesystem->extension($photo->getClientOriginalName());
            $path = public_path("photos/").$filename;
    
            $this->imageManager->make($photo->getRealPath())->save($path);
            
            return "/photos/".$filename;
           
        }
        
}




