@extends('layouts.app')

@section('content')
      @if ($errors->any())
      <div class="notification red">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="card mb-6">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-ballot"></i></span>
            Businesses
          </p>
        </header>
        <div class="card-content">
          <form method="POST" action="{{ route('businesses.store') }}">
            @csrf
            <div class="field">
              <label class="label">Name</label>
              <div class="field-body">
                <div class="field">
                  <div class="control icons-left">
                    <input class="input" type="text" placeholder="Name" name="name">
                  </div>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label">Address</label>
              <div class="field-body">
                <div class="field">
                  <div class="control icons-left">
                    <input class="input" type="text" placeholder="Address" name="address">
                  </div>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label">VAT Number</label>
              <div class="field-body">
                <div class="field">
                  <div class="control icons-left">
                    <input class="input" type="text" placeholder="VAT Number" name="vat_number">
                  </div>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label">Phone Number</label>
              <div class="field-body">
                <div class="field">
                  <div class="control icons-left">
                    <input class="input" type="text" placeholder="Phone Number" name="phone">
                  </div>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label">Email</label>
              <div class="field-body">
                <div class="field">
                  <div class="control icons-left">
                    <input class="input" type="email" placeholder="Email" name="email">
                  </div>
                </div>
              </div>
            </div>

            <div class="field">
              <label class="label">Category</label>
              <div class="control">
                <div class="select">
                  <select name="category_id">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label">Status</label>
              <div class="control">
                <div class="select">
                  <select name="status">
                    <option value="">Select Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                  </select>
                </div>
              </div>
            </div>
            <hr>
            <hr>

            <div class="field grouped">
              <div class="control">
                <button type="submit" class="button green">
                  Submit
                </button>
              </div>
              <div class="control">
                <button type="reset" class="button red">
                  Reset
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
@endsection