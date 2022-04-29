<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Tire;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function new()
    {
        Cart::destroy();
        $companies = Company::all();

        $tires = Tire::all();
        $products = Product::all();
        $all = $tires->merge($products);

        return view('dashboard.invoices.new')
            ->with([
                'companies' => $companies,
                'products' => $all,
            ]);
    }

    public function store(Request $request)
    {
        $invoice = new Invoice;
        $invoice->company_id = $request->company_id;
        $invoice->date = date('Y-m-d', strtotime($request->date));
        $invoice->invoice_number = $this->generate_invoice_number($invoice);
        $total_without_ddv = floatval(str_replace('.', '', Cart::subtotal()));
        $total_with_ddv = floatval(str_replace('.', '', Cart::total()));

        $invoice->total_price = $total_with_ddv;
        $invoice->vat = intval($total_with_ddv - $total_without_ddv);
        $invoice->without_vat = $total_without_ddv;

        if ($request->has('extra'))
            $invoice->extra = $request->extra;

        $invoice->save();

        $invoice_items = Cart::content();

        foreach ($invoice_items as $item) {
            Tire::findOrFail($item->id)->decrement('stock', $item->qty);
            $invoice->invoicables()->make([
                $item->id =>
                    [
                    'qty' => $item->qty,
                    'single_price' => $item->price
                ]

            ])->associate($item);
        }

        Cart::destroy();
    }


    public function remove_article(Request $request)
    {
        Cart::remove($request->product);
        $company = Company::findOrFail($request->company_id);
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        $all_items = Cart::content();
        $tax = Cart::tax();
        return view('dashboard.invoices.partials.invoice_preview')
            ->with([
                'all_items' => $all_items,
                'company' => $company,
                'total' => $total,
                'subtotal' => $subtotal,
                'tax' => $tax
            ])->render();
    }

    public function select_company(Request $request)
    {
        $company = Company::findOrFail($request->company_id);

        return response()->json($company);
    }


    public function invoiced_product(Request $request)
    {
        $ddv = $request->ddv;
        $price = $request->price;

        $company = Company::findOrFail($request->company_id);

        $tires = Tire::all();
        $products = Product::all();
        $all = $tires->merge($products);
        $product = $all->where('code', $request->product_id)->first();
        $product_tax = $product->main_category->tax;

        $set_price = $this->handle_ddv($product_tax, $ddv, $price);

        Cart::add(
            $product->id,
            $this->set_name($product),
            $request->qty,
            $set_price,
            ['company' => $company->name, 'code' => $product->code],
            $product->main_category->tax
        );
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        $tax = Cart::tax();
        $all_items = Cart::content();
        return view('dashboard.invoices.partials.invoice_preview')
            ->with([
                'all_items' => $all_items,
                'company' => $company,
                'total' => $total,
                'subtotal' => $subtotal,
                'tax' => $tax
            ])->render();
    }



    private function generate_invoice_number($invoice)
    {
        $class_name = get_class($invoice);
        $instance = new \ReflectionClass($class_name);
        $all = $instance->newInstance()->all();
        $count = $all->count();
        return $count + 1 ?? intval(strval(Carbon::now()->format('y')) . strval(sprintf("%'03d", $doc_id)));

    }

    private function handle_ddv($product_tax, $ddv, $price)
    {
        $math = ($product_tax / 100) + 1;
        if ($ddv == 1) {
            return floatval($price) / floatval($math);
        } else {
            return $price;
        }
    }

    private function set_name($product)
    {
        if(get_class($product) == Tire::class)
        {
            $name = $product->name();
        } else {
            $name = $product->name;
        }

        return $name;
    }

}
