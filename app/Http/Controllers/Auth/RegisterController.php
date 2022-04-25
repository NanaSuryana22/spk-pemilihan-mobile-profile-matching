<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\JenisKriteria;
use App\Models\Selisih;
use App\Models\Kriteria;
use App\Models\SubKriteria;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $this->call(RegisterJenisKriteriaSeeder::class);

        // $dataKriteriaType1 = JenisKriteria::create([
        //     'nama' => 'Core Factor (CF)',
        //     'nilai' => 0.6,
        //     'user_id' => $user->id
        // ]);

        // $dataKriteriaType2 = JenisKriteria::create([
        //     'nama' => 'Secondary Factor (SF)',
        //     'nilai' => 0.4,
        //     'user_id' => $user->id
        // ]);
        
        $dataJenisKriteria1 = new JenisKriteria();
        $dataJenisKriteria1->nama = 'Core Factor (CF)';
        $dataJenisKriteria1->nilai = 0.6;
        $dataJenisKriteria1->user_id = $user->id;
        $dataJenisKriteria1->save();

        $dataJenisKriteria2 = new JenisKriteria();
        $dataJenisKriteria2->nama = 'Secondary Factor (SF)';
        $dataJenisKriteria2->nilai = 0.4;
        $dataJenisKriteria2->user_id = $user->id;
        $dataJenisKriteria2->save();

        $dataSelisih1 = new Selisih();
        $dataSelisih1->bobot = 5;
        $dataSelisih1->nilai = 0;
        $dataSelisih1->keterangan = 'Tidak ada selisih (kompetensi sesuai dengan yang dibutuhkan)';
        $dataSelisih1->user_id = $user->id;
        $dataSelisih1->save();

        $dataSelisih2 = new Selisih();
        $dataSelisih2->bobot = 4.5;
        $dataSelisih2->nilai = 1;
        $dataSelisih2->keterangan = 'Kompetensi individu kelebihan 1 tingkat';
        $dataSelisih2->user_id = $user->id;
        $dataSelisih2->save();

        $dataSelisih3 = new Selisih();
        $dataSelisih3->bobot = 4;
        $dataSelisih3->nilai = -1;
        $dataSelisih3->keterangan = 'Kompetensi individu kekurangan 1 tingkat';
        $dataSelisih3->user_id = $user->id;
        $dataSelisih3->save();

        $dataSelisih4 = new Selisih();
        $dataSelisih4->bobot = 3.5;
        $dataSelisih4->nilai = 2;
        $dataSelisih4->keterangan = 'Kompetensi individu kelebihan 2 tingkat';
        $dataSelisih4->user_id = $user->id;
        $dataSelisih4->save();
                
        $dataSelisih5 = new Selisih();
        $dataSelisih5->bobot = 3;
        $dataSelisih5->nilai = -2;
        $dataSelisih5->keterangan = 'Kompetensi individu kekurangan 2 tingkat';
        $dataSelisih5->user_id = $user->id;
        $dataSelisih5->save();

        $dataSelisih6 = new Selisih();
        $dataSelisih6->bobot = 2.5;
        $dataSelisih6->nilai = 3;
        $dataSelisih6->keterangan = 'Kompetensi individu kelebihan 3 tingkat';
        $dataSelisih6->user_id = $user->id;
        $dataSelisih6->save();

        $dataSelisih7 = new Selisih();
        $dataSelisih7->bobot = 2;
        $dataSelisih7->nilai = -3;
        $dataSelisih7->keterangan = 'Kompetensi individu kekurangan 3 tingkat';
        $dataSelisih7->user_id = $user->id;
        $dataSelisih7->save();

        $dataSelisih8 = new Selisih();
        $dataSelisih8->bobot = 1.5;
        $dataSelisih8->nilai = 4;
        $dataSelisih8->keterangan = 'Kompetensi individu kelebihan 4 tingkat';
        $dataSelisih8->user_id = $user->id;
        $dataSelisih8->save();

        $dataSelisih9 = new Selisih();
        $dataSelisih9->bobot = 1;
        $dataSelisih9->nilai = -4;
        $dataSelisih9->keterangan = 'Kompetensi individu kekurangan 4 tingkat';
        $dataSelisih9->user_id = $user->id;
        $dataSelisih9->save();

        $core_factor = DB::table('jenis_kriterias')->where('nama', 'Core Factor (CF)')->first();
        $seconday_factor = DB::table('jenis_kriterias')->where('nama', 'Secondary Factor (SF)')->first();

        $dataKriteria1 = new Kriteria();
        $dataKriteria1->nama = 'Merk Mobil';
        $dataKriteria1->jenis_kriteria_id = $core_factor->id;
        $dataKriteria1->user_id = $user->id;
        $dataKriteria1->save();

        $dataKriteria2 = new Kriteria();
        $dataKriteria2->nama = 'Kategori Mobil';
        $dataKriteria2->jenis_kriteria_id = $core_factor->id;
        $dataKriteria2->user_id = $user->id;
        $dataKriteria2->save();

        $dataKriteria3 = new Kriteria();
        $dataKriteria3->nama = 'Harga';
        $dataKriteria3->jenis_kriteria_id = $core_factor->id;
        $dataKriteria3->user_id = $user->id;
        $dataKriteria3->save();

        $dataKriteria4 = new Kriteria();
        $dataKriteria4->nama = 'Jenis Transmisi';
        $dataKriteria4->jenis_kriteria_id = $seconday_factor->id;
        $dataKriteria4->user_id = $user->id;
        $dataKriteria4->save();

        $dataKriteria5 = new Kriteria();
        $dataKriteria5->nama = 'Jenis BBM';
        $dataKriteria5->jenis_kriteria_id = $seconday_factor->id;
        $dataKriteria5->user_id = $user->id;
        $dataKriteria5->save();

        $merk_mobil = DB::table('kriterias')->where('nama', 'Merk Mobil')->first();
        $kategori_mobil = DB::table('kriterias')->where('nama', 'Kategori Mobil')->first();
        $harga = DB::table('kriterias')->where('nama', 'Harga')->first();
        $jenis_transmisi = DB::table('kriterias')->where('nama', 'Jenis Transmisi')->first();
        $jenis_bbm = DB::table('kriterias')->where('nama', 'Jenis BBM')->first();

        $dataSubKriteria1 = new SubKriteria();
        $dataSubKriteria1->nama = 'Toyota';
        $dataSubKriteria1->kriteria_id = $merk_mobil->id;
        $dataSubKriteria1->nilai = 6;
        $dataSubKriteria1->user_id = $user->id;
        $dataSubKriteria1->save();

        $dataSubKriteria2 = new SubKriteria();
        $dataSubKriteria2->nama = 'Daihatsu';
        $dataSubKriteria2->kriteria_id = $merk_mobil->id;
        $dataSubKriteria2->nilai = 5;
        $dataSubKriteria2->user_id = $user->id;
        $dataSubKriteria2->save();

        $dataSubKriteria3 = new SubKriteria();
        $dataSubKriteria3->nama = 'Honda';
        $dataSubKriteria3->kriteria_id = $merk_mobil->id;
        $dataSubKriteria3->nilai = 4;
        $dataSubKriteria3->user_id = $user->id;
        $dataSubKriteria3->save();

        $dataSubKriteria4 = new SubKriteria();
        $dataSubKriteria4->nama = 'Mitsubishi';
        $dataSubKriteria4->kriteria_id = $merk_mobil->id;
        $dataSubKriteria4->nilai = 3;
        $dataSubKriteria4->user_id = $user->id;
        $dataSubKriteria4->save();

        $dataSubKriteria5 = new SubKriteria();
        $dataSubKriteria5->nama = 'Suzuki';
        $dataSubKriteria5->kriteria_id = $merk_mobil->id;
        $dataSubKriteria5->nilai = 2;
        $dataSubKriteria5->user_id = $user->id;
        $dataSubKriteria5->save();

        $dataSubKriteria6 = new SubKriteria();
        $dataSubKriteria6->nama = 'Lainnya';
        $dataSubKriteria6->kriteria_id = $merk_mobil->id;
        $dataSubKriteria6->nilai = 1;
        $dataSubKriteria6->user_id = $user->id;
        $dataSubKriteria6->save();

        // Seeder Untuk Kategori Mobil
        $dataSubKriteria7 = new SubKriteria();
        $dataSubKriteria7->nama = 'Wagon/Hatchback';
        $dataSubKriteria7->kriteria_id = $kategori_mobil->id;
        $dataSubKriteria7->nilai = 5;
        $dataSubKriteria7->user_id = $user->id;
        $dataSubKriteria7->save();

        $dataSubKriteria8 = new SubKriteria();
        $dataSubKriteria8->nama = 'MPV';
        $dataSubKriteria8->kriteria_id = $kategori_mobil->id;
        $dataSubKriteria8->nilai = 4;
        $dataSubKriteria8->user_id = $user->id;
        $dataSubKriteria8->save();

        $dataSubKriteria9 = new SubKriteria();
        $dataSubKriteria9->nama = 'Pickup';
        $dataSubKriteria9->kriteria_id = $kategori_mobil->id;
        $dataSubKriteria9->nilai = 3;
        $dataSubKriteria9->user_id = $user->id;
        $dataSubKriteria9->save();

        $dataSubKriteria10 = new SubKriteria();
        $dataSubKriteria10->nama = 'SUV';
        $dataSubKriteria10->kriteria_id = $kategori_mobil->id;
        $dataSubKriteria10->nilai = 2;
        $dataSubKriteria10->user_id = $user->id;
        $dataSubKriteria10->save();

        $dataSubKriteria11 = new SubKriteria();
        $dataSubKriteria11->nama = 'Sedan';
        $dataSubKriteria11->kriteria_id = $kategori_mobil->id;
        $dataSubKriteria11->nilai = 1;
        $dataSubKriteria11->user_id = $user->id;
        $dataSubKriteria11->save();

        // Seeder untuk harga mobil
        $dataSubKriteria12 = new SubKriteria();
        $dataSubKriteria12->nama = 'Diatas 300 Juta';
        $dataSubKriteria12->kriteria_id = $harga->id;
        $dataSubKriteria12->nilai = 5;
        $dataSubKriteria12->user_id = $user->id;
        $dataSubKriteria12->save();

        $dataSubKriteria13 = new SubKriteria();
        $dataSubKriteria13->nama = 'Diatas 180 Juta';
        $dataSubKriteria13->kriteria_id = $harga->id;
        $dataSubKriteria13->nilai = 4;
        $dataSubKriteria13->user_id = $user->id;
        $dataSubKriteria13->save();

        $dataSubKriteria14 = new SubKriteria();
        $dataSubKriteria14->nama = 'Diatas 150 Juta';
        $dataSubKriteria14->kriteria_id = $harga->id;
        $dataSubKriteria14->nilai = 3;
        $dataSubKriteria14->user_id = $user->id;
        $dataSubKriteria14->save();

        $dataSubKriteria15 = new SubKriteria();
        $dataSubKriteria15->nama = 'Diatas 140 Juta';
        $dataSubKriteria15->kriteria_id = $harga->id;
        $dataSubKriteria15->nilai = 2;
        $dataSubKriteria15->user_id = $user->id;
        $dataSubKriteria15->save();

        $dataSubKriteria16 = new SubKriteria();
        $dataSubKriteria16->nama = 'Dibawah 100 Juta';
        $dataSubKriteria16->kriteria_id = $harga->id;
        $dataSubKriteria16->nilai = 1;
        $dataSubKriteria16->user_id = $user->id;
        $dataSubKriteria16->save();

        // Seeder untuk jenis transmisi
        $dataSubKriteria17 = new SubKriteria();
        $dataSubKriteria17->nama = 'Otomatis';
        $dataSubKriteria17->kriteria_id = $jenis_transmisi->id;
        $dataSubKriteria17->nilai = 2;
        $dataSubKriteria17->user_id = $user->id;
        $dataSubKriteria17->save();

        $dataSubKriteria18 = new SubKriteria();
        $dataSubKriteria18->nama = 'Manual';
        $dataSubKriteria18->kriteria_id = $jenis_transmisi->id;
        $dataSubKriteria18->nilai = 1;
        $dataSubKriteria18->user_id = $user->id;
        $dataSubKriteria18->save();

        // Seeder untuk jenis bbm
        $dataSubKriteria19 = new SubKriteria();
        $dataSubKriteria19->nama = 'Bensin';
        $dataSubKriteria19->kriteria_id = $jenis_bbm->id;
        $dataSubKriteria19->nilai = 2;
        $dataSubKriteria19->user_id = $user->id;
        $dataSubKriteria19->save();

        $dataSubKriteria20 = new SubKriteria();
        $dataSubKriteria20->nama = 'Solar';
        $dataSubKriteria20->kriteria_id = $jenis_bbm->id;
        $dataSubKriteria20->nilai = 1;
        $dataSubKriteria20->user_id = $user->id;
        $dataSubKriteria20->save();

        return $user;
        
    }
}
