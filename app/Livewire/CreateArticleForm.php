<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;

class CreateArticleForm extends Component
{
    public $categories;

    #[Validate('required|min:3')]
    public $title;

    #[Validate('required|min:10')]
    public $description;

    #[Validate('required|numeric')]
    public $price;

    #[Validate('required')]
    public $category_id;

    public function mount()
    {
        $this->categories = Category::orderBy('name')->get();
    }

    public function store()
    {
        $this->validate();

        Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'user_id' => Auth::id(),
        ]);


        $this->reset([
            'title',
            'description',
            'price',
            'category_id',
        ]);

        return redirect()->route('articles.index')
    ->with('success', 'Annuncio inserito correttamente!');

    }

    public function render()
    {
        return view('livewire.create-article-form');
    }
}
