<?php

namespace App\Containers\Stripe\Providers;

use App\Ship\Provider\Abstracts\ServiceProviderAbstract;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Laravel\StripeServiceProvider;

/**
 * Class MainServiceProvider.
 *
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class MainServiceProvider extends ServiceProviderAbstract
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Container Service Providers.
     *
     * @var array
     */
    public $containerServiceProviders = [
        StripeServiceProvider::class,
    ];

    /**
     * Container Aliases
     *
     * @var  array
     */
    public $containerAliases = [
        'Stripe' => Stripe::class,
    ];

    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $this->loadContainersInternalProviders();
    }

    /**
     * Register bindings in the container.
     */
    public function register()
    {
        $this->loadContainersInternalAliases();
    }
}
