<?php

namespace App\Providers;

use App\Nova\Contract;
use App\Nova\Dashboards\Main;
use App\Nova\Doctor;
use App\Nova\Drug;
use App\Nova\DrugManufacturer;
use App\Nova\Employee;
use App\Nova\Patient;
use App\Nova\Pharmacy;
use App\Nova\Prescription;
use App\Nova\Seen;
use App\Nova\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::withBreadcrumbs();

        Nova::mainMenu(function (Request $request){
            return [
                MenuSection::dashboard(Main::class)->icon("chart-bar"),

                MenuSection::make("Doctors", [
                    MenuItem::resource(Doctor::class),
                    MenuItem::resource(Seen::class),
                ])
                    ->collapsable()
                    ->icon("user"),

                MenuSection::make("Patients", [
                    MenuItem::resource(Patient::class),
                    MenuItem::resource(Prescription::class),
                ])
                    ->collapsable()
                    ->icon("user"),

                MenuSection::make("Pharmacies", [
                    MenuItem::resource(Pharmacy::class),
                    MenuItem::resource(Contract::class),
                ])
                    ->collapsable()
                    ->icon("home"),

                MenuSection::make("Drugs", [
                    MenuItem::resource(Drug::class),
                    MenuItem::resource(DrugManufacturer::class),
                ])
                    ->collapsable()
                    ->icon("plus-circle"),

                MenuSection::make("Employees", [
                    MenuItem::resource(Employee::class),
                    MenuItem::resource(Work::class),
                ])
                    ->collapsable()
                    ->icon("user-group"),
            ];
        });
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
