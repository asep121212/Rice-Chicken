@extends('client.layouts.app')

@section('title', 'Nasi Kulit - Nasi')

@section('content')
  <section>
    <div class="container my-5 py-5">
      <div class="row mb-5 mt-3 align-items-center ">
        <div class="col-md-4">
          <h4 class="text-light">{{ $product->product_name }}</h4>
          <h5 class="text-light">{{ optional($product->category)->category_name }}</h5>
          <img
            src="{{ $product->image !== 'null' ? asset('storage/products/' . $product->image) : asset('client/img/' . $product->id . '.jpg') }}"
            class="card-img-top img-fluid" alt="Produk">
        </div>
        <div class="col-md-6">
          <p class="text-white">{{ $product->product_information }}</p>
          <div class="d-flex gap-2">
            {{-- <form action="{{ route('client.product.add_to_cart', $product->id) }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-secondary"><i class="bi bi-cart3"> </i>Beli sekarang</button>
            </form> --}}
          </div>

          <!-- Comments Section -->
          <div class="mt-5">
            <h5 class="text-light">Komentar</h5>
            @foreach($product->comments as $comment)
              <div class="card my-2">
                <div class="card-body">
                  <p class="card-text">{{ $comment->comment }}</p>
                  <p class="text-muted">Oleh: {{ $comment->user->name }}</p>
                </div>
              </div>
            @endforeach

            <!-- Add Comment Form -->
            <form action="{{ route('client.product.add_comment', $product->id) }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="comment" class="text-light">Tambah Komentar</label>
                <textarea name="comment" id="comment" rows="3" class="form-control"></textarea>
              </div>
              <button type="submit" class="btn btn-primary mt-2">Kirim</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection