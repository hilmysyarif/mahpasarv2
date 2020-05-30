<div class="category-menu">
    <div class="main-category">
      <div class="item" data-toggle="modal" data-target="#modalMoreCategory">
          <img src="{{ asset('images/icon/category-more.svg') }}">
          <p>Lainnya</p>
      </div>
      @foreach($categoriesLimit as $c)
        <a href="{{ route('product_list', $c->id) }}">
          <div class="item">
              <img src="{{ asset('images/icon/') }}/{{ $c->icon }}">
              <p>{{ $c->category_name }}</p>
          </div>
        </a>
      @endforeach
    </div>
</div>

<!-- Modal More Category -->
<div class="modal fade" id="modalMoreCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Semua Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="main-category">
            @foreach($category as $c)
            <a href="{{ route('product_list', $c->id) }}">
              <div class="item">
                  <img src="{{ asset('images/icon/') }}/{{ $c->icon }}">
                  <p>{{ $c->category_name }}</p>
              </div>
            </a>
            @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
