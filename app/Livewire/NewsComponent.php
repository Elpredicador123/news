<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class NewsComponent extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';
    
    /**
     * Get the top 3 latest news
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTopNews()
    {
        return News::with('author')
            ->latest('publishedAt')
            ->take(3)
            ->get();
    }
    
    /**
     * Get all news with pagination
     * 
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllNews()
    {
        return News::with('author')
            ->latest('publishedAt')
            ->paginate(10);
    }
    
    public function render()
    {
        return view('livewire.news-component', [
            'topNews' => $this->getTopNews(),
            'allNews' => $this->getAllNews()
        ])->layout('layouts.app', ['title' => 'News']);
    }
}
