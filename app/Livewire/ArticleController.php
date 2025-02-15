<?php

namespace App\Livewire;

use App\Livewire\Forms\UpdateForm;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleController extends Component
{

    /* DB::table('articles')
    ->join('tags', 'tag_id','=','articles.tag_id')
    -> select('articles.*','tags.name as tag')
    ->where('user_id', Auth::user()->id)
    ->paginate(5);  */
    
    public string $busqueda = '';
    public bool $openModalUpdate = false;
    public UpdateForm $uForm;

    use WithPagination;
    #[On('onArticuloCreado')]
    public function render()
    {
        $tags = Tag::orderBy('id')->get();
        $articulos = DB::table('articles')->join('tags', 'tag_id', 'tags.id')
            ->select('articles.*', 'tags.name as tag')
            ->where('user_id', '=', Auth::user()->id)
            ->where(function ($q) {
                $q->where('title', 'like', "%{$this->busqueda}%")
                    ->orwhere('content', 'like', "%{$this->busqueda}%")
                    ->orwhere('tags.name', 'like', "%{$this->busqueda}%");
            })
            ->paginate(6);
        return view('livewire.article-index', compact('articulos', 'tags'));
    }
    
    // Métodos para actualizar un artículo

    public function abrirUpdate(Article $article)
    {
        $this->authorize('update', $article);
        $this->openModalUpdate = true;
        $this->uForm->setArticle($article);
    }

    public function update()
    {
        $this->uForm->fUpdate();
        $this->salir();
        $this->dispatch('mensaje', "Artículo editado correctamente.");
    }

    public function salir()
    {
        $this->openModalUpdate = false;
        $this->uForm->fReset();
    }
    
    // Métodos para eliminar un artículo

    public function avisarDelete(Article $article)
    {
        $this->authorize('delete', $article);
        $this->dispatch('onAvisoDelete', $article);
    }

    #[On('delete')]
    public function delete(Article $article)
    {
        // $this->authorize('delete', $article);
        $article->delete();
        $this->dispatch('mensaje', "Artículo eliminado correctamente.");
    }
}
