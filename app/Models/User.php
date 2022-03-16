<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    public static function boot()
    {
        parent::boot();

        self::created(function($model){
            $user_id = User::latest()->first()->id;

            $data = new JenisKriteria();
            $data->nama = 'Core Factor (CF)';
            $data->nilai = 0.6;
            $data->user_id = $user_id;
            $data->save();

            $data = new JenisKriteria();
            $data->nama = 'Secondary Factor (SF)';
            $data->nilai = 0.4;
            $data->user_id = $user_id;
            $data->save();

            $data = new Selisih();
            $data->bobot = 5;
            $data->nilai = 0;
            $data->keterangan = 'Tidak ada selisih (kompetensi sesuai dengan yang dibutuhkan)';
            $data->user_id = $user_id;
            $data->save();

            $data = new Selisih();
            $data->bobot = 4.5;
            $data->nilai = 1;
            $data->keterangan = 'Kompetensi individu kelebihan 1 tingkat';
            $data->user_id = $user_id;
            $data->save();

            $data = new Selisih();
            $data->bobot = 4;
            $data->nilai = -1;
            $data->keterangan = 'Kompetensi individu kekurangan 1 tingkat';
            $data->user_id = $user_id;
            $data->save();

            $data = new Selisih();
            $data->bobot = 3.5;
            $data->nilai = 2;
            $data->keterangan = 'Kompetensi individu kelebihan 2 tingkat';
            $data->user_id = $user_id;
            $data->save();
            
            $data = new Selisih();
            $data->bobot = 3;
            $data->nilai = -2;
            $data->keterangan = 'Kompetensi individu kekurangan 2 tingkat';
            $data->user_id = $user_id;
            $data->save();

            $data = new Selisih();
            $data->bobot = 2.5;
            $data->nilai = 3;
            $data->keterangan = 'Kompetensi individu kelebihan 3 tingkat';
            $data->user_id = $user_id;
            $data->save();

            $data = new Selisih();
            $data->bobot = 2;
            $data->nilai = -3;
            $data->keterangan = 'Kompetensi individu kekurangan 3 tingkat';
            $data->user_id = $user_id;
            $data->save();

            $data = new Selisih();
            $data->bobot = 1.5;
            $data->nilai = 4;
            $data->keterangan = 'Kompetensi individu kelebihan 4 tingkat';
            $data->user_id = $user_id;
            $data->save();

            $data = new Selisih();
            $data->bobot = 1;
            $data->nilai = -4;
            $data->keterangan = 'Kompetensi individu kekurangan 4 tingkat';
            $data->user_id = $user_id;
            $data->save();

            $core_factor = DB::table('jenis_kriterias')->where('nama', 'Core Factor (CF)')->where('user_id', $user_id)->first();
            $seconday_factor = DB::table('jenis_kriterias')->where('nama', 'Secondary Factor (SF)')->where('user_id', $user_id)->first();

            $data = new Kriteria();
            $data->nama = 'Merk Mobil';
            $data->jenis_kriteria_id = $core_factor->id;
            $data->user_id = $user_id;
            $data->save();

            $data = new Kriteria();
            $data->nama = 'Kategori Mobil';
            $data->jenis_kriteria_id = $core_factor->id;
            $data->user_id = $user_id;
            $data->save();

            $data = new Kriteria();
            $data->nama = 'Harga';
            $data->jenis_kriteria_id = $core_factor->id;
            $data->user_id = $user_id;
            $data->save();

            $data = new Kriteria();
            $data->nama = 'Jenis Transmisi';
            $data->jenis_kriteria_id = $seconday_factor->id;
            $data->user_id = $user_id;
            $data->save();

            $data = new Kriteria();
            $data->nama = 'Jenis BBM';
            $data->jenis_kriteria_id = $seconday_factor->id;
            $data->user_id = $user_id;
            $data->save();

            $merk_mobil = DB::table('kriteria')->where('nama', 'Merk Mobil')->where('user_id', $user_id)->first();
            $kategori_mobil = DB::table('kriteria')->where('nama', 'Kategori Mobil')->where('user_id', $user_id)->first();
            $harga = DB::table('kriteria')->where('nama', 'Harga')->where('user_id', $user_id)->first();
            $jenis_transmisi = DB::table('kriteria')->where('nama', 'Jenis Transmisi')->where('user_id', $user_id)->first();
            $jenis_bbm = DB::table('kriteria')->where('nama', 'Jenis BBM')->where('user_id', $user_id)->first();

            $data = new SubKriteria();
            $data->nama = 'Toyota';
            $data->kriteria_id = $merk_mobil->id;
            $data->nilai = 6;
            $data->user_id = $user_id;
            $data->save();

            $data = new SubKriteria();
            $data->nama = 'Daihatsu';
            $data->kriteria_id = $merk_mobil->id;
            $data->nilai = 5;
            $data->user_id = $user_id;
            $data->save();

            $data = new SubKriteria();
            $data->nama = 'Honda';
            $data->kriteria_id = $merk_mobil->id;
            $data->nilai = 4;
            $data->user_id = $user_id;
            $data->save();

            $data = new SubKriteria();
            $data->nama = 'Mitsubishi';
            $data->kriteria_id = $merk_mobil->id;
            $data->nilai = 3;
            $data->user_id = $user_id;
            $data->save();

            $data = new SubKriteria();
            $data->nama = 'Suzuki';
            $data->kriteria_id = $merk_mobil->id;
            $data->nilai = 2;
            $data->user_id = $user_id;
            $data->save();

            $data = new SubKriteria();
            $data->nama = 'Lainnya';
            $data->kriteria_id = $merk_mobil->id;
            $data->nilai = 1;
            $data->user_id = $user_id;
            $data->save();

            // Seeder Untuk Kategori Mobil
            $data = new SubKriteria();
            $data->nama = 'Wagon/Hatchback';
            $data->kriteria_id = $kategori_mobil->id;
            $data->nilai = 5;
            $data->user_id = $user_id;
            $data->save();

            $data = new SubKriteria();
            $data->nama = 'MPV';
            $data->kriteria_id = $kategori_mobil->id;
            $data->nilai = 4;
            $data->user_id = $user_id;
            $data->save();

            $data = new SubKriteria();
            $data->nama = 'Pickup';
            $data->kriteria_id = $kategori_mobil->id;
            $data->nilai = 3;
            $data->user_id = $user_id;
            $data->save();

            $data = new SubKriteria();
            $data->nama = 'SUV';
            $data->kriteria_id = $kategori_mobil->id;
            $data->nilai = 2;
            $data->user_id = $user_id;
            $data->save();

            $data = new SubKriteria();
            $data->nama = 'Sedan';
            $data->kriteria_id = $kategori_mobil->id;
            $data->nilai = 1;
            $data->user_id = $user_id;
            $data->save();

            // Seeder untuk harga mobil
            $data = new SubKriteria();
            $data->nama = 'Diatas 300 Juta';
            $data->kriteria_id = $harga->id;
            $data->nilai = 5;
            $data->user_id = $user_id;
            $data->save();

            $data = new SubKriteria();
            $data->nama = 'Diatas 180 Juta';
            $data->kriteria_id = $harga->id;
            $data->nilai = 4;
            $data->user_id = $user_id;
            $data->save();

            $data = new SubKriteria();
            $data->nama = 'Diatas 150 Juta';
            $data->kriteria_id = $harga->id;
            $data->nilai = 3;
            $data->user_id = $user_id;
            $data->save();

            $data = new SubKriteria();
            $data->nama = 'Diatas 140 Juta';
            $data->kriteria_id = $harga->id;
            $data->nilai = 2;
            $data->user_id = $user_id;
            $data->save();

            $data = new SubKriteria();
            $data->nama = 'Dibawah 100 Juta';
            $data->kriteria_id = $harga->id;
            $data->nilai = 1;
            $data->user_id = $user_id;
            $data->save();

            // Seeder untuk jenis transmisi
            $data = new SubKriteria();
            $data->nama = 'Otomatis';
            $data->kriteria_id = $jenis_transmisi->id;
            $data->nilai = 2;
            $data->user_id = $user_id;
            $data->save();

            $data = new SubKriteria();
            $data->nama = 'Manual';
            $data->kriteria_id = $jenis_transmisi->id;
            $data->nilai = 1;
            $data->user_id = $user_id;
            $data->save();

            // Seeder untuk jenis bbm
            $data = new SubKriteria();
            $data->nama = 'Bensin';
            $data->kriteria_id = $jenis_bbm->id;
            $data->nilai = 2;
            $data->user_id = $user_id;
            $data->save();

            $data = new SubKriteria();
            $data->nama = 'Solar';
            $data->kriteria_id = $jenis_bbm->id;
            $data->nilai = 1;
            $data->user_id = $user_id;
            $data->save();

            // DATA ALTERNATIF MOBIL
            $data_1 = new Alternatif();
            $data_1->nama = 'Hilux D Cab 2.4 V (4x4) DSL A/T';
            $data_1->image = 'img/Hilux_D_Cab.png';
            $data_1->desc = 'Hilux D Cab 2.4 V (4x4) DSL A/T adalah merk atau seri mobil dari merk toyota dengan kategori pickup dan jenis transmisi otomatis menggunakan bahan bakar solar';
            $data_1->user_id = $user_id;
            $data_1->save();

            $kriterias = Kriteria::all();
            foreach($kriterias as $k) {
                if($k->nama == 'Merk Mobil') {
                    $sub_kriteria_id = SubKriteria::where('nama', 'Toyota')->where('user_id', $user_id)->first()->id;
                } elseif($k->nama == 'Kategori Mobil') {
                    $sub_kriteria_id = SubKriteria::where('nama', 'Pickup')->where('user_id', $user_id)->first()->id;
                } elseif($k->nama == 'Harga') {
                    $sub_kriteria_id = SubKriteria::where('nama', 'Diatas 300 Juta')->where('user_id', $user_id)->first()->id;
                } elseif($k->nama == 'Jenis Transmisi') {
                    $sub_kriteria_id = SubKriteria::where('nama', 'Otomatis')->where('user_id', $user_id)->first()->id;
                } elseif($k->nama == 'Jenis BBM') {
                    $sub_kriteria_id = SubKriteria::where('nama', 'Solar')->where('user_id', $user_id)->first()->id;
                }

                $child_data = new OptAlternatif();
                $child_data->alternatif_id = $data_1->id;
                $child_data->kriteria_id = $k->id;
                $child_data->sub_kriteria_id = $sub_kriteria_id;
                $child_data->user_id = $user_id;
                $child_data->save();

                $data_2 = new Alternatif();
                $data_2->nama = 'TritonULTIMATE AT Double Cab 4WD';
                $data_2->image = 'img/triton.jpg';
                $data_2->desc = 'TritonULTIMATE AT Double Cab 4WD adalah merk atau seri mobil dari merk daihatsu dengan kategori pickup dan jenis transmisi otomatis menggunakan bahan bakar bensin';
                $data_2->user_id = $user_id;
                $data_2->save();

                $kriterias = Kriteria::all();
                foreach($kriterias as $k) {
                    if($k->nama == 'Merk Mobil') {
                        $sub_kriteria_id = SubKriteria::where('nama', 'Daihatsu')->where('user_id', $user_id)->first()->id;
                    } elseif($k->nama == 'Kategori Mobil') {
                        $sub_kriteria_id = SubKriteria::where('nama', 'Pickup')->where('user_id', $user_id)->first()->id;
                    } elseif($k->nama == 'Harga') {
                        $sub_kriteria_id = SubKriteria::where('nama', 'Diatas 300 Juta')->where('user_id', $user_id)->first()->id;
                    } elseif($k->nama == 'Jenis Transmisi') {
                        $sub_kriteria_id = SubKriteria::where('nama', 'Otomatis')->where('user_id', $user_id)->first()->id;
                    } elseif($k->nama == 'Jenis BBM') {
                        $sub_kriteria_id = SubKriteria::where('nama', 'Bensin')->where('user_id', $user_id)->first()->id;
                    }

                    $child_data = new OptAlternatif();
                    $child_data->alternatif_id = $data_2->id;
                    $child_data->kriteria_id = $k->id;
                    $child_data->sub_kriteria_id = $sub_kriteria_id;
                    $child_data->user_id = $user_id;
                    $child_data->save();
                }

                $data_3 = new Alternatif();
                $data_3->nama = 'Gran Max PU1.3 3W FH';
                $data_3->image = 'img/grand-max.jpg';
                $data_3->desc = 'Gran Max PU1.3 3W FH adalah merk atau seri mobil dari merk Honda dengan kategori pickup dan jenis transmisi manual menggunakan bahan bakar bensin';
                $data_3->user_id = $user_id;
                $data_3->save();

                $kriterias = Kriteria::all();
                foreach($kriterias as $k) {
                    if($k->nama == 'Merk Mobil') {
                        $sub_kriteria_id = SubKriteria::where('nama', 'Honda')->where('user_id', $user_id)->first()->id;
                    } elseif($k->nama == 'Kategori Mobil') {
                        $sub_kriteria_id = SubKriteria::where('nama', 'Pickup')->where('user_id', $user_id)->first()->id;
                    } elseif($k->nama == 'Harga') {
                        $sub_kriteria_id = SubKriteria::where('nama', 'Diatas 140 Juta')->where('user_id', $user_id)->first()->id;
                    } elseif($k->nama == 'Jenis Transmisi') {
                        $sub_kriteria_id = SubKriteria::where('nama', 'Manual')->where('user_id', $user_id)->first()->id;
                    } elseif($k->nama == 'Jenis BBM') {
                        $sub_kriteria_id = SubKriteria::where('nama', 'Bensin')->where('user_id', $user_id)->first()->id;
                    }

                    $child_data = new OptAlternatif();
                    $child_data->alternatif_id = $data_3->id;
                    $child_data->kriteria_id = $k->id;
                    $child_data->sub_kriteria_id = $sub_kriteria_id;
                    $child_data->user_id = $user_id;
                    $child_data->save();
                }

                $data_4 = new Alternatif();
                $data_4->nama = 'Carry Wide-Deck AC/PS';
                $data_4->image = 'img/carry.jpg';
                $data_4->desc = 'Carry Wide-Deck AC/PS adalah merk atau seri mobil dari merk Mitsubishi dengan kategori pickup dan jenis transmisi manual menggunakan bahan bakar bensin';
                $data_4->user_id = $user_id;
                $data_4->save();

                $kriterias = Kriteria::all();
                foreach($kriterias as $k) {
                    if($k->nama == 'Merk Mobil') {
                        $sub_kriteria_id = SubKriteria::where('nama', 'Mitsubishi')->where('user_id', $user_id)->first()->id;
                    } elseif($k->nama == 'Kategori Mobil') {
                        $sub_kriteria_id = SubKriteria::where('nama', 'Pickup')->where('user_id', $user_id)->first()->id;
                    } elseif($k->nama == 'Harga') {
                        $sub_kriteria_id = SubKriteria::where('nama', 'Diatas 150 Juta')->where('user_id', $user_id)->first()->id;
                    } elseif($k->nama == 'Jenis Transmisi') {
                        $sub_kriteria_id = SubKriteria::where('nama', 'Manual')->where('user_id', $user_id)->first()->id;
                    } elseif($k->nama == 'Jenis BBM') {
                        $sub_kriteria_id = SubKriteria::where('nama', 'Bensin')->where('user_id', $user_id)->first()->id;
                    }

                    $child_data = new OptAlternatif();
                    $child_data->alternatif_id = $data_4->id;
                    $child_data->kriteria_id = $k->id;
                    $child_data->sub_kriteria_id = $sub_kriteria_id;
                    $child_data->user_id = $user_id;
                    $child_data->save();
                }
            }
        });
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function jenis_kriterias()
    {
        return $this->hasMany('App\Models\JenisKriteria', 'user_id');
    }

    public function selisihs()
    {
        return $this->hasMany('App\Models\Selisih', 'user_id');
    }

    public function kriterias()
    {
        return $this->hasMany('App\Models\Kriteria', 'user_id');
    }

    public function sub_kriterias()
    {
        return $this->hasMany('App\Models\SubKriteria', 'user_id');
    }

    public function alternatifs()
    {
        return $this->hasMany('App\Models\Alternatif', 'user_id');
    }

    public function opt_alternatifs()
    {
        return $this->hasMany('App\Models\OptAlternatif', 'user_id');
    }
}
