@extends('layouts.app')

@section('content')

<a href="{{ route('businesses.create') }}" class="button blue">
        <span>Adicionar Business</span>
      </a>
      <div class="card has-table">
        <header class="card-header">
          <p class="card-header-title">
            Businesses
          </p>
        </header>
        <div class="card-content">
          <table>
            <thead>
              <tr>
                <th>Business Name</th>
                <th>Address</th>
                <th>VAT Number</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Category</th>
                <th>Status</th>
                <th>Created_AT</th>
                <th>Updated_AT</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            @foreach ($businesses as $business)
              <tr>
                <td data-label="Business Name"> {{$business->name}} </td>
                <td data-label="Address"> {{$business->address}} </td>
                <td data-label="VAT Number"> {{$business->vat_number}} </td>
                <td data-label="Phone Number"> {{$business->phone}} </td>
                <td data-label="Email"> {{$business->email}} </td>
                <td data-label="Category"> {{ $business->category->name ?? 'Sem Categoria' }} </td> <!-- 2. ADICIONADO AQUI -->
                <td data-label="Status"> {{$business->status}} </td>
                <td data-label="Created_AT"> {{$business-> created_at}} </td>
                <td data-label="Updated_AT"> {{$business-> updated_at}} </td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <a href="{{ route('businesses.show', $business->id) }}" class="button blue">
                      <span>Ver</span>
                    </a>
                    <a href="{{ route('businesses.edit', $business->id) }}" class="button blue">
                      <span>Editar</span>
                    </a>
                    <form method="POST" action="{{ route('businesses.destroy', $business->id) }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="button red" onclick="return confirm('Are you sure?')">
                        <span>eliminar</span>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
@endsection