<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertiseVersion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'goverment_id',
        'it_project_id',
        'type_project',
        'expertise_id',
        'version_number',
        'abbr',
        'num_poject',
        'company',
        'address',
        'customer',
        'address_customer',
        'list_docs',
        'dates_start_end',
        'finanсes',
        'is_appointment',
        'is_target',
        'type_ntd',
        'basis_development',
        'links',
        'build_year',
        'gosproject',
        'sostav',
        'modules',
        'po',
        'hosting',
        'selected_is_for_change',
        'selected_is_for_exit',
        'paln_integrations',
        'documents_list',
        'version',
    ];
    

    // Связь с основной моделью Expertise
    public function expertise()
    {
        return $this->belongsTo(Expertise::class);
    }

    public function getISS($id) {
        $iss = InformationSystem::where('id', $id)->first();
        return $iss;
    }

    public function it_project() {
        return $this->belongsTo(It_Project::class, 'it_project_id');
    }
}
