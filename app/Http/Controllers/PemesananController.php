<?php
 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pemesanan;
use App\Penggajian;
use App\Majikan;
use App\Pekerja;
use App\DetailPekerja;
use App\DetailMajikan;
use Veritrans_Config;
use Veritrans_Snap;
use Veritrans_Notification;
// use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
 
class PemesananController extends Controller
{
    /**
     * Make request global.
     *
     * @var \Illuminate\Http\Request
     */
 
    /**
     * Class constructor.
     *
     * @param \Illuminate\Http\Request $request User Request
     *
     * @return void
     */
    public function __construct(Request $request)
    {
 
        // Set midtrans configuration
        Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
        Veritrans_Config::$isProduction = config('services.midtrans.isProduction');
        Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
        Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
    }
 
    /**
     * Show index page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // $data['donations'] = Donation::orderBy('id', 'desc')->paginate(8);
 
        // return view('welcome', $data);
        // return 'Hallo';
    }
 
    /**
     * Submit donation.
     *
     * @return array
     */
    // public function submitPesanan(Request $request){
    //   return $request;
    // }

    public function submitPesanan(Request $request)
    {            
              $pekerja = Pekerja::find($request->id_pekerja);
              $majikan = Majikan::find($request->id_majikan);              
              if($majikan && $pekerja){
              $now = date('Y-m-d');

              try{
                $pesanan = Pemesanan::create([
                  'majikan_id' => $request->id_majikan,
                  'pekerja_id' => $request->id_pekerja,
                  'jumlah_bayar' => $request->jumlahBayar,
                  'waktu_pesan' => $now,
                  'pertama' => $request->kategori,
                ]);
              } catch(QueryException $e){
                return "Terjadi Kesalahan";
              }
              $payload = [
                'transaction_details' => [
                    'order_id'      => $pesanan->id,
                    'gross_amount'  => $pesanan->jumlah_bayar,
                ],
                'customer_details' => [
                    'first_name'    => $majikan->name,
                    'email'         => $majikan->email,
                    'phone'         => $majikan->detailMajikan->tel,
                    'address'       => $majikan->detailMajikan->alamat,
                ],
                'item_details' => [
                    [
                        'id'       => $pesanan->id,
                        'price'    => $pesanan->jumlah_bayar,
                        'quantity' => 1,
                        'name'     => 'Jasa PRT 1 Bulan',
                    ]
                ]
            ];
            $snapToken = Veritrans_Snap::getSnapToken($payload);
            $pesanan->snap_token = $snapToken;
            $pesanan->save();
            return $pesanan;
            }
            else
            {
              return "Terjadi Kesalahan";
            }           
    }
 
    /**
     * Midtrans notification handler.
     *
     * @param Request $request
     * 
     * @return void
     */
    public function notificationHandler(Request $request)
    {
        $notif = new Veritrans_Notification();
        \DB::transaction(function() use($notif) {
 
          $transaction = $notif->transaction_status;
          $time = $notif->transaction_time;
          $type = $notif->payment_type;
          $orderId = $notif->order_id;
          $fraud = $notif->fraud_status;
          $pesanan = Pemesanan::findOrFail($orderId);
 
          if ($transaction == 'capture') {
 
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
 
              if($fraud == 'challenge') {
                // TODO set payment status in merchant's database to 'Challenge by FDS'
                // TODO merchant should decide whether this transaction is authorized or not in MAP
                // $donation->addUpdate("Transaction order_id: " . $orderId ." is challenged by FDS");
                $pesanan->setPending();
              } else {
                // TODO set payment status in merchant's database to 'Success'
                // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully captured using " . $type);
                $pesanan->setSuccess($time);
              }
 
            }
 
          } elseif ($transaction == 'settlement') {
 
            // TODO set payment status in merchant's database to 'Settlement'
            // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully transfered using " . $type);
            $pesanan->setSuccess($time);
            $bayaran = ($pesanan->jumlah_bayar * 10) / 100;
            $penggajian = Penggajian::create([
                'pekerja_id' => $pesanan->pekerja_id,
                'waktu_pemesanan' => $pesanan->waktu_pesan,
                'jumlah_bayar' => $pesanan->jumlah_bayar - $bayaran,                
            ]);
            $pekerja = Pekerja::findOrFail($pesanan->pekerja_id);
            $pekerja->setBekerja();
 
          } elseif($transaction == 'pending'){
 
            // TODO set payment status in merchant's database to 'Pending'
            // $donation->addUpdate("Waiting customer to finish transaction order_id: " . $orderId . " using " . $type);
            $pesanan->setPending();
 
          } elseif ($transaction == 'deny') {
 
            // TODO set payment status in merchant's database to 'Failed'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is Failed.");
            $pesanan->setFailed();
 
          } elseif ($transaction == 'expire') {
 
            // TODO set payment status in merchant's database to 'expire'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is expired.");
            $pesanan->setExpired();
 
          } elseif ($transaction == 'cancel') {
 
            // TODO set payment status in merchant's database to 'Failed'
            // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is canceled.");
            $pesanan->setFailed();
 
          }
 
        });
 
        return;
    }
}