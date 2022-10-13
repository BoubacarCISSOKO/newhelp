@extends('incs.navslider')

@section('content')

<div class="container">
    <div class="row px-xl-5 pb-3 position-relative text-white mb-1 py-5 px-5">
        <form class="row g-3" method="POST" action="{{ route('front.emprunter.store')}}" enctype="multipart/form-data">
            @csrf
              
              <div class="col-md-6">
                <label>Livre</label>
                  <select data-placeholder="veuillez selectionner" name="book_id" id="book_id" class="form-control select2 col-md-12 col-xs-12" disabled>
                  @foreach($book as $b)
                      <option value="{{$b->id}}" <?php if($b->id != null) echo "selected";?>>{{ $b->title }}</option>
                  @endforeach
                  </select>
              </div>

              <div class="col-md-6">
                <label>Date emprunt</label>
                <input type="date" id="emprunt_date" class="form-control @error('emprunt_date') is-invalid @enderror"  name="emprunt_date">
                @error('emprunt_date')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
  
              <div class="col-md-6">
                <label>Date de retour</label>
                <input type="date" id="return_date" class="form-control @error('return_date') is-invalid @enderror"  name="return_date">
                @error('return_date')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
  
              <div class="col-12">
                <button class="btn btn-dark mt-3" type="submit" class="btn btn-secondary" style=" border-radius:35px;background-color: #772953 ;color:white;width: 100%;">Emprunter</button>
              </div>
            </form>
      </div>

    </div>

</div>
@endsection