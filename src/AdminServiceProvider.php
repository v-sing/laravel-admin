<?php

namespace Future\Admin;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $commands = [
        Console\AdminCommand::class,
        Console\MakeCommand::class,
        Console\MenuCommand::class,
        Console\InstallCommand::class,
        Console\PublishCommand::class,
        Console\UninstallCommand::class,
        Console\ImportCommand::class,
        Console\CreateUserCommand::class,
        Console\ResetPasswordCommand::class,
        Console\ExtendCommand::class,
        Console\ExportSeedCommand::class,
    ];
    /**
     * @var bool
     *
     */
    protected $defer = true; // 延迟加载服务

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // 单例绑定服务
        $this->app->singleton('admin', function ($app) {
            return new Admin($app['session'], $app['config']);
        });

//        $this->commands($this->commands);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(future_path('/resources/views'), 'admin'); // 视图目录指定
//        if($this->app->runningInConsole()){
//            $this->publishes([
//                future_path('/resources/views')  => $this->app->resourcePath('views/vendor/admin'),
//            ], 'laravel-admin');
//        }
        $this->publishes([
            future_path('/config/admin.php') => config_path('admin.php'), // 发布配置文件到 laravel 的config 下
        ]);

    }

}
