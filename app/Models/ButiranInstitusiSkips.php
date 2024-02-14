<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ButiranInstitusiSkips extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_institusi',
        'nama_pengetua',
        'alamat',
        'negeri',
        'no_telephone',
        'fax',
        'email',
        'laman_web',
        'no_perakuan_pendaftaran',
        'tarikh_tamat_perakuan',
        'no_surat_kelulusan',
        'tarikh_tamat_kelulusan',
        'no_pendaftaran_syarikat',
        'no_lesen_perniagaan',
        'bilangan_enrolmen_pelajar',
        'kapasiti_maksimum_pelajar',
        'bilangan_pelajar_tempatan',
        'pecahan_tempatan_lelaki',
        'pecahan_tempatan_perempuan',
        'bilangan_pelajar_antarabangsa',
        'pecahan_pelajar_lelaki',
        'pecahan_pelajar_perempuan',
        'bilangan_guru_keseluruhan',
        'pecahan_temparan',
        'pecahan_antarabangsa',
        'tarikh_audit',
        'tarikh_lapor',
        'institusi_id',
        'instrumen_skips_id'
    ];

    public function institusiPendidikan()
    {
        return $this->belongsTo('App\Models\SkipsInstitusiPendidikan', 'institusi_id', 'id');
    }

    public function itemStandardKualiti(){
        return $this->hasOne('App\Models\ItemStandardQualitySkips', 'butiran_institusi_id', 'id');
    }

    public static function markahInstitusi($instrumen_id, $butiranInstitusiId = null){
        $institutions = ButiranInstitusiSkips::with([
            'itemStandardKualiti' => function ($query) {
                $query->whereNotNull('status');
                $query->whereHas('statuses', function ($query) {
                    $query->where('status_name', 'done');
                });
            }
        ])
        ->where('instrumen_skips_id', $instrumen_id)
        ->get()
        ->filter(function ($item) {
            return optional($item->itemStandardKualiti)->count() > 0;
        });

        $institutions = $institutions->values();

        $skipTabs = config('staticdata.skips');
        unset($skipTabs['name']);

        $dataInstitusi = [];

        foreach($institutions as $keyInstitution => $institution){
            $total = $totalTrueScore = 0;
            foreach($skipTabs as $keyTabs => $tabs){
                $score = $scorev = 0;
                $keyTabVerifikasi = $keyTabs.'_verfikasi';
                $column = json_decode($institution->itemStandardKualiti->$keyTabs);
                $columnv = json_decode($institution->itemStandardKualiti->$keyTabVerifikasi);
                $wajaran = $tabs['wajaran'];
                unset($tabs['wajaran']);
                foreach($tabs as $keyDataTab => $dataTab){
                    $keyVerifikasi = $keyDataTab.'_verfikasi';
                    $score = $score + $column->$keyDataTab;
                    $scorev = $scorev + $columnv->$keyVerifikasi;
                }
                $total = $score + $scorev;
                $percentage = ($total/((count($tabs)*5)*2));
                $trueScore = $percentage*$wajaran;
                $dataInstitusi[$keyInstitution][$keyTabs] = [
                //$dataInstitusi[$institution->institusi_id][$keyTabs] = [
                    'score' => $score,
                    'score_v' => $scorev,
                    'total' => $total,
                    'percentage' => number_format($percentage*100, 2),
                    'true_score' => number_format($trueScore, 2),
                ];
                $totalTrueScore = $totalTrueScore + $trueScore;
            }
        }
        return $dataInstitusi;
    }

    public static function peratusanBintang($instrumen_id){
        $institutions = static::markahInstitusi($instrumen_id);

        $bilInstitutions = count($institutions);

        $zeroStar = $oneStar = $twoStar = $threeStar = $fourStar = $fiveStar = 0;

        foreach($institutions as $institution){
            $totalSkor = 0;
            foreach($institution as $tab){
                $totalSkor = $totalSkor + $tab['true_score'];
            }

            if ($totalSkor > 94) {
                $fiveStar = $fiveStar + 1;
            } else if ($totalSkor > 80) {
                $fourStar = $fourStar + 1;
            } else if ($totalSkor > 70) {
                $threeStar = $threeStar + 1;
            } else if ($totalSkor > 60) {
                $twoStar = $twoStar + 1;
            } else if ($totalSkor > 50) {
                $oneStar = $oneStar + 1;
            } else if ($totalSkor > 0 && $totalSkor < 50) {
                $zeroStar = $zeroStar + 1;
            }
            //return number_format($totalSkor, 2);
        }

        return [
            'zero_star' => [
                'total' => $zeroStar,
                'percentage' => number_format(($zeroStar/$bilInstitutions)*100),
            ],
            'one_star' => [
                'total' => $oneStar,
                'percentage' => number_format(($oneStar/$bilInstitutions)*100),
            ],
            'two_star' => [
                'total' => $twoStar,
                'percentage' => number_format(($twoStar/$bilInstitutions)*100),
            ],
            'three_star' => [
                'total' => $threeStar,
                'percentage' => number_format(($threeStar/$bilInstitutions)*100),
            ],
            'four_star' => [
                'total' => $fourStar,
                'percentage' => number_format(($fourStar/$bilInstitutions)*100),
            ],
            'five_star' => [
                'total' => $fiveStar,
                'percentage' => number_format(($fiveStar/$bilInstitutions)*100),
            ],
        ];
    }

    public static function peratusanKriteria($instrumen_id){
        $institutions = static::markahInstitusi($instrumen_id);

        $bilInstitutions = count($institutions);

        $skipTabs = config('staticdata.skips');
        unset($skipTabs['name']);

        $bilTab = 1;
        foreach($skipTabs as $tabKey => $tab){
            $tabPercentage = 0;
            for($i=0;$i<$bilInstitutions;$i++){
                $tabPercentage = $tabPercentage + $institutions[$i][$tabKey]['percentage'];
            }

            $dataTab[$bilTab] = number_format(($tabPercentage/2), 2);
            $bilTab++;
        }

        return $dataTab;
    }
}
