<!DOCTYPE html>
<html lang="en">
@include('admin.partials.header')
<body>
    <main class="bg-light">
        <div class="container">
    
          <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
    
                  <div class="card">
    
                    <div class="card-body">
    
                      <div class="pt-4 pb-2 text-center">
                        <img height="60px" class="mb-4" src="{{asset('assets/images/logo.png')}}" alt="">
                        <h5 class="card-title pb-0 fs-4">Login to Your Account</h5>
                        <p class="small">Enter your namecode & password</p>
                      </div>

                      @if (session()->has('loginError'))
                      <div class="form-group">
                          <div
                              class="alert alert-danger alert-dismissible fade show"
                              role="alert">
                              <span class="alert-text small">
                                  {{session('loginError')}}
                              </span>
                          </div>
                      </div>
                      @endif
    
                      <form class="row g-3 needs-validation" action="{{route('proseslogin')}}" method="POST">
                        @csrf
                        <div class="col-12">
                          <label for="yourUsername" class="form-label">NameCode</label>
                          <div class="input-group has-validation">
                            <input type="text" name="namecode" class="form-control" id="namecode" required>
                            <div class="invalid-feedback">Please enter your name code.</div>
                          </div>
                        </div>
    
                        <div class="col-12">
                          <label for="yourPassword" class="form-label">Password</label>
                          <input type="password" name="password" class="form-control" id="yourPassword" required>
                          <div class="invalid-feedback">Please enter your password!</div>
                        </div>
    
                        <div class="col-12">
                        </div>
                        <div class="col-12">
                          <button class="btn w-100" type="submit" style="background-color:#199fdc; color:#ffff">Login</button>
                        </div>
                      </form>
    
                    </div>
                  </div>
    
                </div>
              </div>
            </div>
    
          </section>
    
        </div>
      </main>
</body>
</html>