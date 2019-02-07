<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\Role;
use Session;
class MenuServiceProvide extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        //

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {

         

            $event->menu->add('MAIN NAVIGATION');
             if(Session::has('role')){

                if(Session::get('role') == 1){
  $event->menu->add('Dashboard');
  $event->menu->add([
            'text'    => 'Manage Restaurant',
            'icon'    => 'share',
            'url' => 'admin/restaurant',
        ]);
  $event->menu->add('ACCOUNT SETTINGS');
  $event->menu->add([
            'text' => 'Settings',
            'url'  => 'admin/settings',
            'icon' => 'user',
        ]);


}

                if(Session::get('role') == 2){


      $event->menu->add([
                'text' => 'Food Category',
                'url' => 'admin/category',
            ]);

            $event->menu->add([
                'text' => 'Food Items',
                'url' => 'admin/items',
            ]);

   $event->menu->add('ITEM SETTINGS');
  $event->menu->add([
            'text' => 'Recommended',
            'url'  => 'admin/item/recommend',
            'icon' => 'user',
        ]);
               $event->menu->add('ORDER MANAGEMENT');
  $event->menu->add([
            'text' => 'Takeaway',
            'url'  => 'admin/orders',
       
        ]);

    $event->menu->add([
            'text' => 'Party',
            'url'  => 'admin/party',
          
        ]);

     $event->menu->add([
            'text' => 'Pax',
            'url'  => 'admin/packs',
          
        ]);

    


  $event->menu->add('ACCOUNT SETTINGS');
  $event->menu->add([
            'text' => 'Settings',
            'url'  => 'admin/settings',
            'icon' => 'user',
        ]);


                    }

}



        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
