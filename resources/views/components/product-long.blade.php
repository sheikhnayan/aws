                    <div class="product-cart">
                        <div class="product-cart__image">
                            <a href="{{ url('product') }}/{{ $productname }}/{{ $product->product_id }}"><img src="{{ asset('public/productImage') }}/{{ $product->image }}" alt=""></a>
                            <div class="product-cart__discount">
                                @if($product->discount_per != 0)
                                {{$product->discount_per }}% OFF
                                @endif
                            </div>
                            <button class="product-cart__wishlist"  onclick="AddToWishList('{{ $product->id }}')"><i class="fa-regular fa-heart"></i></button>
                        </div>
                        <a href="#" class="product-cart__title">{{ Str::limit($product->product_name, 35) }}</a>
                        <div class="product-cart__price">
                            @if ($product->discount_price > 0)
                            <span class="product-cart__price--old">৳ {{ number_format($product->sale_price, 2, '.', ',') }}</span>
                            @endif
                            <span class="product-cart__price--new">৳ {{ number_format($product->current_price, 2, '.', ',') }}</span>
                        </div>
                    </div>