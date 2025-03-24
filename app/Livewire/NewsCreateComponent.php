<?php

namespace App\Livewire;

use App\Models\Author;
use App\Models\News;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class NewsCreateComponent extends Component
{
    // Author properties
    public $author_gender;
    public $author_name;
    public $author_location;
    public $author_email;
    public $author_cell;
    public $author_picture;
    public $author_nat;
    
    // News properties
    public $news_name;
    public $news_title;
    public $news_description;
    public $news_url;
    public $news_urlToImage;
    public $news_publishedAt;
    public $news_content;
    
    // Success message
    public $successMessage = '';

    // Views conent
    public $view_author = false;
    public $view_news = false;
    
    // Validation rules
    protected $rules = [
        'author_gender' => 'required|in:male,female',
        'author_name' => 'required|min:3|max:255',
        'author_location' => 'required',
        'author_email' => 'required|email',
        'author_cell' => 'required',
        'author_picture' => 'required|url',
        'author_nat' => 'required',
        
        'news_name' => 'required|max:255',
        'news_title' => 'required|max:255',
        'news_description' => 'required',
        'news_url' => 'required|url',
        'news_urlToImage' => 'required|url',
        'news_publishedAt' => 'required',
        'news_content' => 'required',
    ];
    
    // Custom validation messages
    protected $messages = [
        'author_gender.required' => 'Please select a gender',
        'author_gender.in' => 'Gender must be male or female',
        'author_name.required' => 'Author name is required',
        'author_name.min' => 'Author name must be at least 3 characters',
        'author_location.required' => 'Author location is required',
        'author_email.required' => 'Author email is required',
        'author_email.email' => 'Please enter a valid email address',
        'author_cell.required' => 'Author phone number is required',
        'author_picture.required' => 'Author picture is required',
        'author_picture.url' => 'Author picture must be a valid URL',
        'author_nat.required' => 'Author nationality is required',
        
        'news_name.required' => 'Source name is required',
        'news_title.required' => 'News title is required',
        'news_description.required' => 'News description is required',
        'news_url.required' => 'News URL is required',
        'news_url.url' => 'Please enter a valid URL',
        'news_urlToImage.required' => 'News image URL is required',
        'news_urlToImage.url' => 'Please enter a valid image URL',
        'news_publishedAt.required' => 'Publication date is required',
        'news_content.required' => 'News content is required',
    ];
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function generateAuthor()
    {
        try {
            $response = Http::get('https://randomuser.me/api/');
            $userData = $response->json()['results'][0];
            $location = $userData['location'];

            $this->author_gender = $userData['gender'];
            $this->author_name = $userData['name']['first'] . ' ' . $userData['name']['last'];
            $this->author_location = $location['street']['name'] . ' ' .$location['street']['number'] . ', ' .$location['city'] . ', ' .$location['state'] . ', ' . $location['country'];
            $this->author_email = $userData['email'];
            $this->author_cell = $userData['cell'];
            $this->author_picture = $userData['picture']['large'];
            $this->author_nat = $userData['nat'];

            $this->view_author = true;
            
        } catch (\Exception $e) {
            session()->flash('error', 'Error generando datos del autor: ' . $e->getMessage());
            $this->view_author = false;
        }
    }
    
    public function generateNews()
    {
        try {
            // Array de palabras clave para búsquedas aleatorias
            $searchTerms = [
                'technology', 'science', 'health', 'business', 'entertainment',
                'sports', 'politics', 'environment', 'education', 'fashion',
                'food', 'travel', 'music', 'art', 'books', 'movies',
                'gaming', 'animals', 'nature', 'history'
            ];
            
            // Selecciona una palabra clave aleatoria
            $randomTerm = $searchTerms[array_rand($searchTerms)];
            
            // Idiomas disponibles (varía según la API)
            $languages = ['en', 'es', 'fr', 'de', 'it'];
            $randomLang = $languages[array_rand($languages)];
            
            // Ordenar los resultados de forma aleatoria
            $sortOptions = ['relevancy', 'popularity', 'publishedAt'];
            $randomSort = $sortOptions[array_rand($sortOptions)];
            
            // Reemplaza con tu clave API de newsapi.org
            $apiKey = '1a952d2c84d446749a84d010bfcc8bd0';
            
            // Realiza la petición con parámetros aleatorios
            $response = Http::get('https://newsapi.org/v2/everything', [
                'q' => $randomTerm,
                'language' => $randomLang,
                'sortBy' => $randomSort,
                'pageSize' => 25, // Solicita varios artículos
                'apiKey' => $apiKey
            ]);
            
            if ($response->successful() && !empty($response['articles'])) {
                // Selecciona un artículo aleatorio de los resultados
                $articles = $response['articles'];
                $randomIndex = array_rand($articles);
                $article = $articles[$randomIndex];
                
                // Asegúrate de que el artículo tenga todos los campos necesarios
                if (isset($article['title']) && !empty($article['title'])) {
                    $this->news_name = $article['source']['name'] ?? 'Unknown Source';
                    $this->news_title = $article['title'];
                    $this->news_description = $article['description'] ?? '';
                    $this->news_url = $article['url'] ?? '';
                    $this->news_urlToImage = $article['urlToImage'] ?? '';
                    $this->news_publishedAt = isset($article['publishedAt']) ? 
                        date('Y-m-d\TH:i', strtotime($article['publishedAt'])) : 
                        date('Y-m-d\TH:i');
                    $this->news_content = $article['content'] ?? '';
                    $this->view_news = true;
                    session()->flash('success', '¡Noticia generada aleatoriamente! Tema: ' . ucfirst($randomTerm));
                } else {
                    session()->flash('error', 'El artículo seleccionado no tiene contenido válido. Intente nuevamente.');
                    $this->view_news = false;
                }
            } else {
                session()->flash('error', 'No se pudieron obtener noticias. Verifique su clave API o los términos de búsqueda.');
                $this->view_news = false;
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Error generando datos de noticias: ' . $e->getMessage());
            $this->view_news = false;
        }
    }
    
    public function saveNews()
    {
        $this->validate();
        
        try {
            // Primero guardamos el autor
            $author = Author::create([
                'gender' => $this->author_gender,
                'name' => $this->author_name,
                'location' => $this->author_location,
                'email' => $this->author_email,
                'cell' => $this->author_cell,
                'picture' => $this->author_picture,
                'nat' => $this->author_nat
            ]);
            
            // Luego guardamos la noticia asociada al autor
            News::create([
                'name' => $this->news_name,
                'author_id' => $author->id,
                'title' => $this->news_title,
                'description' => $this->news_description,
                'url' => $this->news_url,
                'urlToImage' => $this->news_urlToImage,
                'publishedAt' => date("Y-m-d H:i:s", strtotime($this->news_publishedAt)),
                'content' => $this->news_content
            ]);
            
            // Limpiamos el formulario
            $this->reset();
            
            // Mensaje de éxito
            $this->successMessage = 'News saved successfully!';
            
            $this->view_author = false;
            $this->view_news = false;
            
        } catch (\Exception $e) {
            session()->flash('error', 'Error saving news: ' . $e->getMessage());
        }
    }
    
    public function render()
    {
        return view('livewire.news-create-component')
            ->layout('layouts.app', ['title' => 'Crear Noticia']);
    }
}
