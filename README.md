# CRUD rest-api based on Laravel

[![Build Status](https://travis-ci.com/ishaburov/crud-rest-api.svg?branch=master)](https://travis-ci.com/ishaburov/crud-rest-api)
[![Latest Stable Version](https://poser.pugx.org/shaburov/laravel-crud-rest-api/v)](//packagist.org/packages/shaburov/laravel-crud-rest-api)
[![Total Downloads](https://poser.pugx.org/shaburov/laravel-crud-rest-api/downloads)](//packagist.org/packages/shaburov/laravel-crud-rest-api)
[![Latest Unstable Version](https://poser.pugx.org/shaburov/laravel-crud-rest-api/v/unstable)](//packagist.org/packages/shaburov/laravel-crud-rest-api)
[![License](https://poser.pugx.org/shaburov/laravel-crud-rest-api/license)](//packagist.org/packages/shaburov/laravel-crud-rest-api)

## Intro

 This package created for create fast crud operations, 
    for example Pagination,Object list without pagination, Store, Update, Destroy and Show
   
## Console

    Publish config 
    php artisan vendor:publish --provider="CrudRestApi\CrudServiceProvider"
    Run controller tests
    php artisan crud-rest-api:test
    Run migrations
    php artisan crud-rest-api:migrate {param_from_migrate}

You can activate default routes in config and will see how it's working
load_routes => true on default false
And execute command php artisan route:list

## How to use it

 Create Controller and extends it from CrudBaseController 
    or create your Controller on based interfaces and traits
    and connect your model using method setModelClass   



    abstract class MyController extends CrudController implements
        CrudSaveInterface, CrudIndexInterface,
        CrudStoreInterface, CrudListInterface,
        CrudUpdateInterface, CrudDestroyInterface,
        CrudRestoreInterface, CrudShowInterface
    {
        use CrudListTrait,
            CrudIndexTrait,
            CrudStoreTrait,
            CrudIndexTrait,
            CrudUpdateTrait,
            CrudRestoreTrait,
            CrudDestroyTrait,
            CrudSaveTrait,
            CrudShowTrait;

        abstract public function setModelClass(): string;
    }

    class ArticleController extends MyController
    {
        public function setModelClass(): string
        {
            return Article::class;
        }
    }

## Validations

You should use CrudValidatorInterface and use Trait CrudValidatorTrait
    And in method setValidations connect your validations     
    
    public function setValidations(): void
    {
       $this->validateShow = ArticleShowRequest::class;
       $this->validateStore = ArticleStoreRequest::class;
       $this->validateIndex = null;
       $this->validateList = null;
       $this->validateUpdate = null;
       $this->validateDelete = null;
    }

## Change behavior

    All methods include in yourself methods 
    for change default behaviors
    
    public function beforeList();
    public function afterList();
    
    public function updating()
    public function updated($model)

    public function creating()
    public function created($model)

    public function saving()
    public function saved($model)

    public function beforeIndex()
    public function afterIndex()

    public function beforeShow()
    public function afterShow()
    
    public function deleting()
    public function deleted()
   
   <a href="https://github.com/ishaburov/crud-rest-api/blob/master/src/CrudRestApi/Http/Controllers/ArticleController.php" target="_blank">Controller example</a>

## Routes

You should add routes in your routes file

    Route::namespace('App\Http\Controllers')->group(function (){
        Route::resource('articles', 'ArticleController');
    });

## Parameters

index [GET] include parameters 
    page - current page // articles?page=1
    per_page - number of objects in the list // articles?per_page=1
    list - for get all object // articles?list    

 You can use $this->request and process it in behaviors

     public function beforeIndex(): void
     {
         $title =  $this->request->get('title');
         $this->state
             ->select(['id','title','category_id',])
             ->where('title', $title)
             ->with('category:id,title');       
     }   
 
     or use $this->requestData and get parameter and rewrite it

     public function updating(): void
     {
         $this->requestData['title'] = Str::lower($this->requestData['title']);
     }   

## Config 
 
    'load_routes' => false,
    'migration_dir' => database_path()."/migrations/crud" // path export migrations - not required ,
    'per_page' => [
            'key' => 'per_page', // key for get parameter
            'value' => 10, // default value
            'limit' => 100, // max value
    ],   
    
## In the future

#### Generating controllers
#### Limits on the number of pages for all Controllers separately
#### And more...
    


  
