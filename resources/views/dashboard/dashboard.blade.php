@include('include.dashboard.header')

@if (Auth::user()->role == 1)
<div class="row">
    <div class="col-lg-12">
        <div class="products">
            <h1>Restaurants</h1>
            <table class="table table-striped">
              <thead class="thead-black">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Naam</th>
                  <th scope="col">Email</th>
                  <th scope="col">Min. Bestelprijs</th>
                  <th scope="col">Bezorgprijs</th>
                  <th scope="col">Website</th>
                  <th scope="col">Plaats</th>
                  <th scope="col">Straat</th>
                  <th scope="col">Postcode</th>
                  <th scope="col">Goedgekeurd</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($restaurants as $restaurant)
                <tr>
                  <th>{{$restaurant->id}}</th>
                  <td>{{$restaurant->name}}</td>
                  <td>{{$restaurant->email}}</td>
                  <td>{{$restaurant->min_order_price}}</td>
                  <td>{{$restaurant->deliver_price}}</td>
                  <td>{{$restaurant->website}}</td>
                  <td>{{$restaurant->city}}</td>
                  <td>{{$restaurant->street}}</td>
                  <td>{{$restaurant->zip_code}}</td>
                  <td>{{$restaurant->approved}}</td>
                  @if ($restaurant->approved == 0)
                    <td>
                        <form action="approveRestaurant" method="POST">
                            @csrf
                            <input type="hidden" value="{{$restaurant->id}}" name="id">
                            <button type="submit" class="btn btn-primary">Goedkeuren</button>
                        </form>
                    </td>
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endif



@include('include.dashboard.footer')
