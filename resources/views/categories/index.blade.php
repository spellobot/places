@extends('layouts.app')

@section('content')

<a href="{{ route('categories.create') }}" class="button blue">
        <span>Adicionar Categoria</span>
      </a>
      <div class="card has-table">
        <header class="card-header">
          <p class="card-header-title">
            Categories
          </p>
        </header>
        <div class="card-content">
          <table>
            <thead>
              <tr>
                <th>Category Name</th>
                <th>Status</th>
                <th>Created_AT</th>
                <th>Updated_AT</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
              <tr>
                <td data-label="Category Name"> {{$category->name}} </td>
                <td data-label="Status"> {{$category->status}} </td>
                <td data-label="Created_AT"> {{$category-> created_at}} </td>
                <td data-label="Updated_AT"> {{$category-> updated_at}} </td>
                <td class="actions-cell">
                  <div class="buttons right nowrap">
                    <a href="{{ route('categories.show', $category->id) }}" class="button blue">
                      <span>Ver</span>
                    </a>
                    <a href="{{ route('categories.edit', $category->id) }}" class="button blue">
                      <span>Editar</span>
                    </a>
                    <form method="POST" action="">
                      <!--@csrf
                      @method('DELETE')-->
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