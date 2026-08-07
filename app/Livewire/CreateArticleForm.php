<?php

namespace App\Livewire;

use App\Jobs\ResizeImage;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateArticleForm extends Component
{
    use WithFileUploads;

    public $categories;

    public $temporary_images = [];

    public $images = [];

    #[Validate('required|min:3')]
    public $title = '';

    #[Validate('required|min:10')]
    public $description = '';

    #[Validate('required|numeric|min:0')]
    public $price = '';

    #[Validate('required|exists:categories,id')]
    public $category_id = '';

    public function mount()
    {
        $this->categories = Category::orderBy('name')->get();
    }

    public function updatedTemporaryImages()
    {
        $this->validate([
            'temporary_images.*' => 'image|max:2048',
        ]);

        foreach ($this->temporary_images as $image) {
            $this->images[] = $image;
        }
    }

    public function removeImage($key)
    {
        unset($this->images[$key]);

        $this->images = array_values($this->images);
    }

    public function store()
    {
        $this->validate();

        $article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'user_id' => Auth::id(),
            'is_accepted' => null,
        ]);

        if (count($this->images)) {

            foreach ($this->images as $image) {

                $newFileName = "articles/{$article->id}";

                $newImage = $article->images()->create([
                    'path' => $image->store($newFileName, 'public'),
                ]);

                dispatch(new ResizeImage($newImage->path, 300, 300));
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        session()->flash('success', 'Annuncio inserito correttamente!');

        $this->reset();

        return redirect()->route('articles.index');
    }

    public function render()
    {
        return view('livewire.create-article-form');
    }
}