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
        $this->loadViewsFrom(__DIR__ . '/views', 'Admin'); // 视图目录指定
        $this->publishes([
            __DIR__ . '/views'            => base_path('resources/views/vendor/admin'),  // 发布视图目录到resources 下
            __DIR__ . '/config/admin.php' => config_path('admin.php'), // 发布配置文件到 laravel 的config 下
        ]);
        $this->commands($this->commands);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 单例绑定服务
        $this->app->singleton('admin', function ($app) {
            return new Admin($app['session'], $app['config']);
        });

    }

    /**
     * @return array
     */
    public function provides()
    {
        // 因为延迟加载 所以要定义 provides 函数 具体参考laravel 文档
        return ['admin'];
    }
}
