@include('include.navbar')
@extends('layouts.app')

<div class="container">
	<div class="row" style="padding-top: 36px;">
		<div class="col-md-3 ">
    <div class="list-group" id="list-tab" role="tablist" style="background-color: green; box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.37); border-radius: 10px;">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home" style="font-weight:600;color:#FAF6D5 !important">Gebruiker</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#orders-profile" role="tab" aria-controls="profile" style="font-weight:600;color:#FAF6D5 !important">Bestellingen</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages" style="font-weight:600;color:#FAF6D5 !important">Adressen</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings" style="font-weight:600;color:#FAF6D5 !important">Settings</a>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <div class="col-md-9">
    		    <div class="card">
    		        <div class="card-body">
    		            <div class="row">
    		                <div class="col-md-12">
    		                    <h4>Gebruikersgegevens</h4>
    		                    <hr>
    		                </div>
    		            </div>
    		            <div class="row">
    		                <div class="col-md-12">
    		                    <form action="user/update" method="post" enctype="multipart/form-data">
								@csrf
                                  <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">Naam</label>
                                    <div class="col-8">
                                      <input id="username" name="name" placeholder="name" value="{{ Auth::user()->name }}" class="form-control here" required="required" type="text">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">Email</label>
                                    <div class="col-8">
                                      <input id="email" name="email" placeholder="email" value="{{ Auth::user()->email }}" class="form-control here" required="required" type="text">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="offset-4 col-8">
                                      <button name="submit" type="submit" class="btn btn-primary">Profiel wijzigen</button>
                                    </div>
                                  </div>
                                </form>
    		                </div>
    		            </div>

    		        </div>
    		    </div>
    		</div>
      </div>
      <div class="tab-pane fade" id="orders-profile" role="tabpanel" aria-labelledby="list-profile-list">
        <div class="col-md-13">
    		    <div class="card">
    		        <div class="card-body">
    		            <div class="row">
    		                <div class="col-md-12">
    		                    <h4>Uw bestellingen</h4>
    		                    <hr>
    		                </div>
    		            </div>
    		            <div class="row">
    		                <div class="col-md-12">
                          <div class="col-12">
                            <h5>Restaurant naam</h5>
                            <p>Wat er allemaal besteld is</p>
                            <p  style="text-align:right;">Tijd</p>
                          </div>
                          <hr>
                          <div class="col-12">
                            <h5>Restaurant naam</h5>
                            <p>Wat er allemaal besteld is</p>
                            <br>
                            <p  style="text-align:right;">Tijd</p>
                          </div>


    		                </div>
    		            </div>

    		        </div>
    		    </div>
    		</div>
      </div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
    </div>
  </div>
  </div>
</div>

</body>
</html>
