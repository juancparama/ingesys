<?php

namespace App\Listeners;

use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class SidebarNotifications
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(BuildingMenu $event)
    {

        // Menú dinámico de incidencias pendientes para admin
        if (Auth::user()->roles[0]->id==1) {

            $menuitem = [
                'key'         => 'pendientes',
                'text'        => 'Pendientes',
                'route' =>  'admin.pendientes',
                'icon'        => 'far fa-fw fa-file-alt',
                'can'   => 'admin'
            ];

            $incidencias = Ticket::where('status', '=', 0)->count();
        
            if ($incidencias > 0) {
                $menuitem['label'] = Ticket::where('status', '=', 0)->count();
                $menuitem['label_color'] = 'success';
            }

            $event->menu->addAfter('todas', $menuitem);
        }

        
        // Menú dinámico de incidencias pendientes para manage (Mtto y Prevención)

        if (Auth::user()->getPermissionsViaRoles()[0]->id==2) {
                        
            if (Auth::user()->roles[0]->id==2) {
                $type = 1;
            } elseif (Auth::user()->roles[0]->id==3) {
                $type = 2;
            }

            $incidencias = Ticket::where('type_id', '=', $type??NULL)->where('status', '=', 1)->count();
            
            $menuitem = [
                'key'         => 'manage_pendientes',
                'text'        => 'Inicio',
                'route' =>  'manage.index',
                'icon'        => 'fas fa-fw fa-home',
                'can'   => 'manage'
            ];

            if ($incidencias > 0) {
                $menuitem['label'] = Ticket::where('type_id', '=', $type??NULL)->where('status', '=', 1)->count();
                $menuitem['label_color'] = 'success';
            }

            $event->menu->addBefore('manage_cerradas', $menuitem);
        }
    }
}
