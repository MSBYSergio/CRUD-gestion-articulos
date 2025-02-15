<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateForm extends Form
{
    #[Validate(['required', 'string', 'min:5', 'max:15', 'unique:articles,title'])]
    public string $titulo = "";
    #[Validate(['required', 'string', 'min:10', 'max:150'])]
    public string $contenido = "";
    #[Validate(['required', 'integer', 'exists:tags,id'])]
    public int $tag = 0;

    public function fStore()
    {
        $this->validate();
        Article::create([
            'user_id' => Auth::user()->id,
            'tag_id' => $this->tag,
            'title' => $this->titulo,
            'content' => $this->contenido,
        ]);
    }
    
    public function fReset() {
        $this -> reset();
        $this -> resetValidation();
    }

}
