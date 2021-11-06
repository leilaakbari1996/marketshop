<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdeital extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function store_to_db(Request $request){
          self::query()->create([
              'user_id' => auth()->id(),
              'product_id' => $request
          ]);
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public static function Bestsellers(){
        $orders = self::all();//products forokhte shode.
        if($orders->count() != 0){

            foreach($orders as $order){
                $deitals[$order->product_id] = 0;
            }
            foreach($orders as $order){
                $deitals[$order->product_id] += $order->quantity;
            }
            $collection = collect($deitals);
            $sorted = $collection->sortDesc();
            $sortes = $sorted->toArray();
            $ids =array_keys($sortes);
            if(count($ids) < 6){
                return $ids;
            }else{
                for($i = 0; $i < 5 ; $i++){
                    $productIds[] = $ids[$i];
                }
                return $productIds;
            }
        }
        return [];

    }
}
