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
                    $expertisesQuery->where('send_to_si', '1')
                            ->where('send_to_si_reviewers', '0')
                            ->where('accept_si_reviewers', '0');
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
                

                $executorCount = Expertise::join('expertise_role_status', 'expertise.id', '=', 'expertise_role_status.expertise_id')
                ->where(function ($query) use ($user) {
                    $query->where('expertise.send_to_si_reviewers', '1')
                          ->orWhere('expertise.send_to_gts_reviewers', '1');
                })
                ->where('expertise_role_status.user_id', $user->id)
                ->where('expertise_role_status.executor', 1)
                ->distinct()
                ->count();


                $approveConfirmersCount = Expertise::where(function ($query) use ($user) {
                    if ($user->hasRole('ROLE_KIB_EXPERTISE_CONFIRMER')) {
                        $query->where('send_to_kib', '1');
                            //   ->where('accept_kib_reviewers', '1');
                    } elseif ($user->hasRole('ROLE_SI_EXPERTISE_CONFIRMER')) {
                        $query->where('send_to_si', '1')
                              ->where('accept_si_reviewers', '1');
                    } else {
                        // If the user doesn't have the required role, don't display anything
                        $query->whereRaw('1=0');
                    }
                })->count();




                $outboxCountQuery = Expertise::join('expertise_role_status as signer_status', function ($join) use ($user) {
                    $join->on('expertise.id', '=', 'signer_status.expertise_id')
                         ->where('signer_status.signing', 1);
                })
                ->leftJoin('expertise_role_status as approver_status', function ($join) {
                    $join->on('expertise.id', '=', 'approver_status.expertise_id')
                         ->where(function ($query) {
                             $query->where('approver_status.approve', 1)
                                   ->orWhere('approver_status.user_id', 0);
                         });
                })
                ->where(function ($query) {
                    $query->where('expertise.go_approve', 1)
                          ->where('expertise.send_to_go_signer', 1);
                })
                ->orWhere(function ($query) {
                    $query->where(function ($query) {
                        $query->orWhere('approver_status.user_id', 0);
                    })
                    ->where('expertise.go_approve', 0);
                })
                ->orWhere(function ($query) use ($user) {
                    if ($user->hasRole('ROLE_SI_EXPERTISE_SIGNER')) {
                        $query->where('expertise.send_to_si_signer', '=', 1);
                    }
                });
    
                if ($user->hasRole('ROLE_UO_EXPERTISE_SIGNER')) {
                    $outboxCountQuery->leftJoin('expertise_role_status as uo_signer_status', 'expertise.id', '=', 'uo_signer_status.expertise_id')
                        ->orWhere(function ($query) use ($user) {
                            $query->where('uo_signer_status.user_id', $user->id)
                                  ->where('uo_signer_status.signing', 1)
                                  ->where('expertise.send_to_uo_signer', 1);
                        });
                }
    
                if ($user->hasRole('ROLE_GO_EXPERTISE_EDITOR') || $user->hasRole('ROLE_GO_EXPERTISE_CONFIRMER')) {
                    $outboxCountQuery->orWhere('expertise.send_to_go_signer', 1);
                }
    
                $outboxCount = $outboxCountQuery->distinct()->count();


                $signerOutboxCount = 0;
            if ($user->hasRole('ROLE_SI_EXPERTISE_SIGNER') || $user->hasRole('ROLE_GTS_EXPERTISE_SIGNER')) {
                $signerOutboxQuery = Expertise::query();

                if ($user->hasRole('ROLE_SI_EXPERTISE_SIGNER')) {
                    $signerOutboxQuery = $signerOutboxQuery->join('expertise_role_status as si_signer_status', function ($join) use ($user) {
                        $join->on('expertise.id', '=', 'si_signer_status.expertise_id')
                             ->where('si_signer_status.user_id', $user->id)
                             ->where('si_signer_status.signing', 1)
                             ->where('expertise.send_to_si_signer', 1);
                    });
                }

                if ($user->hasRole('ROLE_GTS_EXPERTISE_SIGNER')) {
                    $signerOutboxQuery = $signerOutboxQuery->join('expertise_role_status as gts_signer_status', function ($join) use ($user) {
                        $join->on('expertise.id', '=', 'gts_signer_status.expertise_id')
                             ->where('gts_signer_status.user_id', $user->id)
                             ->where('gts_signer_status.signing', 1)
                             ->where('expertise.send_to_gts_signer', 1);
                    });
                }

                $signerOutboxCount = $signerOutboxQuery->distinct()->count();
            }


            session([
                'expertiseInWorkCount' => $expertiseInWorkCount,
                'expertisesAppCount' => $expertisesAppCount,
                // 'expertiseSignerOutboxCount' => $expertiseSignerOutboxCount,
                'outboxCount' => $outboxCount,
                'expertiseInWorkCounts' => $expertiseInWorkCounts,
                'expertiseGoExecutorCount' => $expertiseGoExecutorCount,
                'executorCount' => $executorCount,
                'approveConfirmersCount' => $approveConfirmersCount,
                'signerOutboxCount' => $signerOutboxCount

            ]);
        }

        return $next($request);
    }
}
