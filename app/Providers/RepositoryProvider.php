<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\{RepositoryProfile,RepositoryUser,RepositoryContact,RepositoryPage,RepositorySetting,RepositoryService,RepositoryPackage,RepositoryAttachment,RepositoryOrder,RepositoryAbout};
use App\RepositoryInterface\{ProfileInterface,UserInterface,ContactInterface,PageInterface,SettingInterface,ServiceInterface,PackageInterface,AttachmentInterface,OrderInterface,AboutInterface};
class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ServiceInterface::class,RepositoryService::class);
        $this->app->bind(PackageInterface::class,RepositoryPackage::class);
        $this->app->bind(AttachmentInterface::class,RepositoryAttachment::class);
        $this->app->bind(OrderInterface::class,RepositoryOrder::class);
        $this->app->bind(AboutInterface::class,RepositoryAbout::class);
        $this->app->bind(SettingInterface::class,RepositorySetting::class);
        $this->app->bind(PageInterface::class,RepositoryPage::class);
        $this->app->bind(ContactInterface::class,RepositoryContact::class);
        $this->app->bind(UserInterface::class,RepositoryUser::class);
        $this->app->bind(ProfileInterface::class,RepositoryProfile::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
