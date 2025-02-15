<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UpdateForm extends Form
{

    public string $title = '';
    public ?Article $article = null;

    #[Validate(['required', 'integer', 'exists:users,id'])]
    public int $user_id = 0;
    #[Validate(['required', 'exists:tags,id'])]
    public int $tag = 0;
    #[Validate(['required', 'string', 'min:10', 'max:250'])]
    public string $content = '';

    public function fUpdate() // Método propio del formulario para actualizar
    {
        $this->validate();
        $this->article->update([
            'tag_id' => $this->tag,
            'title' => $this->title,
            'content' => $this->content,
        ]);
    }

    public function setArticle(Article $article) // Método que sirve para asignar los valores a los atributos 
    {
        $this->article = $article;
        $this->user_id = $article->user_id;
        $this->tag = $article->tag_id;
        $this->title = $article->title;
        $this->content = $article->content;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:5', 'max:20', 'unique:articles,title,' . $this->article->id],
        ];
    }

    public function fReset() {
        $this -> reset();
        $this -> resetValidation();
    }
}
