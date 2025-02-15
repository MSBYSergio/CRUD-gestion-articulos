<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateForm;
use App\Models\Tag;
use Livewire\Component;

class CreateArticle extends Component
{
    public bool $esModalAbierta = false;
    public CreateForm $form;

    public function render()
    {
        $tags = Tag::orderBy('id')->get();
        return view('livewire.create-article', compact('tags'));
    }

    public function create() // Método que inserta, cierra la modal y lanza los eventos
    {
        $this->form->fStore();  
        $this -> esModalAbierta = false;
        $this -> form -> fReset();
        $this->dispatch('onArticuloCreado')->to(ArticleController::class);
        $this->dispatch('mensaje', "Artículo insertado correctamente.");
    }

    public function cancelar() { // Método para cerrar la modal
        $this -> form -> fReset();
        $this -> esModalAbierta = false;
        
    }
}
