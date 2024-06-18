<?php

namespace App\Http\Middleware;

use Closure;


use Illuminate\Support\Facades\Auth;
use App\Models\Expertise;

class ExpertiseCountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            // В работе
            $expertiseInWorkCount = Expertise::where(function ($query) use ($user) {
                $query->where('user_id', $user->id)
                      ->where('goverment_id', $user->government_id)
                      ->where('draft', '1');
            })->count();

            // На согласовании
            $expertisesAppCount = 0;
            if ($user->hasRole('ROLE_GO_EXPERTISE_CONFIRMER') ||
                $user->hasRole('ROLE_GO_EXPERTISE_EDITOR') ||
                $user->hasRole('ROLE_GO_EXPERTISE_SIGNER') ||
                $user->hasRole('ROLE_UO_EXPERTISE_CONFIRMER')) {

                $expertisesQuery = Expertise::join('expertise_role_status', 'expertise.id', '=', 'expertise_role_status.expertise_id')
                    ->where('expertise.goverment_id', $user->government_id)
                    ->where('expertise.send', '1')
                    ->where('expertise_role_status.approve', 1);

                if ($user->hasRole('ROLE_GO_EXPERTISE_CONFIRMER') || $user->hasRole('ROLE_UO_EXPERTISE_CONFIRMER')) {
                    $expertisesQuery->where('expertise_role_status.user_id', $user->id);
                }

                $expertisesAppCount = $expertisesQuery->count();
            }

            $expertiseSignerOutboxCount = 0;
            if ($user->hasRole('ROLE_GO_EXPERTISE_SIGNER') || $user->hasRole('ROLE_UO_EXPERTISE_SIGNER')) {
                $expertisesQuery = Expertise::join('expertise_role_status', 'expertise.id', '=', 'expertise_role_status.expertise_id')
                    ->where('expertise.goverment_id', $user->government_id)
                    ->where('expertise.send', '1')
                    ->where('expertise_role_status.approve', 1);

                if ($user->hasRole('ROLE_GO_EXPERTISE_SIGNER')) {
                    $expertisesQuery->where('expertise_role_status.user_id', $user->id);
                }

                $expertiseSignerOutboxCount = $expertisesQuery->count();
            }



            $expertiseInWorkCounts = 0;
            $expertisesQuery = Expertise::query();
        
                if ($user->hasRole('ROLE_UO_EXPERTISE_REVIEWER')) {
                    $expertisesQuery->where(function($query) {
                        $query->where('send_to_uo_reviewer', '1')
                            ->orWhere('accept_uo_reviewer', '1');
                    });
                } elseif ($user->hasRole('ROLE_KIB_EXPERTISE_EXECUTOR')) {
                    $expertisesQuery->where('send_to_kib', '1');
                } elseif ($user->hasRole('ROLE_SI_EXPERTISE_CONFIRMER')) {
                    $expertisesQuery->where('send_to_si', '1');
                } elseif ($user->hasRole('ROLE_GTS_EXPERTISE_CONFIRMER')) {
                    $expertisesQuery->where('send_to_gts', '1');
                } elseif ($user->hasRole('ROLE_UO_EXPERTISE_DANA')) {
                    $expertisesQuery->where('send_to_uo', '1');
                } else {
                    // Если у пользователя нет соответствующей роли, не отображаем ничего
                    $expertisesQuery->whereRaw('1=0');
                }
                $expertiseInWorkCounts = $expertisesQuery->count();

                $expertiseGoExecutorCount = Expertise::where('expertise.send_to_uo_si', '1')
                ->where('expertise.send_to_uo_gts', '1')
                ->where('expertise.user_id', Auth::id())
                ->count();
                



            session([
                'expertiseInWorkCount' => $expertiseInWorkCount,
                'expertisesAppCount' => $expertisesAppCount,
                'expertiseSignerOutboxCount' => $expertiseSignerOutboxCount,
                'expertiseInWorkCounts' => $expertiseInWorkCounts,
                'expertiseGoExecutorCount' => $expertiseGoExecutorCount 
            ]);
        }

        return $next($request);
    }
}
