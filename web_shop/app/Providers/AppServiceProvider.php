<?php

namespace App\Providers;

use App\Http\Repositories\Category\CategoryRepo;
use App\Http\Repositories\Category\CategoryRepoInterface;
use App\Http\Repositories\Product\ProductRepo;
use App\Http\Repositories\Product\ProductRepoInterface;
use App\Http\Repositories\User\UserRepository;
use App\Http\Repositories\User\UserRepositoryInterface;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\Category\CategoryServiceInterface;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Product\ProductServiceInterface;
use App\Http\Services\User\UserService;
use App\Http\Services\User\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(UserServiceInterface::class, UserService::class);
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);

        $this->app->singleton(CategoryServiceInterface::class, CategoryService::class);
        $this->app->singleton(CategoryRepoInterface::class, CategoryRepo::class);

        $this->app->singleton(ProductServiceInterface::class, ProductService::class);
        $this->app->singleton(ProductRepoInterface::class, ProductRepo::class);

    }
}
